<?php include("header.php"); ?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="container">
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5><b>Booked Slots</b></h5>
                                </div>
                                <div class="card-block">
                                    <form action="" method="GET" class="form-inline mb-3">
                                        <div class="form-group mr-2">
                                            <label for="filter_date" class="mr-2">Filter by Date:</label>
                                            <input type="date" class="form-control" id="filter_date" name="filter_date">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Apply Filter</button>
                                    </form>
                                    <div class="table-responsive">
                                        <?php if (empty($bookedslots)): ?>
                                            <p>No records found.</p>
                                        <?php else: ?>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Name</th>
                                                        <th>Appointment Start Time</th>
                                                        <th>Appointment End Time</th>
                                                        <th>Day</th>
                                                        <th>Type of service</th>                                         
                                                        <th>Appointment Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    // Get the selected date from the form input
                                                    $filter_date = isset($_GET['filter_date']) ? $_GET['filter_date'] : null;
                                                    // Initialize a counter
                                                    $counter = 1;
                                                    // Sort booked slots by selected date in ascending order
                                                    usort($bookedslots, function($a, $b) {
                                                        return strtotime($a['selected_date']) - strtotime($b['selected_date']);
                                                    });
                                                    foreach ($bookedslots as $slot): 
                                                        // Check if the selected date matches the booked slot date
                                                        if ($filter_date && $slot['selected_date'] == $filter_date):
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $counter++; ?></td>
                                                            <td><?php echo $slot['fullname']; ?></td>
                                                            <td><?php echo $slot['start_time']; ?></td>
                                                            <td><?php echo $slot['end_time']; ?></td>
                                                            <td><?php echo $slot['day']; ?></td>
                                                            <td><?php echo $slot['subjects']; ?></td>
                                                            <td><?php echo date('d F Y', strtotime($slot['selected_date'])); ?></td>
                                                            <td>
                                                                <form action="cancelBooking" method="post">
                                                                    <input type="hidden" name="slot_id" value="<?php echo $slot['id']; ?>">
                                                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php 
                                                        // If no filter is applied, display all booked slots
                                                        elseif (!$filter_date):
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $counter++; ?></td>
                                                            <td><?php echo $slot['fullname']; ?></td>
                                                            <td><?php echo $slot['start_time']; ?></td>
                                                            <td><?php echo $slot['end_time']; ?></td>
                                                            <td><?php echo $slot['day']; ?></td>
                                                            <td><?php echo $slot['subjects']; ?></td>
                                                            <td><?php echo date('d F Y', strtotime($slot['selected_date'])); ?></td>
                                                            <td>
                                                                <form action="cancelBooking" method="post">
                                                                    <input type="hidden" name="slot_id" value="<?php echo $slot['id']; ?>">
                                                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php 
                                                        endif; // End check for selected date
                                                    endforeach; ?>
                                                </tbody>
                                            </table>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
