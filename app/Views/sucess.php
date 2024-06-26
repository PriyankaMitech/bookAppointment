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
    .addschedulesuccess {
  
        padding: 5% 17%;
}

.wizard-section {
    margin-bottom: 20px; /* Add margin bottom */
}

.imgessuccss {
    width: 150px; /* Set image width */
    display: block; /* Make image block level */
    margin: 0 auto; /* Center image horizontally */
}

.form-wizard-header h2 {
    font-size: 24px; /* Set header font size */

    margin-bottom: 10px; /* Add margin bottom */
}

.form-wizard-header h5 {
    font-size: 18px; /* Set subheader font size */
  
    margin-bottom: 20px; /* Add margin bottom */
}

.form-wizard-body {
    margin-top: 20px; /* Add margin top */
}

.form-wizard-body h4 {
    font-size: 20px; /* Set body header font size */
 
    margin-bottom: 10px; /* Add margin bottom */
}

.form-wizard-body h6 {
    font-size: 16px; /* Set body text font size */
    color: #b8b8b8;
    margin-bottom: 5px; /* Add margin bottom */
}
.form-wizard-body h6 strong{
    font-size: 16px; /* Set body text font size */
    color:#fff !important;
    margin-bottom: 5px; /* Add margin bottom */
}
.form-wizard {
 
    padding: 0px !important;
}

    </style>

</head>


<body class="addschedulebody">
   

    <div class="container addschedulec addschedulesuccess">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <!-- Form column -->
                <section class="wizard-section">
                    <div class="row no-gutters form-wizard">
                        <div class="col-lg-12 col-md-12 col-12">
                            <!-- Image for Payment -->
                            <img class="imgessuccss" src="<?=base_url(); ?>assets/images/vedik-logo.png" alt="Payment Method">
                        </div>
                        <div class="form-wizard-header col-lg-12 col-md-12 col-12">
                          
                            <h2>Appointment Booked Successfully!</h2>
                           
                            <h5>Thank you, <strong><?php echo $fullname; ?></strong>, for booking your appointment.</h5>
                          
                             
                        </div>
                       
                        <div class="form-wizard-body col-lg-12 col-md-12 col-12 text-center">
                        <h4>Your appointment details:</h4>
                        <h6><strong>Full Name:</strong> <?php echo $fullname; ?></h6>
                        <h6><strong>Appointment Type:</strong> <?php echo $appointmentType; ?></h6>
                        <h6><strong>Time Slot:</strong> <?php echo date("h:i A", strtotime($timeSlot)); ?></h6>
                        <h6><strong>Selected Date:</strong> <?php echo date("d F Y", strtotime($selectedDate)); ?></h6>
                        </div>

                           
                     

                
                    </div>
                </section>
            </div>

        </div>
    </div>


</body>
<script>
    // Redirect to 'add_schedule' after 10 seconds
    setTimeout(function() {
        window.location.href = "<?php echo site_url('add_schedule'); ?>";
    }, 10000); // 10 seconds in milliseconds
</script>
</html>