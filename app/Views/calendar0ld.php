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
            var customerColors = {};

            // Generate a random color
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            // Determine if the text color should be white or black based on the background color
            function getContrastYIQ(hexcolor){
                var r = parseInt(hexcolor.substr(1,2),16);
                var g = parseInt(hexcolor.substr(3,2),16);
                var b = parseInt(hexcolor.substr(5,2),16);
                var yiq = ((r*299)+(g*587)+(b*114))/1000;
                return (yiq >= 128) ? 'black' : 'white';
            }

            // Check if scheduleData is an array and has elements
            if (Array.isArray(scheduleData) && scheduleData.length > 0) {
                // Iterate through each event in the scheduleData array
                scheduleData.forEach(function(event) {
                    // Ensure that dates are in ISO 8601 format
                    var startDate = moment(event.selected_date).format('YYYY-MM-DD');
                    
                    // Concatenate the customer name with the event start time for the event title
                    var title = event.customer_name + ' - ' + event.start_time;

                    // Assign color to each customer if not already assigned
                    if (!customerColors[event.customer_name]) {
                        customerColors[event.customer_name] = getRandomColor();
                    }

                    events.push({
                        id: event.id,
                        title: title, // Event title containing customer name and start time
                        start: startDate, // Corrected to use selected_date
                        end: startDate, // End date of the event (same as start for an all-day event)
                        allDay: true, // All-day event
                        color: customerColors[event.customer_name], // Set the event color
                        customer_name: event.customer_name, // Add other details
                        start_time: event.start_time,
                        textColor: getContrastYIQ(customerColors[event.customer_name]) // Set the text color
                    });
                });
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
                eventRender: function(event, element) {
                    // Customize tooltip content
                    var tooltipContent = '<strong>Customer Name:</strong> ' + event.customer_name + '<br>' +
                                         '<strong>Start Time:</strong> ' + event.start_time;

                    // Initialize tooltip with color matching the event color
                    element.attr('title', tooltipContent);
                    element.tooltip({
                        content: tooltipContent,
                        html: true,
                        container: 'body',
                        tooltipClass: 'custom-tooltip',
                        open: function(event, ui) {
                            var backgroundColor = $(this).css('background-color');
                            var textColor = getContrastYIQ(rgb2hex(backgroundColor));
                            ui.tooltip.css('background-color', backgroundColor);
                            ui.tooltip.css('color', textColor);
                        }
                    });

                    // Set the text color based on background color
                    element.css('color', event.textColor);
                }
            });

            // Function to convert RGB to Hex
            function rgb2hex(rgb) {
                rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
                function hex(x) {
                    return ("0" + parseInt(x).toString(16)).slice(-2);
                }
                return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
            }

            // Add custom CSS for the tooltips
            $("<style>")
                .prop("type", "text/css")
                .html("\
                .custom-tooltip {\
                    padding: 10px;\
                    border-radius: 5px;\
                }\
                ")
                .appendTo("head");
        });
    </script>



   