<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #ffffff;
        /* White background color */

    }

    .container {
        max-width: 815px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #dddddd;
        /* Border color */

    }

    .header {
        background-color: #ffffff;
        color: #000;
        padding: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        font-weight: 600;
    }

    .body {
        padding: 20px;
        background-color: white;
        display: flex;
        max-width: 815px;
    }

    .first-body {
        width: 50%;
        display: inline-block;
    }

    .second-body {
        width: 50%;
        display: inline-block;

    }

    .footer {
        background-color: #4CAF50;
        color: white;
        text-align: center;
        padding: 10px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .first_part {
        padding: 20px;
        border: 1px solid #ccc;
    }

    .second_part {
        padding: 20px;
        border: 1px solid #ccc;
    }

    .third_part {
        padding: 20px;
        border: 1px solid #ccc;
    }

    .second-body {
        padding: 20px !important;
        border: 1px solid #ccc;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2> New Appointment </h2>
        </div>
        <div class="body">
            <div class="first-body">

              
                        <?php

            $dateObj = new DateTime($selectedDate);

            $formattedDate = $dateObj->format('l, M d');

            $formattedTimeSlot = date('h:i A', strtotime($timeSlot));
   
            ?>
           
                <div class="first_part">
                    <p><b>Appointment Date : </b> <?=$formattedDate;?></p>
                    <p><b>Time : </b> <?=$formattedTimeSlot;?></p>
                    <p><b>Appointment Type : </b> <?=$appointmentType;?></p>
                    <p><b>Services :</b> Prediction; 30 minutes</p>

                    <p><b>Provider:</b> Mrunal kulkarni</p>
                </div>
                <div class="second_part">

                    <p><b>Customer Name : </b> <?php echo $fullname; ?></p>

                    <p><b>Subjects :</b> <?=$subjects;?></p>


                    <p><b>Contact Number : </b> <?=$contact_number;?></p>

                    <p><b>Email Id :</b> <?=$email;?></p>

                    <p><b>Gender :</b> <?=$gender;?></p>

                    <p><b> source:</b> <?=$source;?></p>

                    <p><b>Marital Status :</b> <?=$marital_status;?></p>

                    <p><b>Are you one of the twins : </b> <?=$twins;?></p>
                    <?php //$dateofb = date('d F Y', strtotime($dob));?>

                    <?php
// Assuming $dob is in the format YYYY-MM-DD
$dobFormatted = date('d-m-Y', strtotime($dob));
?>

                    <p><b>Date of Birth:</b> <?=$dobFormatted;?></p>

                    <p><b>Time Of Birth: </b> <?=$tob;?></p>

                    <p><b>Place Of Birth :</b> <?=$City;?>, <?=$State;?>, <?=$Country;?></p>
                    <p> <b>Transaction Id: </b> <?= $transaction_id ?></p>


                </div>
                <div class="third_part">
                    <p>
                        Thanks,<br>
                        Mrunal Kulkarni
                    </p>
                </div>
                <!-- <a href="http://localhost/appointment/reschedule/<?php //echo $lastinsertid; ?>" style="ext-decoration: none;
    background-color: yellow;
    font-weight: 600;
    color: black;
    padding: 10px;
    display: inline-block;
    border-radius: 4px;">Reschedule </a> -->
            </div>
            <div class="second-body">
                <h4>Mrunal Kulkarni</h4>
                <p>Vision Plus Shop No 20 Bhaktishakti </p>
                <p>chowk Old Mumbai Pune highway</p>
                <p>PCMC</p>
                <p>Pune, Maharashtra 411044</p>
                <p>+917499846591
                </p>
                <a href="https://vedikastrologer.com/" style="font-weight: 400;
    color: #00a9ff;">View Website</a>

            </div>

        </div>

    </div>
</body>

</html>