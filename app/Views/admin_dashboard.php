<?php include('header.php');?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- card1 start -->
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


                    </div>
                </div>

                
                
                <!-- <div class="card " id="appointmentTableContainer" style="display: none;">
                    <form action="Appointment_status" method="post">
                        <div class="table-responsive">
                            <div style="max-height: 300px; overflow-y: auto;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Contact</th>
                                            <th>Type</th>
                                            <th>Subjects</th>
                                            <th>Appointment Time</th>
                                            <th>DOB</th>
                                            <th>TOB</th>
                                            <th>Source</th>
                                            <th>Booked at</th>
                                            <th>Conducted</th>
                                        </tr>
                                    </thead>
                                    <tbody id="appointmentTableBody">
                                        <?php foreach ($todayappoinments as $appointment): ?>
                                        <tr>
                                            <td><?php echo $appointment['fullname']; ?></td>
                                            <td><?php echo $appointment['gender']; ?></td>
                                            <td><?php echo $appointment['contact_number']; ?></td>
                                            <td><?php echo $appointment['appointmentType']; ?></td>
                                            <td><?php echo $appointment['subjects']; ?></td>
                                            <td><?php echo $appointment['bookSlotData'][0]['start_time']; ?></td>
                                            <td><?php echo date('d F Y', strtotime($appointment['dob'])); ?></td>
                                            <td><?php echo substr($appointment['tob'], 0, 5); ?></td>
                                            <td><?php echo $appointment['source']; ?></td>
                                            <td><?php echo date('Y-m-d H:i:s', strtotime($appointment['created_at'])); ?></td>
                                            <input type="hidden" name="appointment_ids"
                                                value="<?php echo $appointment['ap_id']; ?>">
                                            <td>
                                                <button class="btn btn-success" type="submit" name="conducted"
                                                    value="Y">Yes</button>
                                                <button class="btn btn-danger" type="submit" name="conducted"
                                                    value="N">No</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div> -->

                <div class="row" id="appointmentTableContainer" style="display: none;">
                                            <div class="col-sm-12 col-md-12 col-12">
                                                <!-- Tab variant tab card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5> Appointment</h5>
                                                        <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                                    </div>
                                                    <div class="card-block tab-icon">
                                                        <!-- Row start -->
                                                        <div class="row">
                                                            <div class="col-lg-12 col-xl-12 col-md-12 col-12">
                                                                <!-- <h6 class="sub-title">Tab With Icon</h6> -->
                                                                <!-- <div class="sub-title"> Appointment</div> -->
                                                                <!-- Nav tabs -->
                                                                <ul class="nav nav-tabs md-tabs " role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><i class="icofont icofont-ui-clock"></i>Today's Appointment</a>
                                                                        <div class="slide"></div>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><i class="icofont icofont-ui-clock "></i>Remainng Slots</a>
                                                                        <div class="slide"></div>
                                                                    </li>
                                                                    <!-- <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="tab" href="#messages7" role="tab"><i class="icofont icofont-ui-message"></i>Messages</a>
                                                                        <div class="slide"></div>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="tab" href="#settings7" role="tab"><i class="icofont icofont-ui-settings"></i>Settings</a>
                                                                        <div class="slide"></div>
                                                                    </li> -->
                                                                </ul>
                                                                <!-- Tab panes -->
                                                                <div class="tab-content card-block">
                                                                    <div class="tab-pane active" id="home7" role="tabpanel">
                                                                        <form action="Appointment_status" method="post">
                                                                            <div class="table-responsive">
                                                                                <div style="max-height: 300px; overflow-y: auto;">
                                                                                    <table class="table table-bordered">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Sr.No</th>
                                                                                                <th>Name</th>
                                                                                                <th>Gender</th>
                                                                                                <th>Contact</th>
                                                                                                <th>Type</th>
                                                                                                <th>Subjects</th>
                                                                                                <th>Time</th>
                                                                                                <th>DOB</th>
                                                                                                <th>TOB</th>
                                                                                                <th>Source</th>
                                                                                                <th>Conducted</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody id="appointmentTableBody">
                                                                                            <?php 
                                                                                            if(!empty($todayappoinments)){
                                                                                                $i=1;
                                                                                            foreach ($todayappoinments as $appointment): ?>
                                                                                            <tr>
                                                                                                <td><?php echo $i; ?></td>

                                                                                                <td><?php echo $appointment['fullname']; ?></td>
                                                                                                <td><?php echo $appointment['gender']; ?></td>
                                                                                                <td><?php echo $appointment['contact_number']; ?></td>
                                                                                                <td><?php echo $appointment['appointmentType']; ?></td>
                                                                                                <td><?php echo $appointment['subjects']; ?></td>
                                                                                                <td><?php echo $appointment['bookSlotData'][0]['start_time']; ?></td>
                                                                                                <td><?php echo date('d F Y', strtotime($appointment['dob'])); ?></td>
                                                                                                <td><?php echo substr($appointment['tob'], 0, 5); ?></td>
                                                                                                <td><?php echo $appointment['source']; ?></td>
                                                                                                <input type="hidden" name="appointment_ids"
                                                                                                    value="<?php echo $appointment['ap_id']; ?>">
                                                                                                <td>
                                                                                                    <button class="btn btn-success" type="submit" name="conducted"
                                                                                                        value="Y">Yes</button>
                                                                                                    <button class="btn btn-danger" type="submit" name="conducted"
                                                                                                        value="N">No</button>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <?php $i++; endforeach; }?>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </form>
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
                                                                                                    if ($data['status'] === 'Available'):
                                                                                            ?>
                                                                                                        <tr>
                                                                                                            <td><?php echo $i ?></td>
                                                                                                            <td><?php echo $data['start_time']; ?></td>
                                                                                                          
                                                                                                        </tr>
                                                                                            <?php
                                                                                                        $i++;
                                                                                                    endif;
                                                                                                endforeach;
                                                                                            }
                                                                                            ?>

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>                                                                    </div>
                                                                    <div class="tab-pane" id="messages7" role="tabpanel">
                                                                        <p class="m-0">3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
                                                                    </div>
                                                                    <div class="tab-pane" id="settings7" role="tabpanel">
                                                                        <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
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