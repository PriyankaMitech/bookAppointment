<?php include('header.php');?>

<style>

.form-check-input.box {

    margin-left: -0.25rem;

}



.form-check-input.red {

    margin-left: -0.25rem;

}



.subject .form-check-label {

    padding-left: 0.25rem;

}

</style>

<div class="pcoded-content">

    <div class="pcoded-inner-content">

        <!-- Main-body start -->

        <div class="main-body">
          
            <div class="page-wrapper">

                <div class="page-header card">

                    <div class="row align-items-end">

                        <div class="col-lg-8 col">

                            <div class="page-header-title">

                                <i class="icofont icofont-file-code bg-c-blue"></i>

                                <div class="d-inline">

                                    <h4>Appointment Form (Prediction)</h4>

                                    <!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4 col">

                            <div class="page-header-breadcrumb">

                                <ul class="breadcrumb-title">

                                    <li class="breadcrumb-item">

                                        <a href="<?php echo base_url() ?>admin_dashboard">

                                            <i class="icofont icofont-home"></i>

                                        </a>

                                    </li>

                                    <li class="breadcrumb-item"><a href="#!">Appointment Form</a>

                                    </li>





                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="container">

                    <div class="card">

                      

                        <div class="card-body">

                            <form action="add_appointment" method="post">

                                <div class="form-group row">

                                    <label for="name" class="col-sm-3 col-form-label">Name:</label>

                                    <div class="col-sm-9">

                                        <input type="text" id="name" name="fullname" class="form-control" required>

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="email" class="col-sm-3 col-form-label">Email:</label>

                                    <div class="col-sm-9">

                                        <input type="email" id="email" name="email" class="form-control">

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="mobile" class="col-sm-3 col-form-label">Mobile Number:</label>

                                    <div class="col-sm-9">

                                        <input type="tel" id="mobile" name="contact_number" class="form-control"

                                            required>

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="twins" class="col-sm-3 col-form-label">Gender</label>

                                    <div class="col-sm-9">

                                        <div class="row">

                                            <div class="col-sm-2">

                                                <div class="wizard-form-radio">

                                                    <input name="gender" id="Male" type="radio" value="Male" checked>

                                                    <label for="Male">Male</label>

                                                </div>

                                            </div>

                                            <div class="col-sm-2">

                                                <div class="wizard-form-radio">

                                                    <input name="gender" id="Female" type="radio" value="Female">

                                                    <label for="Female">Female</label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="form-group row">

                                    <label for="twins" class="col-sm-3 col-form-label">Marital Status</label>

                                    <div class="col-sm-9">

                                        <div class="row">

                                            <div class="col-sm-3">

                                                <div class="wizard-form-radio">

                                                    <input name="marital_status" id="Unmarried" type="radio"

                                                        value="Unmarried" checked>

                                                    <label for="Unmarried">Unmarried</label>

                                                </div>

                                            </div>

                                            <div class="col-sm-3">

                                                <div class="wizard-form-radio">

                                                    <input name="marital_status" id="Married" type="radio"

                                                        value="Married">

                                                    <label for="Married">Married</label>

                                                </div>

                                            </div>

                                            <div class="col-sm-3">

                                                <div class="wizard-form-radio">

                                                    <input name="marital_status" id="Divorced" type="radio"

                                                        value="Divorced">

                                                    <label for="Divorced">Divorced</label>

                                                </div>

                                            </div>

                                            <div class="col-sm-3">

                                                <div class="wizard-form-radio">

                                                    <input name="marital_status" id="Widow/Widower" type="radio"

                                                        value="Widow/Widower">

                                                    <label for="Widow/Widower">Widow/Widower</label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="twins" class="col-sm-3 col-form-label">Are you one of the twins:</label>

                                    <div class="col-sm-9">

                                        <div class="row">

                                            <div class="col-sm-2">

                                                <div class="wizard-form-radio">

                                                    <input name="twins" id="twinsYes" type="radio" value="Yes">

                                                    <label for="twinsYes">Yes</label>

                                                </div>

                                            </div>

                                            <div class="col-sm-2">

                                                <div class="wizard-form-radio">

                                                    <input name="twins" id="twinsNo" type="radio" checked value="No">

                                                    <label for="twinsNo">No</label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="form-group row" id="appointmentType">

                                    <label for="mobile" class="col-sm-3 col-form-label">Appointment Type:</label>

                                    <div class="col-sm-9">

                                        <div class="row">

                                            <div class="col-sm-2">

                                                <div class="wizard-form-radio">

                                                    <input name="appointmentType" id="online" type="radio"

                                                        value="online">

                                                    <label for="online">Online</label>

                                                </div>

                                            </div>

                                            <div class="col-sm-2">

                                                <div class="wizard-form-radio">

                                                    <input name="appointmentType" id="offline" type="radio" checked

                                                        value="offline">

                                                    <label for="offline">Offline</label>

                                                </div>

                                            </div>

                                        </div>

                                        <!-- Additional options -->

                                        <div class="extra-options" id="extraOptions" style="display: none;">

                                            <div class="col-sm-2">

                                                <div class="wizard-form-radio">

                                                    <input name="appointmentOption" id="audio" type="radio"

                                                        value="audio">

                                                    <label for="audio">Audio</label>

                                                </div>

                                            </div>

                                            <div class="col-sm-2">

                                                <div class="wizard-form-radio">

                                                    <input name="appointmentOption" id="video" type="radio"

                                                        value="video">

                                                    <label for="video">Video</label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <!-- <div class="form-group row">

                                    <label for="appointment_date" class="col-sm-3 col-form-label">Appointment

                                        Date:</label>

                                    <div class="col-sm-9">

                                        <input type="date" id="appointment_date" name="appointment_date"

                                            class="form-control" required>

                                    </div>

                                </div> -->

                                <div class="form-group row">

                                    <label for="dob" class="col-sm-3 col-form-label">Date of Birth:</label>

                                    <div class="col-sm-9">

                                        <input type="date" id="dob" name="dob" class="form-control" required

                                            max="<?php echo date('Y-m-d'); ?>">

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label for="tob" class="col-sm-3 col-form-label">Time of Birth:</label>

                                    <div class="col-sm-9">

                                        <input type="time" id="tob" name="tob" class="form-control" required>

                                    </div>

                                </div>



                                <div class="form-group row">

                                    <label for="country" class="col-sm-3 col-form-label">Country:</label>

                                    <div class="col-sm-9">



                                        <select class="form-control choosen" id="country_id" name="Country">

                                            <option value="">Please select country</option>

                                            <?php if(!empty($country)){foreach($country as $country_result){?>

                                            <option value="<?=$country_result->id?>"

                                                <?php if(!empty($single) && $single->country_id == $country_result->id){?>selected="selected"

                                                <?php }?>><?=$country_result->name?></option>

                                            <?php } } ?>

                                        </select>

                                    </div>

                                </div>





                                <div class="form-group row">

                                    <label for="state" class="col-sm-3 col-form-label">State:</label>



                                    <div class="col-sm-9">

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

                                    </div>

                                </div>





                                <div class="form-group row">

                                    <label for="City" class="col-sm-3 col-form-label">City:</label>

                                    <div class="col-sm-9">

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

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <label class="col-sm-3 col-form-label">Subjects:</label>

                                    <div class="col-sm-9">

                                        <div class="row form-group subject" style="margin-left: 8px !important;">

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Education" name="subjects[]" value="Education">

                                                    <label class="form-check-label"

                                                        for="subject_Education">Education</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Foreign Travel" name="subjects[]"

                                                        value="Foreign Travel">

                                                    <label class="form-check-label" for="subject_Foreign Travel">Foreign

                                                        Travel</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Marriage" name="subjects[]" value="Marriage">

                                                    <label class="form-check-label"

                                                        for="subject_Marriage">Marriage</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Re-Marriage" name="subjects[]" value="Re-Marriage">

                                                    <label class="form-check-label"

                                                        for="subject_Re-Marriage">Re-Marriage</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Child Birth" name="subjects[]" value="Child Birth">

                                                    <label class="form-check-label" for="subject_Child Birth">Child

                                                        Birth</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Love Life" name="subjects[]" value="Love Life">

                                                    <label class="form-check-label" for="subject_Love Life">Love

                                                        Life</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox" id="subject_Divorce"

                                                        name="subjects[]" value="Divorce">

                                                    <label class="form-check-label"

                                                        for="subject_Divorce">Divorce</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Siblings" name="subjects[]" value="Siblings">

                                                    <label class="form-check-label"

                                                        for="subject_Siblings">Siblings</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox" id="subject_Job"

                                                        name="subjects[]" value="Job">

                                                    <label class="form-check-label" for="subject_Job">Job</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Business" name="subjects[]" value="Business">

                                                    <label class="form-check-label"

                                                        for="subject_Business">Business</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Partnership" name="subjects[]" value="Partnership">

                                                    <label class="form-check-label"

                                                        for="subject_Partnership">Partnership</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Property" name="subjects[]" value="Property">

                                                    <label class="form-check-label"

                                                        for="subject_Property">Property</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox" id="subject_Others"

                                                        name="subjects[]" value="Others">

                                                    <label class="form-check-label" for="subject_Others">Others</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Behavioural Issue" name="subjects[]"

                                                        value="Behavioural Issue">

                                                    <label class="form-check-label"

                                                        for="subject_Behavioural Issue">Behavioural Issue</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox" id="subject_Finance"

                                                        name="subjects[]" value="Finance">

                                                    <label class="form-check-label"

                                                        for="subject_Finance">Finance</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Share Market" name="subjects[]"

                                                        value="Share Market">

                                                    <label class="form-check-label" for="subject_Share Market">Share

                                                        Market</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox" id="subject_Health"

                                                        name="subjects[]" value="Health">

                                                    <label class="form-check-label" for="subject_Health">Health</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Parents Relation" name="subjects[]"

                                                        value="Parents Relation">

                                                    <label class="form-check-label"

                                                        for="subject_Parents Relation">Parents Relation</label>

                                                </div>

                                            </div>

                                            <div class="col-lg-3 col-md-6 col-6">

                                                <div class="form-check form-check-inline">

                                                    <input class="form-check-input" type="checkbox"

                                                        id="subject_Legal Case" name="subjects[]" value="Legal Case">

                                                    <label class="form-check-label" for="subject_Legal Case">Legal

                                                        Case</label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                              

                                <div class="form-group row">

                                    <label for="source" class="col-sm-3 col-form-label">Source</label>

                                    <div class="col-sm-9">

                                        <div class="row">

                                            <div class="col-sm-3">

                                                <div class="wizard-form-radio">

                                                    <input name="source" id="instagramRadio" type="radio"

                                                        value="Instagram" checked>

                                                    <label for="instagramRadio">Instagram</label>

                                                </div>

                                            </div>

                                            <div class="col-sm-3">

                                                <div class="wizard-form-radio">

                                                    <input name="source" id="facebookRadio" type="radio"

                                                        value="Facebook">

                                                    <label for="facebookRadio">Facebook</label>

                                                </div>

                                            </div>

                                            <div class="col-sm-3">

                                                <div class="wizard-form-radio">

                                                    <input name="source" id="googleRadio" type="radio" value="Google">

                                                    <label for="googleRadio">Google</label>

                                                </div>

                                            </div>

                                            <div class="col-sm-3">

                                                <div class="wizard-form-radio">

                                                    <input name="source" id="friendRadio" type="radio" value="Friend">

                                                    <label for="friendRadio">Friend</label>

                                                </div>

                                            </div>

                                            

                                        </div>

                                        <div id="friendNameInput" style="display: none;">

                                            <input type="text" id="friendName" name="friendName" class="form-control"

                                                placeholder="Enter Friend's Name">

                                        </div>

                                    </div>

                                </div>

                                <!-- <div class="form-group row">

                                    <label for="appointment_date" class="col-sm-3 col-form-label">Appointment

                                        Date:</label>

                                    <div class="col-sm-9">

                                        <input type="date" id="appointment_date" name="appointment_date"

                                            class="form-control" required>

                                    </div>

                                </div> -->

                                <div class="form-group row">

                                    <label for="twins" class="col-sm-3 col-form-label">Appointment Counducted</label>

                                    <div class="col-sm-9">

                                        <div class="row">

                                            <div class="col-sm-2">

                                                <div class="wizard-form-radio">

                                                    <input name="conducted" id="Yes" type="radio" value="Yes" >

                                                    <label for="Yes">Yes</label>

                                                </div>

                                            </div>

                                            <div class="col-sm-2">

                                                <div class="wizard-form-radio">

                                                    <input name="conducted" id="NO" type="radio" value="NO" checked>

                                                    <label for="NO">No</label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <div class="form-group row">

                <label for="twins" class="col-sm-3 col-form-label">तुम्ही ही पत्रिका यापूर्वी दाखवली आहे की पहिल्यांदाच ?</label>

                <div class="col-sm-9">

                <div class="row">

                    <div class="col-sm-6">

                        <div class="wizard-form-radio">

                        <input name="patirika" id="patirikaft" type="radio"

                    value="First Time" checked

                    <?php if(!empty($single)){ if($single->twins == 'First Time'){echo "checked" ;} } ?>>

                    <label for="patirikaft">First Time (पहिल्यांदाच)</label>

            </div>

        </div>

        <div class="col-sm-6">

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

                                <div class="form-group row">

                                    <label for="name" class="col-sm-3 col-form-label">Transaction id:</label>

                                    <div class="col-sm-9">

                                        <input type="text" id="transaction_id" name="transaction_id" class="form-control" >

                                    </div>

                                </div>



                                <div class="form-group row">

                                    <label for="appointment_date" class="col-sm-3 col-form-label">Appointment Date:</label>

                                    <div class="col-sm-9">

                                        <input type="date" id="appointment_date" name="appointment_date"

                                            class="form-control" required>

                                    </div>

                                </div>




                               

                     


                                <div class="form-group row">

                                    <label class="col-sm-3 col-form-label">Slots:</label>

                                    <div class="col-sm-9">

                                        <div class="row" id="slots_container">

                                            <!-- Slots will be displayed here -->

                                        </div>

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-12 text-right">

                                        <button type="submit" class="btn btn-primary">Submit</button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<?php include('footer.php');?>

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

