<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Schedule</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"

        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/css/style.css">



    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/responsivestyle.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="./style.css">


<link rel="icon" href="data:;base64,iVBORw0KGgo=">




    <style>
        .date-picker {
            cursor: pointer;
        }
        .selected {
            background-color: white;
            color: black;
            font-weight: bold;
        }
        .date-picker.highlighted {
    background-color: #ffc107; /* Change this to your preferred background color */
    color: #fff; /* Change this to your preferred text color */
}

.input-group-append {
  cursor: pointer;
}
.error{
    color:red;
}





    </style>


</head>





<body class="addschedulebody">





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

                                                    <h6><b>Name</b> <span class="error">*</span></h6>

                                                    <input type="hidden" id="ap_id" name="ap_id"

                                                        value="<?php if(!empty($single)){ echo $single->ap_id ; } ?>">

                                                    <input type="text" class="form-control wizard-required"

                                                        id="fullname" name="fullname"

                                                        value="<?php if(!empty($single)){ echo $single->fullname; } ?>">

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

                                                        <input name="gender" id="male" type="radio" value="Male" checked

                                                            <?php if(!empty($single)){ if($single->gender == 'Male'){echo "checked" ;} } ?>>

                                                        <label for="male">Male</label>

                                                    </div>

                                                </div>

                                                <div class="col-lg-3 col-md-3 col-6">

                                                    <div class="wizard-form-radio">

                                                        <input name="gender" id="female" type="radio" value="Female"

                                                            <?php if(!empty($single)){ if($single->gender == 'Female'){echo "checked" ;} } ?>>

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

                                                        <input name="marital_status" id="unmarried"  type="radio"

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

                                            <h6><b>Contact Number</b><span class="error"> *</span></h6>

                                            <input type="text" class="form-control wizard-required" id="contact"

                                                name="contact_number"

                                                value="<?php if(!empty($single)){ echo $single->contact_number; } ?>">

                                            <div class="wizard-form-error"></div>

                                        </div>

                                        <div class="form-group">

                                            <h6><b>Email</b></h6>

                                            <input type="email" class="form-control" id="email" name="email"

                                                value="<?php if(!empty($single)){ echo $single->email; } ?>">

                                            <div class="wizard-form-error"></div>

                                            <label class="text-muted">You will receive details about your appointment

                                                via email.</label>

                                        </div>


                                        <div class="form-group row" id="appointmentType">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <h6><b>Appointment Type</b></h6>
            </div>
            <div class="col-lg-4 col-md-4 col-6 wizard-form-radio">
                <input name="appointmentType" id="online" type="radio" value="online"
                    <?php if(!empty($single)){ if($single->appointmentType == 'online'){echo "checked" ;} } ?>>
                <label for="online">Online</label>
            </div>
            <div class="col-lg-4 col-md-4 col-6 wizard-form-radio">
                <input name="appointmentType" id="offline" type="radio" value="offline"
                    <?php if(!empty($single)){ if($single->appointmentType == 'offline'){echo "checked" ;} } ?>>
                <label for="offline">Offline</label>
            </div>
        </div>
    </div>
    <div class="extra-options col-md-12" id="extraOptions" style="display: none;">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-6 wizard-form-radio">
                <input name="appointmentOption" id="audio" type="radio" value="audio"
                    <?php if(!empty($single)){ if($single->appointmentOption == 'audio'){echo "checked" ;} } ?>>
                <label for="audio">Audio</label>
            </div>
            <div class="col-lg-4 col-md-4 col-6 wizard-form-radio">
                <input name="appointmentOption" id="video" type="radio" value="video"
                    <?php if(!empty($single)){ if($single->appointmentOption == 'video'){echo "checked" ;} } ?>>
                <label for="video">Video</label>
            </div>
        </div>
        <div class="wizard-form-error" style="display: none; color: red; top: 31px;">Please select an appointment option.</div>
    </div>
