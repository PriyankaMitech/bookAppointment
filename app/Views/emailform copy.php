<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Appointment</title>
    <meta name="description" content="Appointment Reminder Email Template">
</head>
<style>
    a:hover {text-decoration: underline !important;}    
</style>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <!-- Logo -->
                    <tr>
                        <!-- <td style="text-align:center;">
                          <a href="https://vedikastrologer.com/" title="logo" target="_blank">
                            <img width="60" src="<?=base_url(); ?>assets/images/vedik-logo.png"  title="logo" alt="logo">
                          </a>
                        </td> -->
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <!-- Email Content -->
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <!-- Title -->
                                <tr>
                                    <td style="padding:0 15px; text-align:center;">
                                        <h1 style="color:#1e1e2d; font-weight:400; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">Appointment</h1>
                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; 
                                        width:100px;"></span>
                                    </td>
                                </tr>
                                <!-- Details Table -->
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0"
                                            style="width: 100%; border: 1px solid #ededed">
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        Customer Name:</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        <?php echo $fullname; ?></td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        Appointment Type:</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        <?php echo $appointmentType; ?></td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        Time :</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        <?php echo $timeSlot; ?></td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed;border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        Selected Date:</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        <?php echo $selectedDate; ?></td>
                                                </tr>
                                                <!-- Address -->
                                                <!--  -->
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <!-- Reschedule Button -->
                                <tr>
                                    <td style="text-align:center;">
                                    <label>If You want Reschedule Your Appointment then fill this Form </label>
                                        <a href="http://localhost/appointment/reschedule/<?php echo $lastinsertid; ?>" style="text-decoration:none; background-color: #b2d0b3; color: white; padding: 7px 20px; display: inline-block; border-radius: 4px;">Reschedule</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;">Regards,<br>Mrunal Kulkarni</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;">Vision plus shop no 20 bhaktishakti chowk old Mumbai pune highway pcmc pune Maharashtra 411044<br>7499846591</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                                <p style="font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;">&copy; <strong>https://vedikastrologer.com/</strong></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
