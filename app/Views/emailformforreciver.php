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
            background-color: #ffffff; /* White background color */
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #dddddd; /* Border color */

        }
        .header {
            background-color:#ffffff;
            color: #000;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            font-weight: 600;
        }
        .body {
            padding: 20px;
            background-color: white;
        }
        .footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Vedik Astrologer</h2>
        </div>
        <div class="body">
            <p>Hi <?php echo $fullname; ?>,</p>
            <p>Thank you for booking with us! Your appointment request has been accepted.</p>
            <?php

                $dateObj = new DateTime($selectedDate);

                $formattedDate = $dateObj->format('l, M d');

                $formattedTimeSlot = date('h:i A', strtotime($timeSlot));

            ?>

            <p>We're looking forward to seeing you on
                <?=$formattedDate;?>, at <?=$formattedTimeSlot;?>.
            </p>
            <p>Here's what you booked</p>


                <p><b>Services:</b> Prediction; 30 minutes </p>
                <p><b>Date :</b> <?=$formattedDate;?>, </p>
                <p><b>Time : </b> <?=$formattedTimeSlot;?> </p>
                <p><b>Appoinment type : </b> <?=$appointmentType;?> </p>
                <!-- <p><b>Staff :</b> Mrunal kulkarni</p> -->
                <!-- <p><b>Message:</b> 4thenad zv</p> -->

                <!-- <p><b>Location:</b> No location added</p> -->

         
                <a href="http://localhost/appointment/reschedule/<?php echo $lastinsertid; ?>" style="ext-decoration: none;
                    background-color: yellow;
                    font-weight: 600;
                    color: black;
                    padding: 10px;
                    display: inline-block;
                    border-radius: 4px;
                    margin-top: 10%;
                    ">Reschedule 
                </a>

        </div>
     
    </div>
</body>
</html>