</div>


                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <h6 style="line-height: 1 !important;"><b>How do you know about vedik astrologer ? 
                                                   </b></h6>
                                                   <p style="padding-bottom: 5px !important;"> <small> (वेदिक ॲस्ट्रॅालॅाजर

                                                    बद्दल कुठून माहिती मिळाली?) </small></p>



                                                    <div class="row">
                                                        <div class="col wizard-form-radio">
                                                            <input name="source" id="instagramRadio" type="radio" value="Instagram"
                                                                <?php if(!empty($single)){ if($single->source == 'Instagram'){echo "checked" ;} } ?>>
                                                            <label for="instagramRadio">Instagram</label>
                                                        </div>
                                                        <div class="col wizard-form-radio">
                                                            <input name="source" id="facebookRadio" type="radio" value="Facebook"
                                                                <?php if(!empty($single)){ if($single->source == 'Facebook'){echo "checked" ;} } ?>>
                                                            <label for="facebookRadio">Facebook</label>
                                                        </div>
                                                        <div class="col wizard-form-radio">
                                                            <input name="source" id="googleRadio" type="radio" value="Google"
                                                                <?php if(!empty($single)){ if($single->source == 'Google'){echo "checked" ;} } ?>>
                                                            <label for="googleRadio">Google</label>
                                                        </div>
                                                        <div class="col wizard-form-radio">
                                                            <input name="source" id="friendRadio" type="radio" value="Friend"
                                                                <?php if(!empty($single)){ if($single->source == 'Friend'){echo "checked" ;} } ?>>
                                                            <label for="friendRadio">Friend</label>
                                                        </div>
                                                        <div class="col wizard-form-radio">
                                                            <input name="source" id="RepeatRadio" type="radio" value="Repeat"
                                                                <?php if(!empty($single)){ if($single->source == 'Repeat'){echo "checked" ;} } ?>>
                                                            <label for="RepeatRadio">Repeat</label>
                                                        </div>
                                                    </div>



                                                    <input type="text" class="form-control mt-2" name="friendName"

                                                        id="friendInput" style="display: none;"

                                                        placeholder="Enter Friend's Name"

                                                        value="<?php if(!empty($single)){ echo $single->friendName; } ?>">



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

                                        <input type="hidden" id="selected-date" name="selectedDate"

                                            value="<?php if(!empty($single)){ echo $single->appointment_date; } ?>">



                                        <div class="row mt-3">

                                            <div class="col-lg-7">

                                                <h5>Select Date </h5>

                                                <div class="wrapper">

                                                    <div class="container-calendar">

                                                        <h3 id="monthAndYear"></h3>

                                                        <div class="button-container-calendar">

                                                            <div class="footer-container-calendar">

                                                                <!-- <button id="previous"

                                                                    onclick="previous()">&#8249;</button> -->

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

                                                                <!-- <button id="next" onclick="next()">&#8250;</button> -->

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

                                                <h6>Select slots (every slots for 30 min)</h6>

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
                                            <h6><b>Date Of Birth (जन्म तारीख)</b> <span class="error"> *</span></h6>
                                            <div class="input-group date" id="datepicker">
                                                <input type="text" class="form-control wizard-required" id="date" name="dob" 
                                                    value="<?php if(!empty($single)){ echo $single->dob; } ?>">
                                                <div class="wizard-form-error bp"></div>
                                                <span class="input-group-append">
                                                    <span class="input-group-text d-block calendar-icon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <h6><b>Time Of Birth (जन्म वेळ) <span class="error"> *</span></b></h6>
                                            <input type="time" name="tob" class="form-control wizard-required time-pickable" id="tob" value="<?php if(!empty($single)){ echo $single->tob; } ?>">
                                            <div class="wizard-form-error bp"></div>
                                        </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-12 mt-4">

                                                <h6><b>Place Of Birth (जन्म ठिकाण)</b></h6>

                                                <div class="row mt-3">

                                                    <div class="col-lg-4 col-md-4 col-12">

                                                        <h6><b>Country (देश)</b> <span class="error"> *</span></h6>

                                                        <select class="form-control choosen wizard-required" id="country_id" name="Country">
                                        <option value="">Please select country</option>
                                        <?php if (!empty($country)) {
                                            foreach ($country as $country_result) {
                                                $selected = '';
                                                if ($country_result->id == '101') {
                                                    $selected = 'selected="selected"';
                                                }
                                                ?>
                                                <option value="<?= $country_result->id ?>" <?= $selected ?>><?= $country_result->name ?></option>
                                            <?php } 
                                        } ?>
                                    </select>
                                                        <div class="wizard-form-error bp"></div>

                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-12">

                                                        <h6><b>State (राज्य)</b> <span class="error"> *</span></h6>

                                                            <select class="form-control choosen wizard-required" id="state_id" name="State">

                                                                <option value="">Please select state</option>

                                                                <?php if((!empty($single)) != "") {?>

                                                                <?php 

                                                                    if(!empty($states)){

                                                                        

                                                                    foreach($states as $state_result){

                                                                        ?>



                                                                <option value="<?=$state_result->id?>"

                                                                    <?php if(!empty($single) && $single->state_id == $state_result->id){?>selected="selected"

                                                                    <?php }?>><?=$state_result->name?></option>

                                                                <?php } } ?>

                                                                <?php }?>

                                                            </select>

                                                        <div class="wizard-form-error bp"></div>

                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-12">

                                                        <h6><b>City (शहर)</b> <span class="error"> *</span></h6>

                                                        <!-- <input type="text" name="City"

                                                            class="form-control wizard-required" id="pob"

                                                            value="<?php if(!empty($single)){ echo $single->City; } ?>">

                                                         -->

                                                         <select class="form-control choosen wizard-required" id="city_id" name="City">

                                                                <option value="">Please select city</option>

                                                                <?php if((!empty($single)) != "") {?>

                                                                <?php if(!empty($citys)){foreach($citys as $city_result){?>

                                                                <option value="<?=$city_result->id?>"

                                                                    <?php if(!empty($single) && $single->city_id == $city_result->id){?>selected="selected"

                                                                    <?php }?>><?=$city_result->name?></option>

                                                                <?php } } ?>

                                                                <?php }?>

                                                            </select>

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

                                                                        value="Yes"

                                                                        <?php if(!empty($single)){ if($single->twins == 'Yes'){echo "checked" ;} } ?>>

                                                                    <label for="twinsYes">Yes</label>

                                                                </div>

                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-6">

                                                                <div class="wizard-form-radio">

                                                                    <input name="twins" id="twinsNo" type="radio"

                                                                        checked value="No"

                                                                        <?php if(!empty($single)){ if($single->twins == 'No'){echo "checked" ;} } ?>>

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

                                                            <h6><b>Click on the subjects for discussion.(चर्चेसाठी योग्य

                                                                    ते विषय क्लिक करा.)</b> <span class="error"> *</span></h6>

                                                        </div>



                                                        <?php 
                                                            // Define an array of all available subjects
                                                            $availableSubjects = array(
                                                                'Education', 'Foreign Travel', 'Marriage', 'Re-Marriage', 'Child Birth', 
                                                                'Love Life', 'Divorce', 'Siblings', 'Job', 'Business', 'Partnership', 
                                                                'Property', 'Others', 'Behavioural Issue', 'Finance', 'Share Market', 
                                                                'Health', 'Parents Relation', 'Legal Case'
                                                            );

                                                            // Loop through each available subject
                                                            foreach ($availableSubjects as $subject) {
                                                                // Check if the subject is selected
                                                                $isChecked = ($subject === 'Others'); // Set "Others" as selected by default
                                                            ?>

                                                            <div class="col-lg-4 col-md-6 col-6">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="subject_<?php echo $subject ?>"
                                                                        name="subjects[]" value="<?php echo $subject ?>"
                                                                        <?php if($isChecked) echo "checked"; ?>>
                                                                    <label class="form-check-label"
                                                                        for="subject_<?php echo $subject ?>"><?php echo $subject ?></label>
                                                                </div>
                                                            </div>

                                                            <?php } ?>




                                                    </div>

                                                </div>


                                                <div class="col-lg-12 col-md-12 col-12 mt-2">




                                                    <h6 style="line-height: 1 !important;"><b>Have you taken prediction from me for the same person before ?
                                                   </b></h6>
                                                   <p style="padding-bottom: 5px !important;"><small> ( तुम्ही ही पत्रिका यापूर्वी मला दाखवली आहे की पहिल्यांदाच ? )</small> <span class="error"> *</span> </p> 

                                                <div>

                                                    <div class="col-lg-12 col-md-12 col-12">

                                                        <div class="row">

                                                            <div class="col-lg-6 col-md-6 col-6">

                                                                <div class="wizard-form-radio">

                                                                    <input name="patirika" id="patirikaft" type="radio"

                                                                        value="First Time" checked

                                                                        <?php if(!empty($single)){ if($single->twins == 'First Time'){echo "checked" ;} } ?>>

                                                                    <label for="patirikaft">First Time (पहिल्यांदाच)</label>

                                                                </div>

                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-6">

                                                                <div class="wizard-form-radio">

                                                                    <input name="patirika" id="patirikar" type="radio"

                                                                        value="Repeat"

                                                                        <?php if(!empty($single)){ if($single->twins == 'Repeat'){echo "checked" ;} } ?>>

                                                                    <label for="patirikar">Repeat (पुन्हा एकदा)</label>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script><script  src="./script.js"></script>


    <script>
