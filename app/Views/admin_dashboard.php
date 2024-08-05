<?php 

$file = __DIR__ . "/header.php";
if (file_exists($file)) {
    include $file;
} else {
    echo "File not found: $file";
}
?>

<style>
    .md-tabs .nav-item {
    text-align: justify !important;
}


        .widget-card-1 {
            cursor: pointer;
        }
        .widget-card-1 a {
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
            width: 100%;
        }

      

    /* For small screens, switch to two lines */
    @media (max-width: 767px) {
        .nav-tabs .nav-item {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .profile8{
            margin-left: 76px !important;
        }
        .nav-tabs {
        display: flex;
        flex-wrap: wrap;
    }

    .nav-tabs .nav-item {
        flex: 1 1 auto;
        text-align: center;
    }
    .md-tabs .nav-item a {
    padding: 10px 0 !important;}
    }
    
</style>


<div class="pcoded-content">

    <div class="pcoded-inner-content">

        <div class="main-body">

            <div class="page-wrapper">



                <div class="page-body pb-3">

                <div class="row">
    <!-- card1 start -->
    <div class="col-6 col-md-6 col-xl-3 adblog">
        <div class="card widget-card-1" id="todaysAppointmentWidget">
            <div class="card-block-small">
                <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                <span class="text-c-yellow f-w-600">Todays</span>
                <h4><?php echo ($todayappoinments !== null) ? count($todayappoinments) : 0; ?></h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10" id="todaysAppointmentWidget"></i>Todays Appointment
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- card1 end -->

    <!-- card2 start -->
    <div class="col-6 col-md-6 col-xl-3 adblog">
        <div class="card widget-card-1">
            <a href="<?=base_url(); ?>Appointment_reports" class="card-block-small" target="_blank">
                <div class="">
                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                    <span class="text-c-blue f-w-600">All Appointment</span>
                    <!-- Display the count of appointments here -->
                    <h4><?php echo ($Appt !== null) ? $Appt : 0; ?></h4>
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Year
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- card2 end -->

    <!-- card3 start -->
    <div class="col-6 col-md-6 col-xl-3 adblog">
        <div class="card widget-card-1">
            <a href="<?=base_url(); ?>services_Reports" class="card-block-small" target="_blank">
                <div class="">
                    <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                    <span class="text-c-pink f-w-600">Other Services</span>
                    <!-- Display the count of services here -->
                    <h4><?php echo ($servicesc !== null) ? $servicesc : 0; ?></h4>
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Current Year
                        </span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- card3 end -->

    <!-- card4 start -->
    <div class="col-6 col-md-6 col-xl-3 adblog">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                <span class="text-c-green f-w-600">Total Amount</span>
                <!-- Display the total sum of amounts here -->
                <h4><?php echo ($totalammount !== null) ? $totalammount : 0; ?></h4>
                <div>
                    <span class="f-left m-t-10 text-muted">
                        <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Total Collection
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- card4 end -->
</div>


                </div>

                <div class="row" id="appointmentTableContainer" style="">

                    <div class="col-sm-12 col-md-12 col-12">

                        <!-- Tab variant tab card start -->

                        <div class="card">

                            <div class="card-header">

                                <h5> Appointment</h5>

                                <div class="card-header-right">

                                    <ul class="list-unstyled card-option">

                                        <li><i class="icofont icofont-simple-left "></i></li>

                                        <li><i class="icofont icofont-maximize full-card"></i></li>

                                        <li><i class="icofont icofont-minus minimize-card"></i></li>

                                        <li><i class="icofont icofont-refresh reload-card"></i></li>

                                        <li><i class="icofont icofont-error close-card"></i></li>

                                    </ul>

                                </div>

                            </div>

                            <div class="card-block tab-icon">

                                <!-- Row start -->

                                <div class="row">

                                    <div class="col-lg-12 col-xl-12 col-md-12 col-12">



                                    <ul class="nav nav-tabs md-tabs row no-gutters" role="tablist">
                                        <li class="nav-item col col-md-3 col-lg-2">
                                            <a class="nav-link active" data-toggle="tab" href="#home7" role="tab">
                                                <i class="icofont icofont-ui-clock"></i> Today's 
                                            </a>
                                        </li>
                                        <li class="nav-item col col-md-3 col-lg-2">
                                            <a class="nav-link" data-toggle="tab" href="#profile7" role="tab">
                                                <i class="icofont icofont-ui-clock"></i> Empty Slots
                                            </a>
                                        </li>
                                        <li class="nav-item col col-md-3 col-lg-2">
                                            <a class="nav-link" data-toggle="tab" href="#complitedapp" role="tab">
                                                <i class="icofont icofont-ui-clock"></i> Conducted 
                                            </a>
                                        </li>
                                        <li class="nav-item col col-md-3 col-lg-3">
                                            <a class="nav-link" data-toggle="tab" href="#notcomplitedapp" role="tab">
                                                <i class="icofont icofont-ui-clock"></i> Not Conducted 
                                            </a>
                                        </li>
                                        <li class="nav-item col col-md-3 col-lg-3 profile8">
                                            <a class="nav-link" data-toggle="tab" href="#profile8" role="tab">
                                                <i class="icofont icofont-ui-clock"></i> Mark Appointment
                                            </a>
                                        </li>
                                    </ul>



                                        <div class="tab-content card-block">

                                            <div class="tab-pane active" id="home7" role="tabpanel">

                                                <table class="table tabler1 table-bordered">
                                                            <thead>

                                                                <tr>

                                                                    <th>Sr.No</th>
                                                                    <th>Conducted</th>
                                                                    <th>Name</th>
                                                                    <th>Date</th>
                                                                    <th>Time</th>
                                                                    <th>Transaction Id</th>
                                                                    <th>Contact</th>
                                                                    <th>Type</th>
                                                                    <th>DOB</th>
                                                                    <th>TOB</th>
                                                                    <th>City</th>
                                                                    <th>State</th>
                                                                    <th>Country</th>
                                                                    <th>Reference</th>
                                                                    <th>Gender</th>
                                                                    <th>Marital Status</th>
                                                                    <th>Twins</th>
                                                                    <th>Email</th>
                                                                </tr>

                                                            </thead>

                                                            <tbody id="appointmentTableBody">

                                                                <?php 
                                                                    if (!empty($todayappoinments)) {
                                                                        $i = 1;
                                                                        foreach ($todayappoinments as $appointment): ?>


                                                                <tr>

                                                                    <form action="Appointment_status" method="post">

                                                                        <td><?php echo $i; ?></td>
                                                                        <td>
                                                                        <input class="amtinput" type="text" name="amount" value="<?php echo $appointment['amount']; ?>" placeholder="Enter Received Amt" >
                                                                             
                                                                                <button class="btn btn-success"

                                                                                type="submit" name="conducted"

                                                                                value="Y">Yes</button>

                                                                                <button class="btn btn-danger" type="submit"

                                                                                name="conducted" value="N">No</button>

                                                                                <input type="hidden" name="appointment_ids"

                                                                                value="<?php echo $appointment['ap_id']; ?>">

                                                                        </td>

                                                                       
                                                                        <td><?php echo $appointment['fullname']; ?></td>
                                                                      

                                                                        <td><?php echo date('d M Y', strtotime($appointment['appointment_date'])); ?>

                                                                        </td>

                                                                        <td><?php echo date('H:i', strtotime($appointment['timestartslot'])); ?></td>



                                                                        <td><?php echo $appointment['transaction_id']; ?></td>

                                                                        <td><?php echo $appointment['contact_number']; ?>

                                                                        </td>
                                                                         <td><?php echo $appointment['appointmentType']; ?> - 
                                                                         <?php if(!empty($appointment['appointmentOption'])){ echo $appointment['appointmentOption'];} ?>


                                                                        </td>

                                                                        <td>

                                                                            <?php

                                                                                if (isset($appointment['dob']) && !empty($appointment['dob'])) {

                                                                                    echo date('d F Y', strtotime($appointment['dob']));

                                                                                } else {

                                                                                    echo "N/A";

                                                                                }

                                                                                ?>

                                                                        </td>

                                                                        <td>

                                                                            <?php

                                                                                if (isset($appointment['tob']) && !empty($appointment['tob'])) {

                                                                                    $timeOfBirth = date('H:i', strtotime($appointment['tob']));

                                                                                    echo $timeOfBirth;

                                                                                } else {

                                                                                    echo "N/A";

                                                                                }

                                                                            ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['city_name']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['state_name']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['country_name']; ?>

                                                                        </td>

                                                                     

                                                                        <td><?php echo $appointment['source']; ?></td>

                                                                        <td><?php echo $appointment['gender']; ?></td>

                                                                        <td><?php echo $appointment['marital_status']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['twins']; ?></td>

                                                                        <td><?php echo $appointment['email']; ?></td>
                                                                       

                                                                      

                                                                    </form>

                                                                </tr>

                                                                <?php $i++; endforeach; } ?>

                                                            </tbody>

                                                </table>
                                            </div>



                                            <div class="tab-pane" id="profile7" role="tabpanel">

                                                <div >

                                                    <div >

                                                        <table class="table table-bordered">
                                                            <thead>

                                                                <tr>

                                                                    <th>Sr.No</th>

                                                                    <th>Time</th>



                                                                </tr>

                                                            </thead>

                                                            <tbody id="appointmentTableBody">

                                                                <?php

                                                                                            if (!empty($remaingslots)) {

                                                                                                $i = 1;

                                                                                                foreach ($remaingslots as $data): 

                                                                                                

                                                                                            ?>

                                                                <tr>

                                                                    <td><?php echo $i ?></td>

                                                                    <td><?php echo $data['start_time']; ?></td>



                                                                </tr>

                                                                <?php

                                                                                                        $i++;

                                                                                                  

                                                                                                endforeach;

                                                                                            }

                                                                                            ?>



                                                            </tbody>

                                                        </table>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="tab-pane" id="complitedapp" role="tabpanel">

                                              

                                                <div >

                                                    <div >

                                                        <table class="table tabler table-bordered">
                                                            <thead>

                                                                <tr>

                                                                    <th>Sr.No</th>

                                                                    <!-- <th>Conducted</th> -->

                                                                    <th>Name</th>

                                                                    <th>Date</th>

                                                                    <th>Time</th>

                                                                    <th>Type</th>

                                                                    <th>DOB</th>

                                                                    <th>TOB</th>

                                                                    <th>City</th>

                                                                    <th>State</th>

                                                                    <th>Country</th>

                                                                    <th>Transaction Id</th>

                                                                    <th>Contact</th>

                                                                    <th>Reference</th>

                                                                    <th>Gender</th>

                                                                    <th>Marital Status</th>

                                                                    <th>Twins</th>

                                                                    <th>Email</th>

                                                                </tr>

                                                            </thead>

                                                            <tbody id="appointmentTableBody">

                                                                <?php 

                                                                    if (!empty($todayappoinmentswithstatus)) {

                                                                        // echo "<pre>";print_r($todayappoinmentswithstatus);exit();

                                                                        $i = 1;

                                                                        foreach ($todayappoinmentswithstatus as $appointment): ?>

                                                                                <tr>

                                                                                    <form action="Appointment_status" method="post">

                                                                                        <td><?php echo $i; ?></td>

                                                                                        <!-- <td>

                                                                                            <button class="btn btn-success"

                                                                                                type="submit" name="conducted"

                                                                                                value="Y">Yes</button>

                                                                                            <button class="btn btn-danger" type="submit"

                                                                                                name="conducted" value="N">No</button>

                                                                                        </td> -->

                                                                                        <td><?php echo $appointment['fullname']; ?></td>

                                                                                        <td><?php echo date('d M Y', strtotime($appointment['appointment_date'])); ?>

                                                                                        </td>

                                                                                         <td><?php echo date('H:i', strtotime($appointment['timestartslot'])); ?></td>
                                                                                         <td><?php echo $appointment['appointmentType']; ?> - <?php if(!empty($appointment['appointmentOption'])){ echo $appointment['appointmentOption'];} ?>


                                                                                        </td>

                                                                                        <td>

                                                                                            <?php

                                                                    if (isset($appointment['dob']) && !empty($appointment['dob'])) {

                                                                        echo date('d F Y', strtotime($appointment['dob']));

                                                                    } else {

                                                                        echo "N/A";

                                                                    }

                                                                    ?>

                                                                                        </td>

                                                                                        <td>

                                                                                            <?php

                                                                    if (isset($appointment['tob']) && !empty($appointment['tob'])) {

                                                                        $timeOfBirth = date('H:i', strtotime($appointment['tob']));

                                                                        echo $timeOfBirth;

                                                                    } else {

                                                                        echo "N/A";

                                                                    }

                                                                ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['city_name']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['state_name']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['country_name']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['transaction_id']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['contact_number']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['source']; ?></td>

                                                                        <td><?php echo $appointment['gender']; ?></td>

                                                                        <td><?php echo $appointment['marital_status']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['twins']; ?></td>

                                                                        <td><?php echo $appointment['email']; ?></td>

                                                                        <input type="hidden" name="appointment_ids"

                                                                            value="<?php echo $appointment['ap_id']; ?>">

                                                                    </form>

                                                                </tr>

                                                                <?php $i++; endforeach; } ?>

                                                            </tbody>

                                                        </table>

                                                    </div>

                                                </div>



                                            </div>

                                            <div class="tab-pane" id="notcomplitedapp" role="tabpanel">
                                                <div >

                                                    <div >

                                                        <table class="table tabler table-bordered">
                                                            <thead>

                                                                <tr>

                                                                    <th>Sr.No</th>

                                                                    <!-- <th>Conducted</th> -->

                                                                    <th>Name</th>

                                                                    <th>Date</th>

                                                                    <th>Time</th>

                                                                    <th>Type</th>

                                                                    <th>DOB</th>

                                                                    <th>TOB</th>

                                                                    <th>City</th>

                                                                    <th>State</th>

                                                                    <th>Country</th>

                                                                    <th>Transaction Id</th>

                                                                    <th>Contact</th>

                                                                    <th>Reference</th>

                                                                    <th>Gender</th>

                                                                    <th>Marital Status</th>

                                                                    <th>Twins</th>

                                                                    <th>Email</th>

                                                                </tr>

                                                            </thead>

                                                            <tbody id="appointmentTableBody">

                                                                <?php 

                                                                    if (!empty($nottodayappoinmentswithstatus)) {

                                                                        // echo "<pre>";print_r($todayappoinmentswithstatus);exit();

                                                                        $i = 1;

                                                                        foreach ($nottodayappoinmentswithstatus as $appointment): ?>

                                                                                <tr>

                                                                                    <form action="Appointment_status" method="post">

                                                                                        <td><?php echo $i; ?></td>

                                                                                        <!-- <td>

                                                                                            <button class="btn btn-success"

                                                                                                type="submit" name="conducted"

                                                                                                value="Y">Yes</button>

                                                                                            <button class="btn btn-danger" type="submit"

                                                                                                name="conducted" value="N">No</button>

                                                                                        </td> -->

                                                                                        <td><?php echo $appointment['fullname']; ?></td>

                                                                                        <td><?php echo date('d M Y', strtotime($appointment['appointment_date'])); ?>

                                                                                        </td>
                                                                                        <td><?php echo date('H:i', strtotime($appointment['timestartslot'])); ?></td>
                                                                                        <td><?php echo $appointment['appointmentType']; ?> - <?php if(!empty($appointment['appointmentOption'])){ echo $appointment['appointmentOption'];} ?>


                                                                                        </td>

                                                                                        <td>

                                                                                            <?php

                                                                    if (isset($appointment['dob']) && !empty($appointment['dob'])) {

                                                                        echo date('d F Y', strtotime($appointment['dob']));

                                                                    } else {

                                                                        echo "N/A";

                                                                    }

                                                                    ?>

                                                                                        </td>

                                                                                        <td>

                                                                                            <?php

                                                                    if (isset($appointment['tob']) && !empty($appointment['tob'])) {

                                                                        $timeOfBirth = date('H:i', strtotime($appointment['tob']));

                                                                        echo $timeOfBirth;

                                                                    } else {

                                                                        echo "N/A";

                                                                    }

                                                                ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['city_name']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['state_name']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['country_name']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['transaction_id']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['contact_number']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['source']; ?></td>

                                                                        <td><?php echo $appointment['gender']; ?></td>

                                                                        <td><?php echo $appointment['marital_status']; ?>

                                                                        </td>

                                                                        <td><?php echo $appointment['twins']; ?></td>

                                                                        <td><?php echo $appointment['email']; ?></td>

                                                                        <input type="hidden" name="appointment_ids"

                                                                            value="<?php echo $appointment['ap_id']; ?>">

                                                                    </form>

                                                                </tr>

                                                                <?php $i++; endforeach; } ?>

                                                            </tbody>

                                                        </table>

                                                    </div>

                                                </div>
                                            </div>



                                            <div class="tab-pane" id="profile8" role="tabpanel">

                                              

                                                    <div >

                                                        <div >

                                                            <table class="table tabler table-bordered">
                                                                <thead>

                                                                    <tr>





                                                                        <th>Sr.No</th>


                                                                        <th>Name</th>

                                                                        <th>Date</th>

                                                                        <th>Time</th>

                                                                        <th>Type</th>

                                                                        <th>DOB</th>

                                                                        <th>TOB</th>

                                                                        <th>City</th>

                                                                        <th>state</th>

                                                                        <th>Country</th>

                                                                        <th>Transaction Id</th>

                                                                        <th>Contact</th>

                                                                        <th>Reference</th>



                                                                        <th>Gender</th>

                                                                        <th>Marital Status</th>

                                                                        <th>twins</th>

                                                                        <th>Email</th>

                                                                        <th>Conducted</th>


                                                                    </tr>

                                                                    </tr>

                                                                </thead>

                                                                <tbody id="appointmentTableBody">
    <?php 
    if (!empty($notcounducted)) {
        $i = 1;
        foreach ($notcounducted as $appointment): ?>
            <tr>
                <form action="Appointment_status" method="post">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $appointment['fullname']; ?></td>
                    <td><?php echo date('d M Y', strtotime($appointment['appointment_date'])); ?></td>
                    <td><?php echo date('H:i', strtotime($appointment['timestartslot'])); ?></td>
                    <td><?php echo $appointment['appointmentType']; ?> - <?php if (!empty($appointment['appointmentOption'])) { echo $appointment['appointmentOption']; } ?></td>
                    <td><?php echo isset($appointment['dob']) && !empty($appointment['dob']) ? date('d F Y', strtotime($appointment['dob'])) : "N/A"; ?></td>
                    <td><?php echo isset($appointment['tob']) && !empty($appointment['tob']) ? date('H:i', strtotime($appointment['tob'])) : "N/A"; ?></td>
                    <td><?php echo $appointment['city_name']; ?></td>
                    <td><?php echo $appointment['state_name']; ?></td>
                    <td><?php echo $appointment['country_name']; ?></td>
                    <td><?php echo $appointment['transaction_id']; ?></td>
                    <td><?php echo $appointment['contact_number']; ?></td>
                    <td><?php echo $appointment['source']; ?></td>
                    <td><?php echo $appointment['gender']; ?></td>
                    <td><?php echo $appointment['marital_status']; ?></td>
                    <td><?php echo $appointment['twins']; ?></td>
                    <td><?php echo $appointment['email']; ?></td>
                    <td>
                        <input class="amtinput" type="text" name="amount" value="<?php echo $appointment['amount']; ?>" placeholder="Enter Received Amt">
                        <button class="btn btn-success" type="submit" name="conducted" value="Y">Yes</button>
                        <button class="btn btn-danger" type="submit" name="conducted" value="N">No</button>
                    </td>
                    <input type="hidden" name="appointment_ids" value="<?php echo $appointment['ap_id']; ?>">
                </form>
            </tr>
        <?php 
        $i++;
        endforeach;
    }
    ?>
</tbody>


                                                            </table>

                                                        </div>

                                                    </div>

                                               

                                            </div>

                                           

                                        </div>

                                    </div>



                                </div>

                                <!-- Row end -->

                            </div>

                        </div>

                        <!-- Tab variant tab card start -->

                    </div>

                </div>





                <div id="styleSelector">



                </div>

            </div>

        </div>

    </div>

</div>


<?php 

$file = __DIR__ . "/footer.php";
if (file_exists($file)) {
    include $file;
} else {
    echo "File not found: $file";
}
?>