$(document).ready(function() {

    $('#appointment_date').change(function() {

        var selectedDate = $(this).val();

        $.ajax({

            type: "POST",

            url: "getnewslots",

            data: {

                date: selectedDate

            },

            dataType: 'json', // Expect JSON data as response

            success: function(slots) {

                // Clear previous slots

                $('#slots_container').empty();

                // Check if slots array is empty

                if (slots.length === 0) {

                    $('#slots_container').html(

                        '<p>No slots available for selected date.</p>');

                } else {

                    // Iterate through each slot and append to slots container

                    $.each(slots, function(index, slot) {

                        $('#slots_container').append(

                            '<div class="col-lg-3 col-md-6 col-6"><div class="form-check form-check-inline ">' +

                            '<input class="form-check-input red" type="radio" id="slot_' +

                            slot.id + '" name="slot" value="' + slot.id + '|' + slot.start_time + '">' +

                            '<label class="form-check-label" for="slot_' + slot

                            .id +

                            '">' + slot.start_time + '</label>' +

                            '</div></div>');

                    });



                    // Add event listener to radio buttons

                    $('input[name="slot"]').change(function() {

                        var selectedSlotId = $(this).val();

                        // Now you can use selectedSlotId as needed

                        console.log(selectedSlotId);

                    });

                }

            },

            error: function(xhr, status, error) {

                // Handle errors here

                console.error(xhr.responseText);

            }

        });

    });

});

</script>



<script>

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

// Get the radio buttons

var friendRadio = document.getElementById('friendRadio');

var friendNameInput = document.getElementById('friendNameInput');



// Add event listener to the Friend radio button

friendRadio.addEventListener('change', function() {

    if (this.checked) {

        // If Friend radio button is checked, show the input field

        friendNameInput.style.display = 'block';

    } else {

        // If not checked, hide the input field

        friendNameInput.style.display = 'none';

    }

});

</script>