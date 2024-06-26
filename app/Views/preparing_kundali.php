<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kundali</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>public/css/style.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/css/responsivestyle.css">

    <style>
    body {
        /* Ensure the background image covers the entire viewport */
        height: 100vh;
        margin: 0;
        overflow: auto;
        /* Allow scrolling */
        position: relative;
        /* Positioning context for pseudo-element */
        background-color: #242527 !important;
        /* Set background color of body */
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('<?= base_url(); ?>assets/images/logo2.jpg');
        background-size: cover;
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent background */
        background-position: center;
        filter: blur(0px);
        /* Apply blur effect */
        z-index: -1;
        /* Ensure it's behind other content */
        animation: rotateBackground 30s linear infinite;
        /* Animation properties */
    }

    /* Animation for rotating the background image */
    @keyframes rotateBackground {
        from {
            transform: rotate(0deg);
            /* Start rotation from 0 degrees */
        }

        to {
            transform: rotate(360deg);
            /* Rotate to 360 degrees */
        }
    }

    .modal {
        display: none;
        /* Hide modal by default */
        position: fixed;
        /* Position the modal */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent background */
        z-index: 9999;
        /* Ensure it's on top of other content */
        justify-content: center;
        align-items: center;
    }

    /* Styles for modal content */
    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        max-width: 400px;
        text-align: center;
    }

    .button-33 {
        margin-left: 123px;
        background-color: #c2fbd7;
        border-radius: 100px;
        box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset, rgba(44, 187, 99, .15) 0 1px 2px, rgba(44, 187, 99, .15) 0 2px 4px, rgba(44, 187, 99, .15) 0 4px 8px, rgba(44, 187, 99, .15) 0 8px 16px, rgba(44, 187, 99, .15) 0 16px 32px;
        color: green;
        cursor: pointer;
        display: inline-block;
        font-family: CerebriSans-Regular, -apple-system, system-ui, Roboto, sans-serif;
        padding: 7px 20px;
        text-align: center;
        text-decoration: none;
        transition: all 250ms;
        border: 0;
        font-size: 16px;
        width: 100px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-33:hover {
        box-shadow: rgba(44, 187, 99, .35) 0 -25px 18px -14px inset, rgba(44, 187, 99, .25) 0 1px 2px, rgba(44, 187, 99, .25) 0 2px 4px, rgba(44, 187, 99, .25) 0 4px 8px, rgba(44, 187, 99, .25) 0 8px 16px, rgba(44, 187, 99, .25) 0 16px 32px;
        transform: scale(1.05) rotate(-1deg);
    }

    .button-44 {
        margin-left: 12px;
        background-color: #c2fbd7;
        border-radius: 100px;
        box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset, rgba(44, 187, 99, .15) 0 1px 2px, rgba(44, 187, 99, .15) 0 2px 4px, rgba(44, 187, 99, .15) 0 4px 8px, rgba(44, 187, 99, .15) 0 8px 16px, rgba(44, 187, 99, .15) 0 16px 32px;
        color: green;
        cursor: pointer;
        display: inline-block;
        font-family: CerebriSans-Regular, -apple-system, system-ui, Roboto, sans-serif;
        padding: 7px 20px;
        text-align: center;
        text-decoration: none;
        transition: all 250ms;
        border: 0;
        font-size: 16px;
        width: 100px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-44:hover {
        box-shadow: rgba(44, 187, 99, .35) 0 -25px 18px -14px inset, rgba(44, 187, 99, .25) 0 1px 2px, rgba(44, 187, 99, .25) 0 2px 4px, rgba(44, 187, 99, .25) 0 4px 8px, rgba(44, 187, 99, .25) 0 8px 16px, rgba(44, 187, 99, .25) 0 16px 32px;
        transform: scale(1.05) rotate(-1deg);
    }

    #mainContainer {
        margin-top: 60px;
        text-align: center;
    }

    #mainContainer p {
        color: aliceblue;
    }

    #mainContainer h1 {
        color: beige;
    }

    #mainContainer h2 {
        color: antiquewhite;
    }

    #mainContainer h4 {
        color: aliceblue;
    }

    #mainContainer h5 {
        color: aliceblue;
        margin-top: 20px;
    }
    </style>