jQuery(document).ready(function() {
    // Show extra options when 'online' is selected
    jQuery('input[name="appointmentType"]').on('change', function() {
        if (jQuery(this).val() === 'online') {
            jQuery('#extraOptions').show();
        } else {
            jQuery('#extraOptions').hide();
            jQuery('#extraOptions .wizard-form-error').hide(); // Hide error message if showing
        }
    });

    // Initial check to show/hide extra options based on the preselected value
    if (jQuery('input[name="appointmentType"]:checked').val() === 'online') {
        jQuery('#extraOptions').show();
    } else {
        jQuery('#extraOptions').hide();
    }

    // Click on next button
    jQuery('.form-wizard-next-btn').click(function() {
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        var next = jQuery(this);
        var nextWizardStep = true;

        parentFieldset.find('.wizard-required').each(function() {
            var thisValue = jQuery(this).val();

            if (thisValue == "") {
                jQuery(this).siblings(".wizard-form-error").show();
                nextWizardStep = false;
            } else {
                jQuery(this).siblings(".wizard-form-error").hide();
            }
        });

        // Check if 'online' is selected and ensure an appointment option is selected
        if (jQuery('input[name="appointmentType"]:checked').val() === 'online') {
            if (!jQuery('input[name="appointmentOption"]:checked').length) {
                jQuery('#extraOptions .wizard-form-error').show();
                nextWizardStep = false;
            } else {
                jQuery('#extraOptions .wizard-form-error').hide();
            }
        }

        if (nextWizardStep) {
            next.parents('.wizard-fieldset').removeClass("show", "400");
            currentActiveStep.removeClass('active').addClass('activated').next().addClass('active', "400");
            next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
            jQuery(document).find('.wizard-fieldset').each(function() {
                if (jQuery(this).hasClass('show')) {
                    var formAtrr = jQuery(this).attr('data-tab-content');
                    jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function() {
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

    // Click on previous button
    jQuery('.form-wizard-previous-btn').click(function() {
        var counter = parseInt(jQuery(".wizard-counter").text());
        var prev = jQuery(this);
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        prev.parents('.wizard-fieldset').removeClass("show", "400");
        prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
        currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active', "400");
        jQuery(document).find('.wizard-fieldset').each(function() {
            if (jQuery(this).hasClass('show')) {
                var formAtrr = jQuery(this).attr('data-tab-content');
                jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function() {
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

    // Click on form submit button
    jQuery(document).on("click", ".form-wizard .form-wizard-submit", function() {
        var parentFieldset = jQuery(this).parents('.wizard-fieldset');
        var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
        var valid = true;

        parentFieldset.find('.wizard-required').each(function() {
            var thisValue = jQuery(this).val();
            if (thisValue == "") {
                jQuery(this).siblings(".wizard-form-error").show();
                valid = false;
            } else {
                jQuery(this).siblings(".wizard-form-error").hide();
            }
        });

        // Check if 'online' is selected and ensure an appointment option is selected
        if (jQuery('input[name="appointmentType"]:checked').val() === 'online') {
            if (!jQuery('input[name="appointmentOption"]:checked').length) {
                jQuery('#extraOptions .wizard-form-error').show();
                valid = false;
            } else {
                jQuery('#extraOptions .wizard-form-error').hide();
            }
        }

        return valid;
    });

    // Focus on input field check empty or not
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
            jQuery(this).siblings('.wizard-form-error').show();
        } else if (tmpThis != '') {
            jQuery(this).parent().addClass("focus-input");
            jQuery(this).siblings('.wizard-form-error').hide();
        }
    });
});


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

        var today = new Date();
        var currentMonth = today.getMonth();
        var currentYear = today.getFullYear();
        var selectYear = $("#year");
        var selectMonth = $("#month");

        function generate_year_range(start, end) {
            var years = "";
            for (var year = start; year <= end; year++) {
                years += "<option value='" + year + "'>" + year + "</option>";
            }
            return years;
        }

        var createYear = generate_year_range(1970, 2050);
        $("#year").html(createYear);

        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
            "October", "November", "December"
        ];

        var days = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];

        var monthAndYear = $("#monthAndYear");

        var $dataHead = "<tr>";
        for (var dhead in days) {
            $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
        }
        $dataHead += "</tr>";

        $("#thead-month").html($dataHead);

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
            currentYear = parseInt(selectYear.val());
            currentMonth = parseInt(selectMonth.val());
            showCalendar(currentMonth, currentYear);
        }

        function showCalendar(month, year) {
            var today = new Date();
            var todayDay = today.getDate();
            var todayMonth = today.getMonth();
            var todayYear = today.getFullYear();

            var firstDay = (new Date(year, month)).getDay() - 1;

            var tbl = $("#calendar-body");
            tbl.html("");

            monthAndYear.html(months[month] + " " + year);
            selectYear.val(year);
            selectMonth.val(month);

            var date = 1;
            for (var i = 0; i < 6; i++) {
                var row = $("<tr></tr>");
                for (var j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDay) {
                        var cell = $("<td></td>");
                        cell.append(document.createTextNode(""));
                        row.append(cell);
                    } else if (date > daysInMonth(month, year)) {
                        break;
                    } else {
                        var cell = $("<td></td>");
                        cell.attr({
                            "data-date": date,
                            "data-month": month + 1,
                            "data-year": year,
                            "data-month_name": months[month]
                        });
                        cell.addClass("date-picker");
                        cell.html("<span>" + date + "</span>");

                        if (date === todayDay && year === todayYear && month === todayMonth) {
                            cell.addClass("selected");
                            $("#selected-date").val(year + '-' + (month + 1) + '-' + date);
                            getSlots(date, month + 1, year, year + '-' + (month + 1) + '-' + date);
                        }
                        row.append(cell);
                        date++;
                    }
                }
                tbl.append(row);
            }

            $(".date-picker").on("click", function() {
                $(".date-picker").removeClass("selected");
                $(this).addClass("selected");

                var selectedDate = $(this).attr('data-date');
                var selectedMonth = $(this).attr('data-month');
                var selectedYear = $(this).attr('data-year');
                var fullDate = selectedYear + '-' + selectedMonth + '-' + selectedDate;
                $("#selected-date").val(fullDate);

                getSlots(selectedDate, selectedMonth, selectedYear, fullDate);
            });

            $(".date-picker").each(function() {
                var cellDate = new Date($(this).attr('data-year'), month, $(this).attr('data-date'));
                if (cellDate < today && !isToday(cellDate)) {
                    $(this).css({
                        "pointer-events": "none",
                        "opacity": "0.5"
                    });
                }
            });
        }

        function daysInMonth(iMonth, iYear) {
            return 32 - new Date(iYear, iMonth, 32).getDate();
        }

        function getDayName(dayIndex) {
            var dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
            return dayNames[dayIndex];
        }

        function isToday(date) {
            var today = new Date();
            return date.getDate() === today.getDate() &&
                date.getMonth() === today.getMonth() &&
                date.getFullYear() === today.getFullYear();
        }

        $(document).ready(function() {
            $(document).on("click", ".date-picker", function() {
                var selectedDate = $(this).text().trim();
                var month = parseInt($("#month").val()) + 1;
                var year = $("#year").val();
                var fullDate = year + '-' + month + '-' + selectedDate;

                $("#selected-date").val(fullDate);
                getSlots(selectedDate, month, year, fullDate);
            });

            $("#month").change(function() {
                var selectedDate = $("#calendar-body .selected").text().trim();
                var month = parseInt($(this).val()) + 1;
                var year = $("#year").val();
                var fullDate = year + '-' + month + '-' + selectedDate;
                $("#selected-date").val(fullDate);
                getSlots(selectedDate, month, year, fullDate);
            });

            $("#year").change(function() {
                var selectedDate = $("#calendar-body .selected").text().trim();
                var month = parseInt($("#month").val()) + 1;
                var year = $(this).val();
                var fullDate = year + '-' + month + '-' + selectedDate;
                $("#selected-date").val(fullDate);
                getSlots(selectedDate, month, year, fullDate);
            });
        });

        function getSlots(selectedDate, month, year, fullDate) {
            $.ajax({
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

        function displayTimeSlots(slotsJSON, selectedDate) {
            $(".time-div").empty();

            var slots = JSON.parse(slotsJSON);

            if (slots.length === 0) {
                $(".time-div").html("<p>No slots available for this day.</p>");
                $(".time-div").show();
                return;
            }

            var $list = $('<ul class="row slotlist">');

            slots.forEach(function(slot) {
                var startTime = slot.start_time;
                var slotId = slot.id;
                var $radioButton = $('<input type="radio" name="timeSlot" value="' + slot.id + '|' + slot.start_time + '">');
                $radioButton.attr('data-selected-date', selectedDate);
                $radioButton.attr('data-full-date', fullDate);
                var $label = $('<label>').text(startTime);
                var $listItem = $('<li>').addClass("col-md-6").append($radioButton).append($label);
                $listItem.on('change', function() {
                    if ($(this).find('input[type="radio"]').is(':checked')) {
                        var selectedSlotId = $(this).find('input[type="radio"]').val();
                        var selectedDate = $(this).find('input[type="radio"]').data('selected-date');
                        var fullDate = $(this).find('input[type="radio"]').data('full-date');
                        console.log(selectedSlotId);
                        console.log(selectedDate);
                        console.log(fullDate);
                    }
                });
                $list.append($listItem);
            });

            $(".time-div").append($list);
            $(".time-div").show();
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

        alert("UPI number copied: " + copyText.value);



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



        var $list = $('<ul class="row slotlist">');



        // Loop through each slot and add it as a list item with radio button

        slots.forEach(function(slot) {

            var startTime = slot.start_time;

            var endTime = slot.end_time;

            var timeSlot = startTime;

            var slotId = slot.id;

            var $radioButton = $('<input type="radio" name="timeSlot" value="' + slot.id + '|' + slot.start_time + '">');

            $radioButton.attr('data-selected-date', selectedDate); // Add selected date as a data attribute

            $radioButton.attr('data-full-date', fullDate); // Add full date as a data attribute

            var $label = $('<label>').text(timeSlot); // corrected label class attribute

            var $listItem = $('<li>').addClass("col-md-6").append($radioButton).append(

            $label); // corrected list item class attribute

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

    <script>

    // Get today's date

    var today = new Date();



    // Format the date in yyyy-mm-dd (the same format as input type="date")

    var dd = String(today.getDate()).padStart(2, '0');

    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!

    var yyyy = today.getFullYear();



    today = yyyy + '-' + mm + '-' + dd;



    // Set the max attribute of the input field to today's date

    document.getElementById("dob").setAttribute("max", today);

    </script>



<script>


jQuery(document).ready(function() {
    // Event listener for country change
    $("#country_id").change(function() {
        var countryId = $(this).val(); // Get the selected country ID
        if (countryId !== '') {
            $.ajax({
                type: "post",
                url: "<?=base_url();?>get_state_name_location",
                data: {
                    'country_id': countryId
                },
                success: function(data) {
                    console.log(data);
                    $('#state_id').empty();
                    $('#state_id').append('<option value="">Choose ...</option>');
                    var opts = $.parseJSON(data);
                    $.each(opts, function(i, d) {
                        $('#state_id').append('<option value="' + d.id + '">' + d.name +
                            '</option>');
                    });
                    $('#state_id').trigger("chosen:updated");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    });

    // Trigger change event if country is already selected
    if ($("#country_id").val() !== '') {
        $("#country_id").trigger("change");
    }
});


$("#state_id").change(function() {



    $.ajax({

        type: "post",

        url: "<?=base_url();?>get_city_name_location",

        data: {

            'state_id': $("#state_id").val()

        },

        success: function(data) {

            console.log(data);

            $('#city_id').empty();

            $('#city_id').append('<option value="">Choose ...</option>');

            var opts = $.parseJSON(data);

            $.each(opts, function(i, d) {

                $('#city_id').append('<option value="' + d.id + '">' + d.name +

                    '</option>');

            });

            $('#city_id').trigger("chosen:updated");

        },

        error: function(jqXHR, textStatus, errorThrown) {

            console.log(textStatus, errorThrown);

        }

    });

})

</script>

<script>
$(document).ready(function(){
    var today = new Date();

    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd', // Adjust the format as per your requirement
        endDate: today,
        autoclose: true
    });

    $('#date').on('focus', function(){
        $('#datepicker').datepicker('show');
    });
});
</script>
<script>
$(document).ready(function() {
    const picker = buildPicker();
    let activePicker = null;

    function buildPicker() {
        const picker = $('<div>').addClass('time-picker');
        const hourOptions = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12].map(numberToOption);
        const minuteOptions = [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55].map(numberToOption);

        picker.html(`
            <select class="time-picker__select">
                ${hourOptions.join("")}
            </select>
            :
            <select class="time-picker__select">
                ${minuteOptions.join("")}
            </select>
            <select class="time-picker__select">
                <option value="am">am</option>
                <option value="pm">pm</option>
            </select>
        `);

        picker.on("change", "select", function() {
            updateTime();
        });

        return picker;
    }

    function updateTime() {
        if (activePicker) {
            const selects = activePicker.find('.time-picker__select');
            $('#tob').val(`${selects.eq(0).val()}:${selects.eq(1).val()} ${selects.eq(2).val()}`);
        }
    }

    function showPicker() {
        if (activePicker) return;

        const inputPosition = $('#tob').offset();

        picker.css({
            top: inputPosition.top + $('#tob').outerHeight(),
            left: inputPosition.left
        });

        $('body').append(picker);
        activePicker = picker;

        $(document).on("mousedown", onClickAway);
    }

    function hidePicker() {
        if (!activePicker) return;

        activePicker.remove();
        activePicker = null;

        $(document).off("mousedown", onClickAway);
    }

    function onClickAway(event) {
        if (!activePicker.is(event.target) && !$('#tob').is(event.target)) {
            hidePicker();
        }
    }

    $('#tob').on("focus", showPicker);
});


jQuery(document).ready(function() {
    jQuery('#tob').on('focus click', function() {
        this.showPicker();
    });
});
</script>





</body>



</html>