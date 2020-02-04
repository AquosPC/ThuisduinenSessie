<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = [];
    $http_host = empty($_SERVER['HTTP_HOST']) ? null : $_SERVER['HTTP_HOST'];
    $http_origin = empty($_SERVER['HTTP_REFERER']) ? null : preg_replace('~^https?://(.*?)(/.*|$)~i', '$1', $_SERVER['HTTP_REFERER']);

    if ($http_host && $http_host === $http_origin) {
        $data_id = empty($_POST['id']) ? 0 : (int) $_POST['id'];
        $data_json = file_get_contents('form.json');

        if ($data_id && $data_json) {
            $data = json_decode($data_json);
            $data = isset($data->$data_id) ? $data->$data_id : null;

            if ($data) {
                if (isset($_POST['field_0']) && empty($_POST['field_0'])) {
                    if (isset($_POST['g-recaptcha-response'])) {
                        $email_pattern = '/^[\w.\-]+@[\w.\-]+\.[a-z]{2,}$/i';
                        $emails_pattern = '/[\w.\-]+@[\w.\-]+\.[a-z]{2,}/i';
                        $language = empty($_POST['language']) ? null : $_POST['language'];
                        $error = false;
                        $error_fields = [];

                        if (isset($data->validation)) {
                            foreach ($data->validation as $name => $type) {
                                $value = empty($_POST[$name]) ? (empty($_FILES[$name]['name']) ? null : $_FILES[$name]['name']) : $_POST[$name];

                                if ($value) {
                                    switch ($type) {
                                        case 'email':
                                            if (!preg_match($email_pattern, $value)) {
                                                $error = true;
                                                $error_fields[] = $name;
                                            }
                                    }
                                } else {
                                    $error = true;
                                    $error_fields[] = $name;
                                }
                            }
                        }

                        if (!$error && $_FILES) {
                            foreach ($_FILES as $name => $value) {
                                if (empty($value['name'])) {
                                    unset($_FILES[$name]);
                                } elseif ($value['size'] > (10 * 1024 * 1024)) {
                                    $error = true;
                                    $error_fields[] = $name;
                                }
                            }
                        }

                        if ($error) {
                            $response['status'] = 'error';
                            $response['feedback'] = null;
                            $response['error_fields'] = $error_fields;

                            if ($language && isset($data->feedback->languages->$language->error)) {
                                $response['feedback'] = $data->feedback->languages->$language->error;
                            } elseif (isset($data->feedback->error)) {
                                $response['feedback'] = $data->feedback->error;
                            }
                        } else {
                            $mail = isset($data->mail) ? $data->mail : null;
                            $send_mail = false;
                            $confirmation_mail = isset($data->confirmation_mail) ? $data->confirmation_mail : null;
                            $send_confirmation_mail = false;

                            if (
                                $mail &&
                                isset($mail->from_name) &&
                                isset($mail->from_email) &&
                                isset($mail->to_email) &&
                                preg_match($email_pattern, $mail->from_email) &&
                                preg_match_all($emails_pattern, $mail->to_email, $matches)
                            ) {
                                $mail->reply_to_email = null;

                                if (isset($mail->reply_to_email_field) && isset($_POST[$mail->reply_to_email_field])) {
                                    $reply_to_email = trim($_POST[$mail->reply_to_email_field]);

                                    if (preg_match($email_pattern, $reply_to_email)) {
                                        $mail->reply_to_email = $reply_to_email;
                                    }
                                }

                                $mail->to_email = implode(', ', $matches[0]);
                                $send_mail = true;
                            }

                            if (
                                $confirmation_mail &&
                                isset($confirmation_mail->from_name) &&
                                isset($confirmation_mail->from_email) &&
                                isset($confirmation_mail->to_email_field) &&
                                isset($_POST[$confirmation_mail->to_email_field]) &&
                                preg_match($email_pattern, $confirmation_mail->from_email)
                            ) {
                                $to_email = trim($_POST[$confirmation_mail->to_email_field]);

                                if (preg_match($email_pattern, $to_email)) {
                                    $confirmation_mail->to_email = $to_email;
                                    $send_confirmation_mail = true;
                                }
                            }

                            if ($send_mail || $send_confirmation_mail) {
                                $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
                                $query_string = http_build_query([
                                    'secret' => '6Lci2GUUAAAAAL63Glu90drE8doL-JWeA9Ssi6Oy',
                                    'response' => $_POST['g-recaptcha-response']
                                ]);

                                curl_setopt($ch, CURLOPT_POST, 1);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                $recaptcha_response = json_decode(curl_exec($ch));

                                curl_close($ch);

                                if ($recaptcha_response->success && $recaptcha_response->hostname === $_SERVER['HTTP_HOST']) {
                                    $key_alternative = md5(uniqid());
                                    $message_plain = null;
                                    $message_html = null;
                                    $message_start = null;
                                    $message_end = null;

                                    $header_plain = "--{$key_alternative}\r\n";
                                    $header_plain .= "Content-Type: text/plain; charset=UTF-8\r\n";
                                    $header_plain .= "Content-Transfer-Encoding: 8bit\r\n\r\n";

                                    $header_html = "\r\n\r\n--{$key_alternative}\r\n";
                                    $header_html .= "Content-Type: text/html; charset=UTF-8\r\n";
                                    $header_html .= "Content-Transfer-Encoding: 8bit\r\n\r\n";

                                    unset($_POST['id'], $_POST['language'], $_POST['field_0'], $_POST['g-recaptcha-response']);

                                    foreach (array_filter($_POST) as $name => $value) {
                                        $label = null;
                                        $label_plain = null;
                                        $label_html = null;

                                        if ($language && isset($data->label->languages->$language->$name)) {
                                            $label = $data->label->languages->$language->$name;
                                        } elseif (isset($data->label->$name)) {
                                            $label = $data->label->$name;
                                        } elseif (!empty($value) && is_string($value)) {
                                            $label = $value;
                                            $value = [];
                                        }

                                        if (!empty($label) || !empty($value)) {
                                            if (!empty($label)) {
                                                $label_plain = "{$label}:";
                                                $label_html = '<strong>'.htmlentities($label).'</strong>';

                                                if (!empty($value)) {
                                                    $label_plain .= "\r\n";
                                                    $label_html .= '<br>';
                                                }
                                            }

                                            if (is_array($value)) {
                                                $value = implode(', ', $value);
                                            }

                                            $message_plain .= "{$label_plain}{$value}\r\n\r\n";
                                            $message_html .= "<p>{$label_html}".nl2br(htmlentities($value)).'</p>';
                                        }
                                    }

                                    $message_plain = trim($message_plain);
                                    $message_html = trim($message_html);
                                    $success = false;

                                    $headers = ['', ''];
                                    $headers[] = 'MIME-Version: 1.0';

                                    if ($_FILES) {
                                        $key_mixed = md5(uniqid());
                                        $count = count($_FILES);
                                        $counter = 1;

                                        $headers[] = "Content-Type: multipart/mixed; boundary={$key_mixed}\r\n\r\n";

                                        $message_start .= "--{$key_mixed}\r\n";
                                        $message_start .= "Content-Type: multipart/alternative; boundary={$key_alternative}\r\n\r\n";

                                        foreach ($_FILES as $name => $value) {
                                            $file = fopen($value['tmp_name'], 'r');
                                            $attachment = fread($file, filesize($value['tmp_name']));
                                            $attachment = chunk_split(base64_encode($attachment));

                                            fclose($file);

                                            $message_end .= "\r\n\r\n--{$key_mixed}\r\n";
                                            $message_end .= "Content-Type: {$value['type']}; name=\"{$value['name']}\"\r\n";
                                            $message_end .= "Content-Disposition: attachment; filename=\"{$value['name']}\"\r\n";
                                            $message_end .= "Content-Transfer-Encoding: base64\r\n\r\n";
                                            $message_end .= $attachment;

                                            if ($counter === $count) {
                                                $message_end .= "\r\n\r\n--{$key_mixed}--";
                                            }

                                            $counter++;
                                        }
                                    } else {
                                        $headers[] = "Content-Type: multipart/alternative; boundary={$key_alternative}\r\n\r\n";
                                    }

                                    if ($send_mail) {
                                        $from_name = '=?UTF-8?B?'.base64_encode($mail->from_name).'?=';
                                        $reply_to = $mail->reply_to_email ? $mail->reply_to_email : "{$from_name} <{$mail->from_email}>";
                                        $subject = empty($mail->subject) ? null : '=?UTF-8?B?'.base64_encode($mail->subject).'?=';
                                        $_message_plain = $message_plain;
                                        $_message_html = $message_html;

                                        if (!empty($mail->message)) {
                                            $_message_plain = "{$mail->message}\r\n\r\n---\r\n\r\n{$message_plain}";
                                            $_message_html = '<p>'.nl2br(htmlentities($mail->message))."</p><hr>{$message_html}";
                                        }

                                        $_headers = $headers;
                                        $_headers[0] = "From: {$from_name} <{$mail->from_email}>";
                                        $_headers[1] = "Reply-To: {$reply_to}";
                                        $_headers = implode("\r\n", $_headers);

                                        $_message_html = "<html><body>{$_message_html}</body></html>\r\n\r\n--{$key_alternative}--";
                                        $message = $message_start . $header_plain . $_message_plain . $header_html . $_message_html . $message_end;

                                        if (mail($mail->to_email, $subject, $message, $_headers, "-f{$mail->from_email}")) {
                                            $success = true;
                                        } elseif (mail($mail->to_email, $subject, $message, $_headers)) {
                                            $success = true;
                                        }
                                    }

                                    if ($send_confirmation_mail) {
                                        $from_name = '=?UTF-8?B?'.base64_encode($confirmation_mail->from_name).'?=';
                                        $subject = null;
                                        $_message_plain = $message_plain;
                                        $_message_html = $message_html;

                                        if (isset($confirmation_mail->languages->$language->subject)) {
                                            if (!empty($confirmation_mail->languages->$language->subject)) {
                                                $subject = '=?UTF-8?B?'.base64_encode($confirmation_mail->languages->$language->subject).'?=';
                                            }
                                        } elseif (isset($confirmation_mail->subject)) {
                                            if (!empty($confirmation_mail->subject)) {
                                                $subject = '=?UTF-8?B?'.base64_encode($confirmation_mail->subject).'?=';
                                            }
                                        }

                                        if (isset($confirmation_mail->languages->$language->message)) {
                                            if (!empty($confirmation_mail->languages->$language->message)) {
                                                $_message_plain = "{$confirmation_mail->languages->$language->message}\r\n\r\n---\r\n\r\n{$message_plain}";
                                                $_message_html = '<p>'.nl2br(htmlentities($confirmation_mail->languages->$language->message))."</p><hr>{$message_html}";
                                            }
                                        } elseif (isset($confirmation_mail->message)) {
                                            if (!empty($confirmation_mail->message)) {
                                                $_message_plain = "{$confirmation_mail->message}\r\n\r\n---\r\n\r\n{$message_plain}";
                                                $_message_html = '<p>'.nl2br(htmlentities($confirmation_mail->message))."</p><hr>{$message_html}";
                                            }
                                        }

                                        $_headers = $headers;
                                        $_headers[0] = "From: {$from_name} <{$confirmation_mail->from_email}>";
                                        $_headers[1] = "Reply-To: {$from_name} <{$confirmation_mail->from_email}>";
                                        $_headers = implode("\r\n", $_headers);

                                        $_message_html = "<html><body>{$_message_html}</body></html>\r\n\r\n--{$key_alternative}--";
                                        $message = $message_start . $header_plain . $_message_plain . $header_html . $_message_html . $message_end;

                                        if (mail($confirmation_mail->to_email, $subject, $message, $_headers, "-f{$confirmation_mail->from_email}")) {
                                            $success = true;
                                        } elseif (mail($confirmation_mail->to_email, $subject, $message, $_headers)) {
                                            $success = true;
                                        }
                                    }

                                    if ($success) {
                                        $response['status'] = 'success';
                                        $response['feedback'] = null;
                                        $response['error_fields'] = $error_fields;

                                        if ($language && isset($data->feedback->languages->$language->success)) {
                                            $response['feedback'] = $data->feedback->languages->$language->success;
                                        } elseif (isset($data->feedback->success)) {
                                            $response['feedback'] = $data->feedback->success;
                                        }
                                    } else {
                                        $response['status'] = 'error';
                                        $response['feedback'] = 'Mail failed.';
                                    }
                                } else {
                                    $response['status'] = 'error';
                                    $response['feedback'] = 'Recaptcha failed.';
                                }
                            } else {
                                $response['status'] = 'error';
                                $response['feedback'] = 'Er is geen juiste koppeling ingesteld.';
                            }
                        }
                    } else {
                        $response['status'] = 'error';
                        $response['feedback'] = 'Recaptcha has not been sent.';
                    }
                } else {
                    $response['status'] = 'error';
                    $response['feedback'] = 'Honeypot is not empty.';
                }
            } else {
                $response['status'] = 'error';
                $response['feedback'] = 'Can not find data.';
            }
        } else {
            $response['status'] = 'error';
            $response['feedback'] = 'Er is geen koppeling ingesteld.';
        }
    } else {
        $response['status'] = 'error';
        $response['feedback'] = 'HTTP host does not match HTTP origin.';
    }

    header('Content-type: application/json');
    echo json_encode($response);
}
?>
