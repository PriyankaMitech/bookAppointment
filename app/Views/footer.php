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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

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
</body>

</html>
