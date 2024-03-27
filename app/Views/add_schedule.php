<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">

    <style>
    .wrapper {
        /* margin: 15px auto; */
        max-width: 1100px;
    }

    .container-calendar {
        background: #000;
        padding: 15px;
        max-width: 475px;
        margin: 0 auto;
        overflow: auto;
        border: 1px solid #eee;
    }

    .button-container-calendar button {
        cursor: pointer;
        display: inline-block;
        zoom: 1;
        background: #00a2b7;
        color: #fff;
        border: 1px solid #0aa2b5;
        border-radius: 4px;
        padding: 5px 10px;
    }

    .table-calendar {
        border-collapse: collapse;
        width: 100%;
    }

    .table-calendar td,
    .table-calendar th {
        padding: 5px;
        border: 1px solid #e2e2e2;
        text-align: center;
        vertical-align: top;
    }

    .date-picker.selected {
        font-weight: bold;
        outline: 1px dashed #00BCD4;
    }

    .date-picker.selected span {
        border-bottom: 2px solid currentColor;
    }

    /* sunday */
    .date-picker:nth-child(7) {
        color: red;
    }

    /* friday */
    .date-picker:nth-child(6) {
        /* color: green; */
        color: red;
    }

    #monthAndYear {
        text-align: center;
        margin-top: 0;
    }

    .button-container-calendar {
        position: relative;
        margin-bottom: 1em;
        overflow: hidden;
        clear: both;
    }

    #previous {
        float: left;
    }

    #next {
        float: right;
    }

    .footer-container-calendar {
        margin-top: 1em;
        border-top: 1px solid #dadada;
        padding: 10px 0;
    }

    .footer-container-calendar select {
        cursor: pointer;
        display: inline-block;
        zoom: 1;
        background: #ffffff;
        color: #585858;
        border: 1px solid #bfc5c5;
        border-radius: 3px;
        padding: 5px 1em;
    }

    .footer-container-calendar label {
        padding-left: 80px
    }

    .time-div a {
        border: 1px solid #eee;
        display: block;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 10px;
        text-align: center;
    }

    .time-div {
        border: 1px solid #eee;
        padding: 20px
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-2 col-md-2">
                <div class="form-group">
                    <!-- Image for Payment -->
                    <img class="imges" src="<?=base_url(); ?>assets/images/vedik1.jpeg" alt="Payment Method">
                </div>
            </div>
            <div class="col-lg-10 col-md-8">
                <!-- Form column -->
                <section class="wizard-section">
                    <div class="row no-gutters">

                        <div class="col-lg-12 col-md-12">
                            <div class="form-wizard">
                                <form action="formdata" method="post" role="form">
                                    <div class="form-wizard-header">
                                        <p>Fill all form field to go next step</p>
                                        <ul class="list-unstyled form-wizard-steps clearfix">
                                            <li class="active"><span>1</span></li>
                                            <li><span>2</span></li>
                                            <li><span>3</span></li>
                                            <li><span>4</span></li>
                                        </ul>
                                    </div>
                                    <fieldset class="wizard-fieldset show">
                                        <h5>Personal Information</h5>
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6><b>Name</b></h6>
                                                    <input type="text" class="form-control wizard-required"
                                                        id="fullname" name="fullname">
                                                    <!-- <label for="fullname" class="wizard-form-text-label"> Appointment
                                                        For(Name)*</label> -->
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="white-line"></div>

                                        <div class="form-group">
                                            <h6><b>Gender</b></h6>
                                            <div class="wizard-form-radio">
                                                <input name="gender" id="male" type="radio" value="Male" checked>
                                                <label for="male">Male</label>
                                            </div>
                                            <div class="wizard-form-radio">
                                                <input name="gender" id="female" type="radio" value="Female">
                                                <label for="female">Female</label>
                                            </div>
                                        </div>
                                        <div class="white-line"></div>



                                        <div class="form-group">
                                            <h6><b>Contact Number*</b></h6>
                                            <input type="text" class="form-control wizard-required" id="contact"
                                                name="contact_number">
                                            <!-- <label for="contact" class="wizard-form-text-label">Contact Number*</label> -->
                                            <div class="wizard-form-error"></div>
                                        </div>
                                        <div class="white-line"></div>

                                        <div class="form-group mt-4 row" id="appointmentType">
                                            <div class="col-md-6">
                                                <h6><b>Appointment Type</b></h6>
                                                <div class="wizard-form-radio mt-4">
                                                    <input name="appointmentType" id="online" type="radio"
                                                        value="online">
                                                    <label for="online">Online</label>
                                                </div>
                                                <div class="wizard-form-radio">
                                                    <input name="appointmentType" id="offline" type="radio" checked
                                                        value="offline">
                                                    <label for="offline">Offline</label>
                                                </div>
                                            </div>
                                            <div class="extra-options mt-5 col-md-6" id="extraOptions"
                                                style="display: none;">
                                                <div class="wizard-form-radio">
                                                    <input name="appointmentOption" id="audio" type="radio"
                                                        value="audio">
                                                    <label for="audio">Audio</label>
                                                </div>
                                                <div class="wizard-form-radio">
                                                    <input name="appointmentOption" id="video" type="radio"
                                                        value="video">
                                                    <label for="video">Video</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="white-line"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h6><b>How do you know about vedik astrologer? (वेदिक ॲस्ट्रॅालॅाजर
                                                            बद्दल कुठून माहिती मिळाली?)</b></h6>

                                                    <div class="form-inlinee mt-5">
                                                        <div class="wizard-form-radio">
                                                            <input name="source" id="instagramRadio" type="radio"
                                                                checked value="Instagram">
                                                            <label for="instagramRadio">Instagram</label>
                                                        </div>
                                                        <div class="wizard-form-radio">
                                                            <input name="source" id="facebookRadio" type="radio"
                                                                value="Facebook">
                                                            <label for="facebookRadio">Facebook</label>
                                                        </div>
                                                        <div class="wizard-form-radio">
                                                            <input name="source" id="googleRadio" type="radio"
                                                                value="Google">
                                                            <label for="googleRadio">Google</label>
                                                        </div>
                                                        <div class="wizard-form-radio">
                                                            <input name="source" id="friendRadio" type="radio"
                                                                value="Friend">
                                                            <label for="friendRadio">Friend</label>
                                                        </div>
                                                    </div>

                                                    <input type="text" class="form-control mt-2" name="friendName"
                                                        id="friendInput" style="display: none;"
                                                        placeholder="Enter Friend's Name">

                                                    <label for="friendInput" class="wizard-form-text-label"></label>
                                                    <div class="wizard-form-error"></div>



                                                </div>
                                            </div>
                                        </div>
                                        <div class="white-line"></div>
                                        <div class="form-group clearfix">
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                        </div>
                                    </fieldset>
                                    <fieldset class="wizard-fieldset">
                                        <h5>Book Slots</h5>
                                        <input type="hidden" id="selected-date" name="selectedDate">

                                        <div class="row mt-3">
                                            <div class="col-lg-8">
                                                <div class="wrapper">
                                                    <div class="container-calendar">
                                                        <h3 id="monthAndYear"></h3>
                                                        <div class="button-container-calendar">
                                                            <div class="footer-container-calendar">
                                                                <button id="previous"
                                                                    onclick="previous()">&#8249;</button>
                                                                <label for="month">Jump To: </label>
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
                                            <div class="col-lg-4">
                                            <h5>Select Slots here Avery slots Is for 30 min </h5>
                                                <div class="time-div" style="display:none">
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
                                            <div class="col-md-5">
                                                <h6><b>Date of Birth*(जन्म तारीख*)</b></h6>
                                                <input type="date" name="dob" class="form-control wizard-required"
                                                    id="dob" max="">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                            <div class="col-md-5">
                                                <h6><b>Time of Birth*(जन्म वेळ*)</b></h6>
                                                <input type="time" name="tob" class="form-control wizard-required"
                                                    id="tob">
                                                <div class="wizard-form-error"></div>
                                            </div>
                                        </div>
                                        <div class="white-line"></div>
                                        <div class="row">
                                            <div class="col-md-12 mt-4">
                                                <h6><b>Place Of Birth *(जन्म ठिकाण*)</b></h6>
                                                <div class="row mt-3">
                                                    <div class="col-md-4">
                                                        <h6><b>Country(देश*)</b></h6>
                                                        <input type="text" name="Country"
                                                            class="form-control wizard-required" id="dob">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6><b>State*(राज्य*)</b></h6>
                                                        <input type="text" name="State"
                                                            class="form-control wizard-required" id="tob">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h6><b>City (शहर) *</b></h6>
                                                        <input type="text" name="City"
                                                            class="form-control wizard-required" id="pob">
                                                        <div class="wizard-form-error"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mt-3">
                                            <div class="col-md-12 mt-2">
                                                <h6><b>Are you one of the twins? (आपण जुळ्यांपैकी एक आहात का? )</b></h6>

                                                <div class="wizard-form-radio">
                                                    <input name="twins" id="twinsYes" type="radio" value="yes">
                                                    <label for="twinsYes">Yes</label>
                                                </div>
                                                <div class="wizard-form-radio">
                                                    <input name="twins" id="twinsNo" type="radio" checked value="no">
                                                    <label for="twinsNo">No</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-4">
                                                    <h6><b>Click on the subjects for discussion.(चर्चेसाठी योग्य ते विषय
                                                            क्लिक करा.)</b></h6>

                                                    <div class="form-check form-check-inline mt-4">
                                                        <input class="form-check-input" type="checkbox" id="subject1"
                                                            name="subjects[]" value="Education">
                                                        <label class="form-check-label" for="subject1">Education</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Foreign Travel">
                                                        <label class="form-check-label" for="subject2">Foreign
                                                            Travel</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Marriage">
                                                        <label class="form-check-label" for="subject2">Marriage</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Re-marriage">
                                                        <label class="form-check-label"
                                                            for="subject2">Re-marriage</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Child
                                                            birth">
                                                        <label class="form-check-label" for="subject2">Child
                                                            birth</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Love Life">
                                                        <label class="form-check-label" for="subject2">Love Life</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Divorce">
                                                        <label class="form-check-label" for="subject2">Divorce</label>
                                                    </div>

                                                    <div class="wizard-form-error"></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Siblings">
                                                        <label class="form-check-label" for="subject2">Siblings</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Job">
                                                        <label class="form-check-label" for="subject2">Job</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Business">
                                                        <label class="form-check-label" for="subject2">Business</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Partnership">
                                                        <label class="form-check-label"
                                                            for="subject2">Partnership</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Property">
                                                        <label class="form-check-label" for="subject2">Property</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Others">
                                                        <label class="form-check-label" for="subject2">Others</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Behavioural
                                                            Issue">
                                                        <label class="form-check-label" for="subject2">Behavioural
                                                            Issue</label>
                                                    </div>

                                                    <div class="wizard-form-error"></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Finance">
                                                        <label class="form-check-label" for="subject2">Finance</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Share market">
                                                        <label class="form-check-label" for="subject2">Share
                                                            market</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Health">
                                                        <label class="form-check-label" for="subject2">Health</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Parents
                                                            relation">
                                                        <label class="form-check-label" for="subject2">Parents
                                                            relation</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="subject2"
                                                            name="subjects[]" value="Legal
                                                            case">
                                                        <label class="form-check-label" for="subject2">Legal
                                                            case</label>
                                                    </div>

                                                    <div class="wizard-form-error"></div>
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
                                        <h5 class="text-center">Payment Information</h5>
                                        <h6 class="text-center"><b>Kindly pay Rs700 by scanning QR code</b></h6>
                                        <P class="text-center">Mrunal Kulkarni</P>
                                        <div class="form-group text-center">
                                            <!-- Image for Payment -->
                                            <img class="img" src="<?=base_url(); ?>assets/images/QRcodeMrunalMam.jpg"
                                                alt="Payment Method">
                                        </div>
                                        <div class="text-center">
                                            <p><b>UPI Number:</b> 9822331983@idfcfirst</p>
                                            <button onclick="copyUPI(event)" class="btn btn-primary">Copy UPI</button>
                                        </div>

                                        <div class="form-group clearfix">
                                            <a href="javascript:;"
                                                class="form-wizard-previous-btn float-left">Previous</a>
                                            <input type="submit" class="form-wizard-submit float-right" value="Submit">


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
            url: 'getslots',
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
                var selectedDate = $(this).find('input[type="radio"]').data('selected-date'); // Retrieve selected date
                var fullDate = $(this).find('input[type="radio"]').data('full-date'); // Retrieve full date
                console.log(selectedSlotId); // You can do whatever you want with the selected slot id here
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