</head>


<body class="addschedulebody">
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <h5><b>Please Take a Note</b></h5>
            <p>In this section, detailed new Kundali (Patrika) will be prepared. Prediction will not be given either
                verbally or written for the native. You need to fill a form on Prediction page, for that charges are
                different.</p>
            <p>येथे विस्तृत जन्म कुंडली (पत्रिका) बनवून मिळेल, ह्या मध्ये जातकासाठी तोंडी किंवा लेखी भविष्य कथन केले
                जाणार नाहीं. त्यासाठी Prediction विभागात जाऊन वेगळा फॉर्म भरावा, त्याचे चार्जेस वेगळे आहेत.</p>
            <p>इस प्रक्रिया में केवल विस्तृत जन्म कुंडली बनायीं जाएगी। जातक का भविष्य नहीं बताया जायेगा। उसके लिए
                Prediction विभाग में जाकर अलग फॉर्म भरना होगा और उसके चार्जेज भी अलग है।</p>
            <button class="button-33" onclick="closeModal()">Accepted</button>
        </div>
    </div>
    <div class="container" id="mainContainer">
        <h1><b>"Weekly off - Saturday & Sunday"</b></h1>
        <h2><b>Preparing Kundali - Astrologer In Pune</b></h2>
        <h5><b>Personalised Kundali / Horoscope will be prepared for an individual</h5>
        </p>
        <h5><b>(Hard copy & Soft Copy [PDF format])</b></h5>
        <p><b>[Courier charges to be borne by client]</b></p>
        <h4><b>Charting Kundali</b></h4>
        <button class="button-44" onclick="hideContainer()">fills The Details</button>
    </div>

    <div class="container addschedulec" id="scheduleContainer" style="display: none;">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <!-- Form column -->
                <section class="wizard-section">
                    <div class="row no-gutters form-wizard">
                        <div class="col-lg-2 col-md-2 col-12">
                            <!-- Image for Payment -->
                            <!-- <img class="imges" src="<?=base_url(); ?>assets/images/vedik-logo.png" alt="Payment Method"> -->
                        </div>
                        <div class="form-wizard-header col-lg-10 col-md-10 col-12">
                            <p>Preparing Kundali - Astrologer In Pune</p>
                            <ul class="list-unstyled form-wizard-steps clearfix">
                                <li class="active"><span>1</span></li>
                                <li><span class="grey">2</span></li>
                                <li><span class="grey">3</span></li>

                            </ul>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-wizard">
                                <form action="<?=base_url(); ?>kundali" method="post" role="form">

                                    <fieldset class="wizard-fieldset show">
                                        <h4>Personal Information</h4>
                                        <div class="row mt-4 mb-2">

                                            <div class="col-lg-7 col-md-7 col-12">
                                                <label for="contact_person_name">Contact Person Name (संपर्क
                                                    करणाऱ्या व्यक्तीचे नाव)
                                                    *</label>
                                                <input type="text" id="contact_person_name" name="contact_person_name"
                                                    class="form-control" required>
                                                <div class="wizard-form-error bp"></div>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-12">
                                                <label for="contact_number">Contact Number (फोन नंबर) *</label>
                                                <input type="tel" id="contact_number" name="contact_number"
                                                    class="form-control" required>

                                                <div class="wizard-form-error bp"></div>
                                            </div>
                                        </div>
                                       <h6>* Provide detail for new kundali (नविन कुडली बनवण्यासाठी माहिती द्या)</h6>
                                        <div class="row mt-4">

                                            <div class="col-lg-7 col-md-7 col-12">
                                                <label for="full_name">Full Name (पूर्ण नाव) *</label>
                                                <input type="text" id="full_name" name="full_name" class="form-control"
                                                    required>
                                                <div class="wizard-form-error bp"></div>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-12">
                                                <label for="email_address">Email Address (ई-मेल)</label>
                                                <input type="email" id="email_address" name="email_address"
                                                    class="form-control">

                                                <div class="wizard-form-error bp"></div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">

                                            <div class="col-lg-7 col-md-7 col-12">
                                                <label for="name_in_devanagari">नाम देवनागरी में लिखिये (मराठीत नाव
                                                    लिहा) *</label>
                                                <input type="text" id="name_in_devanagari" name="name_in_devanagari"
                                                    class="form-control" required>
                                                <div class="wizard-form-error bp"></div>
                                            </div>

                                            <div class="col-lg-5 col-md-5 col-12">
                                                <label for="name_in_devanagari">Date Of Birth*(जन्म तारीख*)</label>
                                                <input type="date" name="dob" class="form-control wizard-required"
                                                    id="dob" value="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d') ?>">
                                                <div class="wizard-form-error bp"></div>
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
                                                            checked>
                                                        <label for="male">Male</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    <div class="wizard-form-radio">
                                                        <input name="gender" id="female" type="radio" value="Female">
                                                        <label for="female">Female</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-12">
                                                    <h6><b>Time Of Birth*(जन्म वेळ*)</b></h6>
                                                    <input type="time" name="tob" class="form-control wizard-required"
                                                        id="tob" value="tob">
                                                    <div class="wizard-form-error bp"></div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12">
                                                <h6><b>Place Of Birth *(जन्म ठिकाण*)</b></h6>
                                                <div class="row mt-3">
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <h6><b>Country (देश*)</b></h6>

                                                        <select class="form-control choosen" id="country_id"
                                                            name="Country">
                                                            <option value="">Please select country</option>
                                                            <?php if(!empty($country)){foreach($country as $country_result){?>
                                                            <option value="<?=$country_result->id?>"
                                                                <?php if(!empty($single) && $single->Country == $country_result->id){?>selected="selected"
                                                                <?php }?>><?=$country_result->name?></option>
                                                            <?php } } ?>
                                                        </select>
                                                        <div class="wizard-form-error bp"></div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <h6><b>State (राज्य*)</b></h6>

                                                        <select class="form-control choosen" id="state_id" name="State">
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
                                                        <h6><b>City (शहर*)</b></h6>

                                                        <select class="form-control choosen" id="city_id" name="City">
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


                                        <div class="form-group clearfix">
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                        </div>
                                    </fieldset>
                                    <fieldset class="wizard-fieldset">
                                        <h4>Family details for kundali (कौटुंबिक माहिती)</h4>

                                        <div class="row mt-4">

                                            <div class="col-lg-7 col-md-7 col-12">
                                                <label for="fathers_full_name">Father's Full Name (वडीलांचे पूर्ण नाव)
                                                    *</label>
                                                <input type="text" id="fathers_full_name" name="fathers_full_name"
                                                    class="form-control" required>
                                                <div class="wizard-form-error"></div>
                                            </div>

                                            <div class="col-lg-5 col-md-5 col-12">
                                                <label for="mothers_name">Mother's Name (आईचे नाव)</label>
                                                <input type="text" id="mothers_name" name="mothers_name"
                                                    class="form-control">
                                            </div>
                                            <div class="wizard-form-error bp"></div>
                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-lg-12 col-md-12 col-12">
                                                <label for="mothers_maiden_surname">Mother's Maiden Surname (आईचे
                                                    माहेरचे आडनाव)</label>
                                                <input type="text" id="mothers_maiden_surname"
                                                    name="mothers_maiden_surname" class="form-control">
                                                <div class="wizard-form-error"></div>
                                            </div>


                                            <div class="wizard-form-error bp"></div>
                                        </div>

                                        <div class="row mt-4">

                                            <div class="col-lg-7 col-md-7 col-12">
                                                <label for="religion">Religion (धर्म) *</label>
                                                <input type="text" id="religion" name="religion" class="form-control"
                                                    required>
                                                <div class="wizard-form-error"></div>
                                            </div>

                                            <div class="col-lg-5 col-md-5 col-12">
                                                <label for="caste">Caste (जात) *</label>
                                                <input type="text" id="caste" name="caste" class="form-control"
                                                    required>
                                            </div>
                                            <div class="wizard-form-error bp"></div>
                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-lg-7 col-md-7 col-12">
                                                <label for="sub_caste">Sub Caste (पोट जात)</label>
                                                <input type="text" id="sub_caste" name="sub_caste" class="form-control">
                                                <div class="wizard-form-error"></div>
                                            </div>

                                            <div class="col-lg-5 col-md-5 col-12">
                                                <label for="gotra">Gotra (गोत्र)</label>
                                                <input type="text" id="gotra" name="gotra" class="form-control">
                                            </div>
                                            <div class="wizard-form-error bp"></div>
                                        </div>

                                        <div class="row mt-4">

                                            <div class="col-lg-12 col-md-12 col-12">
                                                <label for="address_on_kundali">Address on Kundali (कुंडलीवरील पत्ता)
                                                    *</label>
                                                <input type="text" id="address_on_kundali" name="address_on_kundali"
                                                    class="form-control" required>
                                            </div>


                                            <div class="wizard-form-error bp"></div>
                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-lg-12 col-md-12 col-12">
                                                <div class="form-group">
                                                    <h6><b>How do you know about vedik astrologer? (वेदिक ॲस्ट्रॅालॅाजर
                                                            बद्दल कुठून माहिती मिळाली?)</b></h6>

                                                    <div class="row form-inlinee">
                                                        <div class="col-lg-3 col-md-6 col-6 wizard-form-radio">
                                                            <input name="source" id="instagramRadio" type="radio"
                                                                checked value="Instagram">
                                                            <label for="instagramRadio">Instagram</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-6 wizard-form-radio">
                                                            <input name="source" id="facebookRadio" type="radio"
                                                                value="Facebook">
                                                            <label for="facebookRadio">Facebook</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-6 wizard-form-radio">
                                                            <input name="source" id="googleRadio" type="radio"
                                                                value="Google">
                                                            <label for="googleRadio">Google</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-6 wizard-form-radio">
                                                            <input name="source" id="friendRadio" type="radio"
                                                                value="Friend">
                                                            <label for="friendRadio">Friend</label>
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


                                            <div class="wizard-form-error bp"></div>
                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-lg-12 col-md-12 col-12">
                                                <div class="form-group">
                                                    <h6><b>Kundali language (कुंडली कोणत्या भाषेत बनवून हवी आहे) *</b>
                                                    </h6>

                                                    <div class="row form-inlinee">
                                                        <div class="col-lg-3 col-md-6 col-6 wizard-form-radio">
                                                            <input name="language" id="Marathi" type="radio" checked
                                                                value="Marathi">
                                                            <label for="Marathi">Marathi</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-6 wizard-form-radio">
                                                            <input name="language" id="English" type="radio"
                                                                value="English">
                                                            <label for="English">English</label>
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 col-6 wizard-form-radio">
                                                            <input name="language" id="Hindi" type="radio"
                                                                value="Hindi">
                                                            <label for="Hindi">Hindi</label>
                                                        </div>

                                                    </div>



                                                    <div class="wizard-form-error"></div>



                                                </div>
                                            </div>


                                            <div class="wizard-form-error bp"></div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <a href="javascript:;"
                                                class="form-wizard-previous-btn float-left">Previous</a>
                                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                                        </div>
                                    </fieldset>

                                    <fieldset class="wizard-fieldset">
                                        <h5 class="text-center">Payment Information</h4>
                                            <h6 class="text-center"><b>Kindly pay ₹ 300 by scanning the QR code</b></h6>
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

    <script>
    function hideContainer() {
        var mainContainer = document.getElementById('mainContainer');
        mainContainer.style.display = 'none'; // Hide the main container
        var scheduleContainer = document.getElementById('scheduleContainer');
        scheduleContainer.style.display = 'block'; // Show the schedule container
    }
    $("#country_id").change(function() {

        $.ajax({
            type: "post",
            url: "<?=base_url();?>get_state_name_location",
            data: {
                'country_id': $("#country_id").val()
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
    // Function to display the modal
    function displayModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "flex";
    }

    // Function to close the modal
    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    // Call the displayModal function when the page loads
    window.onload = displayModal;
    </script>
</body>

</html>