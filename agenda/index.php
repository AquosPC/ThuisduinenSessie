

<?php 
    Require "../INC/PHP/Header.php";
?>
<head>
<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
<link rel="stylesheet" href="../INC/CSS/Head.css">
<script src="fullcalendar/lib/jquery.min.js"></script>
<script src="fullcalendar/lib/moment.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>
<title>THuisduinen - Agenda</title>

<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        // editable: true,
        events: "fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
       

    });
});
</script>

<style>
body h2{
    margin: 50px;
    text-align: center;
    /*font-size: 12px;*/
    font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
}

#calendar {
    width: 700px;
    margin: 0 auto;
}

.response {
    height: 60px;
}

.success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    display: inline-block;
}
</style>
</head>
<body class="pageBG">
    <h2>Kalender THuisduinen2050</h2>

    <div class="response"></div>
    <div id='calendar'></div>
    <a href="http://localhost/ThuisduinenSessie/Contact.php"><button class="button2">Meld u hier aan.</button></a>
</body>
<?php require("footer2.php") ?>