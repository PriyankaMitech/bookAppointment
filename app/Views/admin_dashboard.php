<?php include('header.php');?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1" id="todaysAppointmentWidget">
                                <div class="card-block-small">
                                    <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                                    <span class="text-c-yellow f-w-600">Todays </span>
                                    <h4><?php echo ($todayappoinments !== null) ? count($todayappoinments) : 0; ?></h4>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"
                                                id="todaysAppointmentWidget"></i>Todays Appointment
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">All Appointment</span>
                                    <!-- Display the count of appointments here -->
                                    <?php if ($Appt !== null): ?>
                                    <h4><?php echo $Appt; ?></h4>
                                    <?php else: ?>
                                    <h4>0</h4>
                                    <?php endif; ?>
                                    <div>
                                        <!-- You can add a conditional check or a link to get more space -->
                                        <span class="f-left m-t-10 text-muted">

                                            <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Year

                                        </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                                    <span class="text-c-pink f-w-600">Appointments</span>
                                    <!-- Display the count of appointments here -->
                                    <?php if ($curruntmonthappt !== null): ?>
                                    <h4><?php echo count($curruntmonthappt); ?></h4>
                                    <?php else: ?>
                                    <h4>0</h4>
                                    <?php endif; ?>
                                    <div>
                                        <span class="f-left m-t-10 text-muted">
                                            <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Current
                                            Month
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
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
                        <!-- card1 end -->
                        <!-- card1 start -->



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

                                        <ul class="nav nav-tabs md-tabs " role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><i
                                                        class="icofont icofont-ui-clock"></i>Today's Appointment</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><i
                                                        class="icofont icofont-ui-clock "></i>Empty Slots</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#profile8" role="tab"><i
                                                        class="icofont icofont-ui-clock "></i>Mark Appoinment</a>
                                                <div class="slide"></div>
                                            </li>

                                        </ul>

                                        <div class="tab-content card-block">
                                            <div class="tab-pane active" id="home7" role="tabpanel">
                                                <div class="table-responsive">
                                                    <div style="max-height: 300px; overflow-y: auto;">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr.No</th>
                                                                    <th>Conducted</th>
                                                                    <th>Name</th>
                                                                    <th>Date</th>
                                                                    <th>Time(24 Hr)</th>
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
                                            if (!empty($todayappoinments)) {
                                                $i = 1;
                                                foreach ($todayappoinments as $appointment): ?>
                                                                <tr>
                                                                    <form action="Appointment_status" method="post">
                                                                        <td><?php echo $i; ?></td>
                                                                        <td>
                                                                            <button class="btn btn-success"
                                                                                type="submit" name="conducted"
                                                                                value="Y">Yes</button>
                                                                            <button class="btn btn-danger" type="submit"
                                                                                name="conducted" value="N">No</button>
                                                                        </td>
                                                                        <td><?php echo $appointment['fullname']; ?></td>
                                                                        <td><?php echo date('d M Y', strtotime($appointment['appointment_date'])); ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                if (!empty($appointment['bookSlotData']) && isset($appointment['bookSlotData'][0]['start_time'])) {
                                    $startTime = date('H:i', strtotime($appointment['bookSlotData'][0]['start_time']));
                                    echo $startTime;
                                } else {
                                    echo "N/A";
                                }
                                ?>
                                                                        </td>
                                                                        <td><?php echo $appointment['appointmentType']; ?>
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
                                                                        <input type="hidden" name="appointment_id"
                                                                            value="<?php echo $appointment['ap_id']; ?>">
                                                                    </form>
                                                                </tr>
                                                                <?php $i++; endforeach; } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="profile7" role="tabpanel">
                                                <div class="table-responsive">
                                                    <div style="max-height: 300px; overflow-y: auto;">
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
                                            <div class="tab-pane" id="profile8" role="tabpanel">
                                              
                                                    <div class="table-responsive">
                                                        <div style="max-height: 300px; overflow-y: auto;">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>


                                                                        <th>Sr.No</th>
                                                                        <th>Conducted</th>
                                                                        <th>Name</th>
                                                                        <th>Date</th>
                                                                        <th>Time(24 Hr)</th>
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
                                                                    </tr>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="appointmentTableBody">
                                                                    <?php 
                                                                                            if(!empty($notcounducted)){
                                                                                                $i=1;
                                                                                            foreach ($notcounducted as $appointment): ?>
                                                                   <form action="Appointment_status" method="post">
                                                                 <tr>
                                                                        <td><?php echo $i; ?></td>
                                                                        <td>
                                                                            <button class="btn btn-success"
                                                                                type="submit" name="conducted"
                                                                                value="Y">Yes</button>
                                                                            <button class="btn btn-danger" type="submit"
                                                                                name="conducted" value="N">No</button>
                                                                        </td>
                                                                        <td><?php echo $appointment['fullname']; ?></td>
                                                                        <td><?php echo date('d M Y', strtotime($appointment['appointment_date'])); ?>
                                                                        </td>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                if (!empty($appointment['bookSlotData']) && isset($appointment['bookSlotData'][0]['start_time'])) {
                                                                    // Format time to exclude seconds
                                                                    $startTime = date('H:i', strtotime($appointment['bookSlotData'][0]['start_time']));
                                                                    echo $startTime;
                                                                } else {
                                                                    echo "N/A"; // Or any other appropriate message
                                                                }
                                                                ?>
                                                                        </td>
                                                                        <td><?php echo $appointment['appointmentType'] ?>
                                                                        </td>
                                                                        <td> <?php
                                                                                                    if (isset($appointment['dob']) && !empty($appointment['dob'])) {
                                                                                                        echo date('d F Y', strtotime($appointment['dob']));
                                                                                                    } else {
                                                                                                        echo "N/A"; // Or any other appropriate message
                                                                                                    }
                                                                                                    ?></td>
                                                                        <td>
                                                                            <?php
                                                            if (isset($appointment['tob']) && !empty($appointment['tob'])) {
                                                                // Format time without seconds
                                                                $timeOfBirth = date('H:i', strtotime($appointment['tob']));
                                                                echo $timeOfBirth;
                                                            } else {
                                                                echo "N/A"; // Or any other appropriate message
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

                                                                        <td><?php echo $appointment['contact_number'] ?>
                                                                        </td>
                                                                        <td><?php echo $appointment['source'] ?></td>
                                                                        <td><?php echo $appointment['gender'] ?></td>
                                                                        <td><?php echo $appointment['marital_status'] ?>
                                                                        </td>


                                                                        <td><?php echo $appointment['twins'] ?></td>
                                                                        <td><?php echo $appointment['email']; ?></td>

                                                                        <input type="hidden" name="appointment_ids"
                                                                            value="<?php echo $appointment['ap_id']; ?>">

                                                                    </tr>
                                                                    </form>
                                                                    <?php $i++; endforeach; }?>
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
<?php include('footer.php');?>