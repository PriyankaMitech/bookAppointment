<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/css/style.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/responsivestyle.css">
    <style>
    .addschedulec{
        margin: 5% 8%;
    }
</style>


</head>

<body>
   
    <div class="container addschedulec">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <!-- Form column -->
                <section class="wizard-section">
                    <div class="row no-gutters form-wizard">
                        <div class="col-lg-2 col-md-2 col-12">
                            <!-- Image for Payment -->
                            <img class="imges" src="<?=base_url(); ?>assets/images/vedik-logo.png" alt="Payment Method">
                        </div>
                        <?php if(!empty($single)){ 

                           date_default_timezone_set('Asia/Kolkata');
                       
                           // Get the current time in Asia/Kolkata timezone
                           $current_time = time();
                       
                           // Get the start time of the appointment
                           $start_time = strtotime($single->appointment_date . ' ' . $single->start_time);
                       
                           // Calculate the difference in seconds
                           $time_diff = $start_time - $current_time;
                       
                           // Convert difference to hours
                           $time_diff_hours = $time_diff / (60 * 60);
                       
                           // Check if the appointment is scheduled for today and the start time is less than or equal to 1 hour from now
                           if (date('Y-m-d', $start_time) == date('Y-m-d', $current_time) && $time_diff_hours <= 1) {
                         
                   
                       
                            ?>
                             <div class="col-lg-8 col-md-8 col-12 p-3">
                                    <h4>Sorry, you cannot reschedule the appointment because  only few minutes left to your appointment !</h4>
                            </div>
                            <?php }else{ ?>
                               
                        <div class="form-wizard-header col-lg-10 col-md-10 col-12">
                            <p>Fill all form field to go next step</p>
                            <ul class="list-unstyled form-wizard-steps clearfix">
                                <li class="active"><span>1</span></li>
                                <li><span class="grey">2</span></li>
                                <li><span class="grey">3</span></li>
                                <li><span class="grey">4</span></li>
                            </ul>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-wizard">
                                <form action="<?=base_url(); ?>formdata" method="post" role="form">

                                    <fieldset class="wizard-fieldset show">
                                        <h4>Personal Information</h4>
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6><b>Name</b></h6>
                                                    <input type="hidden" 
                                                        id="ap_id" name="ap_id" value="<?php if(!empty($single)){ echo $single->ap_id ; } ?>">
                                                    <input type="text" class="form-control wizard-required"
                                                        id="fullname" name="fullname" value="<?php if(!empty($single)){ echo $single->fullname; } ?>">
                                                    <!-- <label for="fullname" class="wizard-form-text-label"> Appointment
                                                        For(Name)*</label> -->
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <h6><b>Gender</b></h6>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-6">
                                                    <div class="wizard-form-radio">
                                                        <input name="gender" id="male" type="radio" value="Male"
                                                            checked <?php if(!empty($single)){ if($single->gender == 'Male'){echo "checked" ;} } ?>>
                                                        <label for="male">Male</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-6">
                                                    <div class="wizard-form-radio">
                                                        <input name="gender" id="female" type="radio" value="Female" <?php if(!empty($single)){ if($single->gender == 'Female'){echo "checked" ;} } ?>>
                                                        <label for="female">Female</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <h6><b>Marital Status</b></h6>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-6">
                                                    <div class="wizard-form-radio">
                                                        <input name="marital_status" id="unmarried" checked type="radio"
                                                            value="Unmarried"
                                                            <?php if(!empty($single)){ if($single->marital_status == 'Unmarried'){echo "checked" ;} } ?>>
                                                        <label for="unmarried">Unmarried</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-6">
                                                    <div class="wizard-form-radio">
                                                        <input name="marital_status" id="married" type="radio"
                                                            value="Married"
                                                            <?php if(!empty($single)){ if($single->marital_status == 'Married'){echo "checked" ;} } ?>>
                                                        <label for="married">Married</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-6">
                                                    <div class="wizard-form-radio">
                                                        <input name="marital_status" id="divorced" type="radio"
                                                            value="Divorced"
                                                            <?php if(!empty($single)){ if($single->marital_status == 'Divorced'){echo "checked" ;} } ?>>
                                                        <label for="divorced">Divorced</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-6">
                                                    <div class="wizard-form-radio">
                                                        <input name="marital_status" id="widow_widower" type="radio"
                                                            value="Widow/Widower"
                                                            <?php if(!empty($single)){ if($single->marital_status == 'Widow/Widower'){echo "checked" ;} } ?>>
                                                        <label for="widow_widower">Widow/Widower</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6><b>Contact Number*</b></h6>
                                            <input type="text" class="form-control wizard-required" id="contact"
                                                name="contact_number" value="<?php if(!empty($single)){ echo $single->contact_number; } ?>">
                                            <div class="wizard-form-error"></div>
                                        </div>
                                        <div class="form-group">
                                            <h6><b>Email</b></h6>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php if(!empty($single)){ echo $single->email; } ?>">
                                            <div class="wizard-form-error"></div>
                                            <label class="text-muted">You will receive details about your appointment via email.</label>
                                        </div>

                                        <div class="form-group row" id="appointmentType">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <h6><b>Appointment Type</b></h6>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-6 wizard-form-radio ">
                                                        <input name="appointmentType" id="online" type="radio"
                                                            value="online" <?php if(!empty($single)){ if($single->appointmentType == 'online'){echo "checked" ;} } ?>>
                                                        <label for="online">Online</label>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-6 wizard-form-radio">
                                                        <input name="appointmentType" id="offline" type="radio" checked
                                                            value="offline" <?php if(!empty($single)){ if($single->appointmentType == 'offline'){echo "checked" ;} } ?>>
                                                        <label for="offline">Offline</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="extra-options col-md-6 rp" id="extraOptions"
                                                style="display: none;">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-6 wizard-form-radio">
                                                        <input name="appointmentOption" id="audio" type="radio"
                                                            value="audio" <?php if(!empty($single)){ if($single->appointmentOption == 'audio'){echo "checked" ;} } ?>>
                                                        <label for="audio">Audio</label>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-6 wizard-form-radio">
                                                        <input name="appointmentOption" id="video" type="radio"
                                                            value="video" <?php if(!empty($single)){ if($single->appointmentOption == 'video'){echo "checked" ;} } ?>>
                                                        <label for="video">Video</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6><b>How do you know about vedik astrologer? (वेदिक ॲस्ट्रॅालॅाजर
                                                            बद्दल कुठून माहिती मिळाली?)</b></h6>

                                                    <div class="row form-inlinee">
                                                        <div class="col-lg-3 col-md-6 col-6 wizard-form-radio">
                                                            <input name="source" id="instagramRadio" type="radio"
                                                                checked value="Instagram" <?php if(!empty($single)){ if($single->source == 'Instagram'){echo "checked" ;} } ?>>
                                                            <label for="instagramRadio">Instagram</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-6 wizard-form-radio">
                                                            <input name="source" id="facebookRadio" type="radio"
                                                                value="Facebook" <?php if(!empty($single)){ if($single->source == 'Facebook'){echo "checked" ;} } ?>>
                                                            <label for="facebookRadio">Facebook</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-6 wizard-form-radio">
                                                            <input name="source" id="googleRadio" type="radio"
                                                                value="Google" <?php if(!empty($single)){ if($single->source == 'Google'){echo "checked" ;} } ?>>
                                                            <label for="googleRadio">Google</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-6 wizard-form-radio">
                                                            <input name="source" id="friendRadio" type="radio"
                                                                value="Friend" <?php if(!empty($single)){ if($single->source == 'Friend'){echo "checked" ;} } ?>>
                                                            <label for="friendRadio">Friend</label>
                                                        </div>
                                                    </div>

                                                    <input type="text" class="form-control mt-2" name="friendName"
                                                        id="friendInput" style="display: none;"
                                                        placeholder="Enter Friend's Name" value="<?php if(!empty($single)){ echo $single->friendName; } ?>">

                                                    <label for="friendInput" class="wizard-form-text-label"></label>
                                                    <div class="wizard-form-error"></div>



                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                        </div>
                                    </fieldset>
                                    <fieldset class="wizard-fieldset">
                                        <h4>Book Slots</h4>
                                        <input type="hidden" id="selected-date" name="selectedDate" value="<?php if(!empty($single)){ echo $single->appointment_date; } ?>">

                                        <div class="row mt-3">
                                            <div class="col-lg-7">
                                                <h5>Select date </h5>
                                                <div class="wrapper">
                                                    <div class="container-calendar">
                                                        <h3 id="monthAndYear"></h3>
                                                        <div class="button-container-calendar">
                                                            <div class="footer-container-calendar">
                                                                <button id="previous"
                                                                    onclick="previous()">&#8249;</button>
                                                                <!-- <label for="month">Jump To: </label> -->
                                                                <select id="month" onchange="jump()">
                                                                    <option value=0>Jan</option>
                                                                    <option value=1>Feb</option>
                                                                    <option value=2>Mar</option>
                                                                    <option value=3>Apr</option>
                                                                    <option value=4>May</option>
                                                                    <option value=5>Jun</option>
                                                                    <option value=6>Jul</option>
                                                                    <option value=7>Aug</option>
                                                                    <option value=8>Sep</option>
                                                                    <option value=9>Oct</option>
                                                                    <option value=10>Nov</option>
                                                                    <option value=11>Dec</option>
                                                                </select>
                                                                <select id="year" onchange="jump()"></select>
                                                                <button id="next" onclick="next()">&#8250;</button>
                                                            </div>
                                                        </div>
                                                        <table class="table-calendar" id="calendar" data-lang="en">
                                                            <thead id="thead-month"></thead>
                                                            <tbody id="calendar-body"></tbody>
                                                        </table>
                                                    </div>
                                                    <div style="display: none;" id="clickedDateDisplay"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 timedivp">
                                                <h5>Select Slots here every slots Is for 30 min </h5>
                                                <div class="time-div wizard-form-radio" style="display:none">
                                                    <!-- Time slots will be populated here -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Empty column -->
                                        <div class="form-group clearfix">
                                            <a href="javascript:;"
                                                class="form-wizard-previous-btn float-left">Previous</a>
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                        </div>
                                    </fieldset>
                                    <fieldset class="wizard-fieldset">
                                        <div class="row mt-4">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <h6><b>Date of Birth*(जन्म तारीख*)</b></h6>
                                                <input type="date" name="dob" class="form-control wizard-required"
                                                    id="dob" max="" value="<?php if(!empty($single)){ echo $single->dob; } ?>">
                                                <div class="wizard-form-error bp"></div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <h6><b>Time of Birth*(जन्म वेळ*)</b></h6>
                                                <input type="time" name="tob" class="form-control wizard-required"
                                                    id="tob" value="<?php if(!empty($single)){ echo $single->tob; } ?>">
                                                <div class="wizard-form-error bp"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12 mt-4">
                                                <h6><b>Place Of Birth *(जन्म ठिकाण*)</b></h6>
                                                <div class="row mt-3">
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <h6><b>Country(देश*)</b></h6>
                                                        <input type="text" name="Country"
                                                            class="form-control wizard-required" id="dob" value="<?php if(!empty($single)){ echo $single->Country; } ?>">
                                                        <div class="wizard-form-error bp"></div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <h6><b>State*(राज्य*)</b></h6>
                                                        <input type="text" name="State"
                                                            class="form-control wizard-required" id="tob" value="<?php if(!empty($single)){ echo $single->State; } ?>">
                                                        <div class="wizard-form-error bp"></div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <h6><b>City (शहर) *</b></h6>
                                                        <input type="text" name="City"
                                                            class="form-control wizard-required" id="pob" value="<?php if(!empty($single)){ echo $single->City; } ?>">
                                                        <div class="wizard-form-error bp"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mt-3">
                                            <div class="col-lg-12 col-md-12 col-12 mt-2">
                                                <h6><b>Are you one of the twins? (आपण जुळ्यांपैकी एक आहात का? )</b></h6>
                                                <div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-6">
                                                                <div class="wizard-form-radio">
                                                                    <input name="twins" id="twinsYes" type="radio"
                                                                        value="yes" <?php if(!empty($single)){ if($single->twins == 'yes'){echo "checked" ;} } ?>>
                                                                    <label for="twinsYes">Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-6">
                                                                <div class="wizard-form-radio">
                                                                    <input name="twins" id="twinsNo" type="radio"
                                                                        checked value="no" <?php if(!empty($single)){ if($single->twins == 'no'){echo "checked" ;} } ?>>
                                                                    <label for="twinsNo">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            // Assuming $single contains your stdClass object

                                            // Initialize $selectedSubjects as an empty array
                                            $selectedSubjects = [];

                                            // Check if subjects field is not empty
                                            if (!empty($single->subjects)) {
                                                // Split the subjects string into an array
                                                $selectedSubjects = explode(',', $single->subjects);
                                                // Trim each subject
                                                $selectedSubjects = array_map('trim', $selectedSubjects);
                                                // echo "<pre>"; print_r($selectedSubjects);exit();
                                            }
                                            ?>

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12 pcotsfd">
                                                    <div class="row form-group mt-4">
                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <h6><b>Click on the subjects for discussion.(चर्चेसाठी योग्य ते विषय क्लिक करा.)</b></h6>
                                                        </div>

                                                        <?php 
                                                        // Define an array of all available subjects
                                                        $availableSubjects = array(
                                                            'Education', 'Foreign Travel', 'Marriage', 'Re-marriage', 'Child birth', 
                                                            'Love Life', 'Divorce', 'Siblings', 'Job', 'Business', 'Partnership', 
                                                            'Property', 'Others', 'Behavioural Issue', 'Finance', 'Share market', 
                                                            'Health', 'Parents relation', 'Legal case'
                                                        );

                                                        // Loop through each available subject
                                                        foreach ($availableSubjects as $subject) {
                                                            // Check if the subject is selected
                                                            $isChecked = in_array($subject, $selectedSubjects);
                                                        ?>

                                                        <div class="col-lg-3 col-md-6 col-6">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="subject_<?php echo $subject ?>" name="subjects[]" value="<?php echo $subject ?>" <?php if($isChecked) echo "checked"; ?>>
                                                                <label class="form-check-label" for="subject_<?php echo $subject ?>"><?php echo $subject ?></label>
                                                            </div>
                                                        </div>

                                                        <?php } ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        

                                        <div class="form-group clearfix">
                                            <a href="javascript:;"
                                                class="form-wizard-previous-btn float-left">Previous</a>
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                        </div>
                                    </fieldset>
                                    <fieldset class="wizard-fieldset">
                                        <h5 class="text-center">Payment Information</h4>
                                            <h6 class="text-center"><b>Kindly pay ₹ 700 by scanning QR code</b></h6>
                                            <P class="text-center">Mrunal Kulkarni</P>
                                            <div class="form-group text-center">
                                                <!-- Image for Payment -->
                                                <img class="img" src="<?=base_url(); ?>assets/images/newqr.jpeg"
                                                    alt="Payment Method">
                                            </div>
                                            <div class="text-center">
                                                <p><b>UPI Number:</b> 9822331983@idfcfirst</p>
                                                <button onclick="copyUPI(event)" class="btn btn-primary">Copy
                                                    UPI</button>
                                            </div>
                                            <div class="text-center cl-md-3">
                                                <h6><b>Transaction ID</b></h6>
                                                <input type="text" class="form-control" id="transaction_id"
                                                    name="transaction_id">
                                            </div>
                                            <div class="form-group clearfix">
                                                <a href="javascript:;"
                                                    class="form-wizard-previous-btn float-left">Previous</a>
                                                <input type="submit" class="form-wizard-submit float-right"
                                                    value="Submit">


                                            </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </section>
            </div>

        </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <script>
    jQuery(document).ready(function() {
        // click on next button
        jQuery('.form-wizard-next-btn').click(function() {
            var parentFieldset = jQuery(this).parents('.wizard-fieldset');
            var currentActiveStep = jQuery(this).parents('.form-wizard').find(
                '.form-wizard-steps .active');
            var next = jQuery(this);
            var nextWizardStep = true;
            parentFieldset.find('.wizard-required').each(function() {
                var thisValue = jQuery(this).val();

                if (thisValue == "") {
                    jQuery(this).siblings(".wizard-form-error").slideDown();
                    nextWizardStep = false;
                } else {
                    jQuery(this).siblings(".wizard-form-error").slideUp();
                }
            });
            if (nextWizardStep) {
                next.parents('.wizard-fieldset').removeClass("show", "400");
                currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',
                    "400");
                next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
                jQuery(document).find('.wizard-fieldset').each(function() {
                    if (jQuery(this).hasClass('show')) {
                        var formAtrr = jQuery(this).attr('data-tab-content');
                        jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(
                            function() {
                                if (jQuery(this).attr('data-attr') == formAtrr) {
                                    jQuery(this).addClass('active');
                                    var innerWidth = jQuery(this).innerWidth();
                                    var position = jQuery(this).position();
                                    jQuery(document).find('.form-wizard-step-move').css({
                                        "left": position.left,
                                        "width": innerWidth
                                    });
                                } else {
                                    jQuery(this).removeClass('active');
                                }
                            });
                    }
                });
            }
        });
        //click on previous button
        jQuery('.form-wizard-previous-btn').click(function() {
            var counter = parseInt(jQuery(".wizard-counter").text());;
            var prev = jQuery(this);
            var currentActiveStep = jQuery(this).parents('.form-wizard').find(
                '.form-wizard-steps .active');
            prev.parents('.wizard-fieldset').removeClass("show", "400");
            prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
            currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',
                "400");
            jQuery(document).find('.wizard-fieldset').each(function() {
                if (jQuery(this).hasClass('show')) {
                    var formAtrr = jQuery(this).attr('data-tab-content');
                    jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(
                        function() {
                            if (jQuery(this).attr('data-attr') == formAtrr) {
                                jQuery(this).addClass('active');
                                var innerWidth = jQuery(this).innerWidth();
                                var position = jQuery(this).position();
                                jQuery(document).find('.form-wizard-step-move').css({
                                    "left": position.left,
                                    "width": innerWidth
                                });
                            } else {
                                jQuery(this).removeClass('active');
                            }
                        });
                }
            });
        });
        //click on form submit button
        jQuery(document).on("click", ".form-wizard .form-wizard-submit", function() {
            var parentFieldset = jQuery(this).parents('.wizard-fieldset');
            var currentActiveStep = jQuery(this).parents('.form-wizard').find(
                '.form-wizard-steps .active');
            parentFieldset.find('.wizard-required').each(function() {
                var thisValue = jQuery(this).val();
                if (thisValue == "") {
                    jQuery(this).siblings(".wizard-form-error").slideDown();
                } else {
                    jQuery(this).siblings(".wizard-form-error").slideUp();
                }
            });
        });
        // focus on input field check empty or not
        jQuery(".form-control").on('focus', function() {
            var tmpThis = jQuery(this).val();
            if (tmpThis == '') {
                jQuery(this).parent().addClass("focus-input");
            } else if (tmpThis != '') {
                jQuery(this).parent().addClass("focus-input");
            }
        }).on('blur', function() {
            var tmpThis = jQuery(this).val();
            if (tmpThis == '') {
                jQuery(this).parent().removeClass("focus-input");
                jQuery(this).siblings('.wizard-form-error').slideDown("3000");
            } else if (tmpThis != '') {
                jQuery(this).parent().addClass("focus-input");
                jQuery(this).siblings('.wizard-form-error').slideUp("3000");
            }
        });
    });
    </script>
    <script>
    function handleAppointmentTypeChange() {
        var extraOptions = document.querySelector('.extra-options');
        var onlineRadio = document.getElementById('online');
        var offlineRadio = document.getElementById('offline');

        // If Online option is checked, show additional options and uncheck Offline option
        if (onlineRadio.checked) {
            extraOptions.style.display = 'block';
            offlineRadio.checked = false;
        } else {
            extraOptions.style.display = 'none';
        }
    }

    // Event listeners for both Online and Offline radio buttons
    document.getElementById('online').addEventListener('change', handleAppointmentTypeChange);
    document.getElementById('offline').addEventListener('change', handleAppointmentTypeChange);

    // Initial setup to ensure correct display state based on initial radio button checked state
    handleAppointmentTypeChange();
    </script>
    <script>
    function handleFriendRadioChange() {
        var friendInput = document.getElementById('friendInput');

        // If "Friend" radio button is checked, display the input field. Otherwise, hide it.
        if (document.getElementById('friendRadio').checked) {
            friendInput.style.display = 'block';
        } else {
            friendInput.style.display = 'none';
        }
    }

    // Function to handle changes in other radio buttons
    function handleOtherRadioChange() {
        var friendInput = document.getElementById('friendInput');

        // Hide the "Friend" input field if it's currently visible
        friendInput.style.display = 'none';
    }

    // Add event listeners to the radio buttons
    document.getElementById('friendRadio').addEventListener('change', handleFriendRadioChange);
    document.getElementById('instagramRadio').addEventListener('change', handleOtherRadioChange);
    document.getElementById('facebookRadio').addEventListener('change', handleOtherRadioChange);
    document.getElementById('googleRadio').addEventListener('change', handleOtherRadioChange);

    // Initial setup to ensure correct display state based on initial radio button checked state
    handleFriendRadioChange();
    </script>



    <script>
    function generate_year_range(start, end) {
        var years = "";
        for (var year = start; year <= end; year++) {
            years += "<option value='" + year + "'>" + year + "</option>";
        }
        return years;
    }

    today = new Date();
    currentMonth = today.getMonth();
    currentYear = today.getFullYear();
    selectYear = document.getElementById("year");
    selectMonth = document.getElementById("month");


    createYear = generate_year_range(1970, 2050);
    /** or
     * createYear = generate_year_range( 1970, currentYear );
     */

    document.getElementById("year").innerHTML = createYear;

    var calendar = document.getElementById("calendar");
    var lang = calendar.getAttribute('data-lang');

    var months = "";
    var days = "";

    var monthDefault = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
        "October", "November", "December"
    ];

    var dayDefault = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];

    months = monthDefault;
    days = dayDefault;

    var $dataHead = "<tr>";
    for (dhead in days) {
        $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
    }
    $dataHead += "</tr>";

    //alert($dataHead);
    document.getElementById("thead-month").innerHTML = $dataHead;


    monthAndYear = document.getElementById("monthAndYear");
    showCalendar(currentMonth, currentYear);



    function next() {
        currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
        currentMonth = (currentMonth + 1) % 12;
        showCalendar(currentMonth, currentYear);
    }

    function previous() {
        currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
        currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
        showCalendar(currentMonth, currentYear);
    }

    function jump() {
        currentYear = parseInt(selectYear.value);
        currentMonth = parseInt(selectMonth.value);
        showCalendar(currentMonth, currentYear);
    }

    function showCalendar(month, year) {

        var firstDay = (new Date(year, month)).getDay() - 1;

        tbl = document.getElementById("calendar-body");


        tbl.innerHTML = "";


        monthAndYear.innerHTML = months[month] + " " + year;
        selectYear.value = year;
        selectMonth.value = month;

        // creating all cells
        var date = 1;
        for (var i = 0; i < 6; i++) {

            var row = document.createElement("tr");


            for (var j = 0; j < 7; j++) {
                if (i === 0 && j < firstDay) {
                    cell = document.createElement("td");
                    cellText = document.createTextNode("");
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                } else if (date > daysInMonth(month, year)) {
                    break;
                } else {
                    cell = document.createElement("td");
                    cell.setAttribute("data-date", date);
                    cell.setAttribute("data-month", month + 1);
                    cell.setAttribute("data-year", year);
                    cell.setAttribute("data-month_name", months[month]);
                    cell.className = "date-picker";
                    cell.innerHTML = "<span>" + date + "</span>";

                    if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                        cell.className = "date-picker selected";
                    }
                    row.appendChild(cell);
                    date++;
                }


            }

            tbl.appendChild(row);
        }



        // onclick date shows data 
        var dateCells = document.querySelectorAll('.date-picker');
        dateCells.forEach(function(cell) {
            cell.addEventListener('click', function() {
                // Extract date and month name from clicked date element
                var clickedDate = this.getAttribute('data-date');
                var clickedMonth = this.getAttribute('data-month_name');
                var clickedYear = this.getAttribute('data-year');

                // Calculate day name
                var dateObj = new Date(clickedYear, month, clickedDate);
                var clickedDay = getDayName(dateObj.getDay());

                // Display the clicked date in the specified div
                var clickedDateDisplay = document.getElementById('clickedDateDisplay');
                clickedDateDisplay.innerHTML = clickedDate + ' ' + clickedMonth + ' ' + clickedYear +
                    ' (' + clickedDay + ')';
            });
        });

    }

    // day show

    function getDayName(dayIndex) {
        var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        return days[dayIndex];
    }


    function daysInMonth(iMonth, iYear) {
        return 32 - new Date(iYear, iMonth, 32).getDate();
    }
    </script>

    <script>
    function copyUPI() {
        /* Get the text field */
        event.preventDefault();
        var copyText = document.createElement('textarea');
        copyText.value = "9822331983@idfcfirst";

        /* Append the text field to the body */
        document.body.appendChild(copyText);

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        // alert("UPI number copied: " + copyText.value);

        /* Remove the text field from the body */
        document.body.removeChild(copyText);
    }
    </script>
    <script>
    jQuery(document).ready(function() {
        // Event listener for clicking on a date
        jQuery(document).on("click", ".date-picker", function() {
            var selectedDate = jQuery(this).text().trim();
            var month = parseInt($("#month").val()) + 1;
            var year = $("#year").val();
            var fullDate = year + '-' + month + '-' + selectedDate;

            // Set the value of the hidden input field with the selected date
            $("#selected-date").val(fullDate);

            // Pass selected date, month, year, and full date to the getSlots function
            getSlots(selectedDate, month, year, fullDate);
        });

        // Event listener for changing the month
        $("#month").change(function() {
            var selectedDate = $("#calendar-body .selected").text().trim();
            var month = parseInt($(this).val()) + 1;
            var year = $("#year").val();
            var fullDate = year + '-' + month + '-' + selectedDate;
            $("#selected-date").val(fullDate);
            getSlots(selectedDate, month, year, fullDate);
        });

        // Event listener for changing the year
        $("#year").change(function() {
            var selectedDate = $("#calendar-body .selected").text().trim();
            var month = parseInt($("#month").val()) + 1;
            var year = $(this).val();
            var fullDate = year + '-' + month + '-' + selectedDate;
            $("#selected-date").val(fullDate);
            getSlots(selectedDate, month, year, fullDate);
        });
    });

    // Function to make AJAX request to get slots
    function getSlots(selectedDate, month, year, fullDate) {
        jQuery.ajax({
            url: '<?=base_url(); ?>getslots',
            type: 'POST',
            data: {
                selected_date: selectedDate,
                month: month,
                year: year,
                full_date: fullDate
            },
            success: function(response) {
                displayTimeSlots(response, selectedDate);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Function to display time slots
    function displayTimeSlots(slotsJSON, selectedDate, fullDate) {
        // Clear any existing content in the time-div
        $(".time-div").empty();

        // Parse the JSON response
        var slots = JSON.parse(slotsJSON);

        // If no slots are available for the day, display a message
        if (slots.length === 0) {
            $(".time-div").html("<p>No slots available for this day.</p>");
            $(".time-div").show();
            return;
        }

        // Create a list element
        var $list = $('<ul>');

        // Loop through each slot and add it as a list item with radio button
        slots.forEach(function(slot) {
            var startTime = slot.start_time;
            var endTime = slot.end_time;
            var timeSlot = startTime;
            var slotId = slot.id;
            var $radioButton = $('<input type="radio" name="timeSlot" value="' + slotId + '">');
            $radioButton.attr('data-selected-date', selectedDate); // Add selected date as a data attribute
            $radioButton.attr('data-full-date', fullDate); // Add full date as a data attribute
            var $label = $('<label>').text(timeSlot);
            var $listItem = $('<li>').append($radioButton).append($label);
            $listItem.on('change', function() {
                if ($(this).find('input[type="radio"]').is(':checked')) {
                    var selectedSlotId = $(this).find('input[type="radio"]').val();
                    var selectedDate = $(this).find('input[type="radio"]').data(
                    'selected-date'); // Retrieve selected date
                    var fullDate = $(this).find('input[type="radio"]').data(
                    'full-date'); // Retrieve full date
                    console.log(
                    selectedSlotId); // You can do whatever you want with the selected slot id here
                    console.log(selectedDate); // Log or use the selected date here
                    console.log(fullDate); // Log or use the full date here
                }
            });
            $list.append($listItem);
        });

        // Append the list to the time-div
        $(".time-div").append($list);

        // Show the time-div
        $(".time-div").show();
    }
    </script>
</body>

</html>