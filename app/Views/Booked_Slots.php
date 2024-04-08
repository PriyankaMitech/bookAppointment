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
                                    <h5>Booked Slots</h5>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <?php if (empty($bookedslots)): ?>
                                            <p>No records found.</p>
                                        <?php else: ?>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Day</th>
                                                        <th>Appointment date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    // Get today's date
                                                    $today = date("Y-m-d");
                                                    // Initialize a counter
                                                    $counter = 1;
                                                    // Sort booked slots by selected date in ascending order
                                                    usort($bookedslots, function($a, $b) {
                                                        return strtotime($a['selected_date']) - strtotime($b['selected_date']);
                                                    });
                                                    foreach ($bookedslots as $slot): 
                                                        // Check if the selected date is today or after today
                                                        if ($slot['selected_date'] >= $today):
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $counter++; ?></td>
                                                            <td><?php echo $slot['start_time']; ?></td>
                                                            <td><?php echo $slot['end_time']; ?></td>
                                                            <td><?php echo $slot['day']; ?></td>
                                                            <td><?php echo $slot['selected_date']; ?></td>
                                                            <td>
                                                                <form action="cancelBooking" method="post">
                                                                    <input type="hidden" name="slot_id" value="<?php echo $slot['id']; ?>">
                                                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php 
                                                        endif; // End check for today's date or after
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
