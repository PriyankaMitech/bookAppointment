<?php include("header.php"); ?>

<style>
        .fc-content {
            color: #fff;
            padding: 5px;
        }
        .ui-tooltip {
            max-width: 300px;
        }
        
    </style>


<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" />
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="card p-2">
                            <div id='calendar'></div>
                            <div style='clear:both'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
    <script>
    $(document).ready(function() {
        // PHP variable $schedule should contain the necessary schedule data
        var scheduleData = <?php echo json_encode($schedule); ?>;

        var events = [];

        // Check if scheduleData is an array and has elements
        if (Array.isArray(scheduleData) && scheduleData.length > 0) {
            // Iterate through each event in the scheduleData array
            scheduleData.forEach(function(event) {
                // Ensure that dates are in ISO 8601 format
                var startDate = moment(event.selected_date).format('YYYY-MM-DD');
                
                // Concatenate the customer name with the event start time for the event title
                var title = event.customer_name + ' - ' + event.start_time;

                events.push({
                    id: event.id,
                    title: title, // Event title containing customer name and start time
                    start: startDate, // Corrected to use selected_date
                    end: startDate, // End date of the event (same as start for an all-day event)
                    allDay: true, // All-day event
                    customer_name: event.customer_name, // Add other details
                    start_time: event.start_time,
                    end_time: event.end_time,
                    description: event.description // Add more fields as necessary
                });
            });
        }

        // Function to set the calendar height dynamically
        function setCalendarHeight() {
            var windowHeight = $(window).height();
            var headerHeight = $('.fc-toolbar').outerHeight();
            var calendarHeight = windowHeight - headerHeight - 20; // Adjust 20px for padding/margin

            $('#calendar').fullCalendar('option', 'height', calendarHeight);
        }

        // Initialize FullCalendar with events data
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: false, // Disable editing
            events: events, // Set events data
            windowResize: function(view) {
                setCalendarHeight();
            },
            eventRender: function(event, element) {
                // Customize tooltip content
                var tooltipContent = '<strong>Customer Name:</strong> ' + event.customer_name + '<br>' +
                                     '<strong>Start Time:</strong> ' + event.start_time + '<br>';

                // Initialize tooltip
                element.attr('title', tooltipContent);
                element.tooltip({
                    content: tooltipContent,
                    html: true,
                    container: 'body'
                });
            }
        });

        // Set initial calendar height
        setCalendarHeight();
    });
</script>


