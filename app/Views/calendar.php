<?php include("header.php"); ?>

<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js'></script>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div id='calendar'></div>
                    <div style='clear:both'></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

<script>
        $(document).ready(function() {
            // PHP variable $schedule should contain the necessary schedule data
            var scheduleData = <?php echo json_encode($schedule); ?>;
            var events = [];

            // Iterate through each event in the scheduleData array
            scheduleData.forEach(function(event) {
                events.push({
                    id: event.id,
                    title: event.start_time, // You can set the event title to the day
                    start: event.start_date, // Start date of the event
                    end: event.start_date, // End date of the event
                    allDay: true // All-day event
                });
            });

            // Initialize FullCalendar with events data
            var calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    // center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: false, // Disable editing
                events: events // Set events data
            });
        });
    </script>
   