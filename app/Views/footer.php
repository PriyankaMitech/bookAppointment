</div>

                <!-- <div class="fixed-button">

                    <a href="https://codedthemes.com/item/guru-able-admin-template/" target="_blank" class="btn btn-md btn-primary">

                      <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro

                    </a>

                </div> -->

            </div>

        </div>



<!-- Required Jquery -->



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->




<!-- <script type="text/javascript" src="<?=base_url(); ?>assets/js/jquery/jquery.min.js"></script> -->





<script type="text/javascript" src="<?=base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?=base_url(); ?>assets/js/popper.js/popper.min.js"></script>

<script type="text/javascript" src="<?=base_url(); ?>assets/js/bootstrap/js/bootstrap.min.js"></script>

<!-- jquery slimscroll js -->

<script type="text/javascript" src="<?=base_url(); ?>assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- modernizr js -->

<script type="text/javascript" src="<?=base_url(); ?>assets/js/modernizr/modernizr.js"></script>

<!-- am chart -->

<script src="<?=base_url(); ?>assets/pages/widget/amchart/amcharts.min.js"></script>

<script src="<?=base_url(); ?>assets/pages/widget/amchart/serial.min.js"></script>

<!-- Todo js -->

<script type="text/javascript " src="<?=base_url(); ?>assets/pages/todo/todo.js "></script>

<!-- Custom js -->

<script type="text/javascript" src="<?=base_url(); ?>assets/pages/dashboard/custom-dashboard.js"></script>

<script type="text/javascript" src="<?=base_url(); ?>assets/js/script.js"></script>

<script type="text/javascript " src="<?=base_url(); ?>assets/js/SmoothScroll.js"></script>

<script src="<?=base_url(); ?>assets/js/pcoded.min.js"></script>

<script src="<?=base_url(); ?>assets/js/demo-12.js"></script>

<script src="<?=base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>




    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>


<div id="flash-messages"></div>

<!-- <script>
    $(document).ready(function() {
        var table = $('.tabler').DataTable({
            scrollY: '50vh',
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: {
                leftColumns: 2 // Freeze first two columns
            },
            fixedHeader: true,
            dom: 'lrtip' // Hide the search box
        });
    });
</script> -->


<script>
    $(document).ready(function() {
        function initializeDataTable() {
            var isMobile = window.matchMedia("(max-width: 768px)").matches;
            
            var tableConfig = {
                scrollY: '50vh',
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedHeader: true,
                dom: 'lrtip' // Hide the search box
            };

            tableConfig.fixedColumns = {
                leftColumns: isMobile ? 1 : 2 // Freeze first column on mobile, first two columns on larger screens
            };

            $('.tabler').DataTable(tableConfig);
        }

        initializeDataTable();

        $(window).resize(function() {
            var table = $('.tabler').DataTable();
            table.destroy();
            initializeDataTable();
        });
    });


</script>


<script>
   
   $(document).ready(function() {
    var table = $('.tabler1').DataTable({
        scrollY: '50vh',
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        fixedColumns: {
            leftColumns: 1 // Freeze first column
        },
        fixedHeader: true,
        dom: 'lrtip' // Hide the search box
    });
});




</script>


<script>
    $(document).ready(function() {
        $('.tabler2').DataTable({
            responsive: true
        });
    });
</script>





<script>

var $window = $(window);

var nav = $('.fixed-button');

    $window.scroll(function(){

        if ($window.scrollTop() >= 200) {

         nav.addClass('active');

     }

     else {

         nav.removeClass('active');

     }

 });

</script>

<script>

        $(document).ready(function() {

            // Handle click event on widget

            $('#todaysAppointmentWidget').click(function() {

                // Toggle visibility of the table container

                $('#appointmentTableContainer').toggle();

            });

        });

        

    function removeFilter() {

        var url = window.location.href;

        url = url.replace(/([&?])filter_date=.*?(&|$)/, '$1').replace(/([?&])$/, '');

        window.location.href = url;

    }


    // scripts.js with jQuery
$(document).ready(function() {
    // Function to fetch and display flash messages
    function fetchAndDisplayFlashMessages() {
        let flashMessages = [];

        // Check for success message
        let successMessage = '<?php echo session()->getFlashdata('success'); ?>';
        if (successMessage) {
            flashMessages.push({ type: 'success', message: successMessage });
        }

        // Check for info message
        let infoMessage = '<?php echo session()->getFlashdata('info'); ?>';
        if (infoMessage) {
            flashMessages.push({ type: 'info', message: infoMessage });
        }

        // Clear existing messages
        $('#flash-messages').empty();

        // Display each flash message
        flashMessages.forEach(function(messageData) {
            let messageDiv = $('<div></div>')
                .addClass('flash-message')
                .addClass(messageData.type)
                .text(messageData.message);
            $('#flash-messages').append(messageDiv);
        });
    }

    // Call the function to fetch and display flash messages
    fetchAndDisplayFlashMessages();
});






    </script>


</body>



</html>

