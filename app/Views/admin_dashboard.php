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
                <div id="appointmentTableContainer" style="display: none;">
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
                                        <!-- Appointment details will be loaded here -->
                                        <?php foreach ($todayappoinments as $appointment): ?>
                                        <tr>
                                            <td><?php echo $appointment['fullname']; ?></td>
                                            <td><?php echo $appointment['gender']; ?></td>
                                            <td><?php echo $appointment['contact_number']; ?></td>
                                            <td><?php echo $appointment['appointmentType']; ?></td>
                                            <td><?php echo $appointment['subjects']; ?></td>
                                            <!-- Access start_time from bookSlotData -->
                                            <td><?php echo $appointment['bookSlotData'][0]['start_time']; ?></td>
                                            <!-- Add hidden input field to store appointment ID -->
                                            <td><?php echo date('d F Y', strtotime($appointment['dob'])); ?></td>
                                            <td><?php echo substr($appointment['tob'], 0, 5); ?></td>
                                            <td><?php echo $appointment['source']; ?></td>
                                            <td><?php echo date('Y-m-d H:i:s', strtotime($appointment['created_at'])); ?></td>
                                            <input type="hidden" name="appointment_ids"
                                                value="<?php echo $appointment['ap_id']; ?>">
                                            <!-- Add buttons with values 'Y' and 'N' -->
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
                </div>


                <div id="styleSelector">

                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');?>