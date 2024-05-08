<?php include("header.php"); ?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="icofont icofont-file-code bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>List Of Appoinment</h4>
                                    <!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>admin_dashboard">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">List Of Appoinment</a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5><b>List Of Appoinment</b></h5>
                                </div>
                                <div class="card-block">
                                    <form action="" method="GET" class="form-inline mb-3">
                                        <div class="form-group mr-2">
                                            <label for="filter_date" class="mr-2">Filter by Date:</label>
                                            <input type="date" class="form-control" id="filter_date" name="filter_date"
                                                value="<?php echo isset($_GET['filter_date']) ? htmlspecialchars($_GET['filter_date']) : ''; ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Apply Filter</button>
                                        <?php if (isset($_GET['filter_date'])): ?>
                                        <button type="button" class="btn btn-danger ml-2"
                                            onclick="removeFilter()">Remove
                                            Filter</button>
                                        <?php endif; ?>
                                    </form>
                                    <div class="table-responsive">
                                        <?php
                                        // echo "<pre>";print_r($bookedslots);exit();
                                        if (empty($bookedslots)): ?>
                                        <p>No records found.</p>
                                        <?php else: ?>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Time(24 Hr)</th>
                                                    <th>Type</th>
                                                    <th>Contact</th>
                                                    <th>Email Id</th>
                                                    <th>Gender</th>
                                                    <th>Marital Status</th>
                                                    <th>Transaction Id</th>
                                                    <th>Reference</th>
                                                    <th>twins</th>
                                                    <th>Date & Time of Birth</th>
                                                    <th>Place Of Birth</th>
                                                    <th>Action</th>
                                                    <th>Reschedule</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    // Get the selected date from the form input
                                                        $filter_date = isset($_GET['filter_date']) ? $_GET['filter_date'] : null;
                                                        // Initialize a counter
                                                        $i = 1;
                                                        // Sort booked slots by selected date in ascending order
                                                        usort($bookedslots, function($a, $b) {
                                                            return strtotime($a['selected_date']) - strtotime($b['selected_date']);
                                                        });
                                                        foreach ($bookedslots as $slot): 
                                                        // Check if the selected date matches the booked slot date
                                                        if ($filter_date && $slot['selected_date'] == $filter_date):
                                                    ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $slot['fullname']; ?></td>
                                                    <td> <?php echo date('d F Y', strtotime($slot['appointment_date'])); ?>
                                                    </td>
                                                    <td><?php echo $slot['start_time']; ?></td>
                                                    <td><?php echo $slot['appointmentType'] ?></td>
                                                    <td><?php echo $slot['contact_number'] ?></td>
                                                    <td><?php echo $slot['email']; ?></td>
                                                    <td><?php echo $slot['gender'] ?></td>
                                                    <td><?php echo $slot['marital_status'] ?></td>
                                                    <td><?php echo $slot['transaction_id'] ?></td>
                                                    <td><?php echo $slot['source'] ?></td>


                                                    <td><?php echo $slot['twins'] ?></td>
                                                    <td><?php echo date('d F Y', strtotime($slot['dob'])); ?> -
                                                        <?php echo $slot['tob']; ?></td>
                                                    <td><?php echo $slot['city_name']; ?>,
                                                        <?php echo $slot['state_name']; ?>,
                                                        <?php echo $slot['country_name']; ?></td>

                                                    <td>
                                                        <form action="cancelBooking" method="post">
                                                            <input type="hidden" name="slot_id"
                                                                value="<?php echo $slot['id']; ?>">
                                                            <button type="submit" class="btn btn-danger">Cancel</button>
                                                        </form>
                                                    </td>
                                                    <form action="reshedule" method="post">
                                                    <td>
                                                        <div class="form-group row">
                                                            <!-- <label for="appointment_date"
                                                                class="col-sm-3 col-form-label">Appointment
                                                                Date:</label> -->
                                                            <div class="col-sm-12">
                                                                <input type="date" id="appointment_date"
                                                                    name="appointment_date" class="form-control"
                                                                    required>
                                                            </div>
                                                            <div class="col-sm-12 mt-2">
                                                                <div id="slots_container"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        
                                                        <input type="hidden" name="slot_id"
                                                                value="<?php echo $slot['id']; ?>">
                                                            <input type="hidden" name="appm_id"
                                                                value="<?php echo $slot['appm_id']; ?>">
                                                            <input type="hidden" name="selected_slot_id"
                                                                id="selected_slot_id" value="">
                                                            <button type="submit"
                                                                class="btn btn-success">Reshedule</button>
                                                        
                                                    </td>
                                                    </form>
                                                </tr>
                                                <?php 
                                                        // If no filter is applied, display all booked slots
                                                        elseif (!$filter_date):
                                                    ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $slot['fullname']; ?></td>
                                                    <td> <?php echo date('d F Y', strtotime($slot['appointment_date'])); ?>
                                                    </td>
                                                    <td><?php echo $slot['start_time']; ?> </td>
                                                    <td><?php echo $slot['appointmentType'] ?></td>
                                                    <!-- <td><?php //echo $slot['subjects']; ?></td> -->
                                                    <td><?php echo $slot['contact_number'] ?></td>
                                                    <td><?php echo $slot['email']; ?></td>
                                                    <td><?php echo $slot['gender'] ?></td>
                                                    <td><?php echo $slot['marital_status'] ?></td>
                                                    <td><?php echo $slot['transaction_id'] ?></td>
                                                    <td><?php echo $slot['source'] ?></td>
                                                    <td><?php echo $slot['twins'] ?></td>
                                                    <td><?php echo date('d F Y', strtotime($slot['dob'])); ?> -
                                                        <?php echo $slot['tob']; ?></td>
                                                    <td><?php echo $slot['city_name']; ?>,
                                                        <?php echo $slot['state_name']; ?>,
                                                        <?php echo $slot['country_name']; ?></td>

                                                    <td>
                                                        <form action="cancelBooking" method="post">
                                                            <input type="hidden" name="slot_id"
                                                                value="<?php echo $slot['id']; ?>">
                                                            <button type="submit" class="btn btn-danger">Cancel</button>
                                                        </form>
                                                    </td>
                                                    <form action="reshedule" method="post">
                                                        <td>
                                                            <div class="form-group row">
                                                                <!-- <label for="appointment_date"
                                                                class="col-sm-3 col-form-label">Appointment
                                                                Date:</label> -->
                                                                <div class="col-sm-12">
                                                                    <input type="date" id="appointment_date"
                                                                        name="appointment_date" class="form-control"
                                                                        required>
                                                                </div>
                                                                <div class="col-sm-12 mt-2">
                                                                    <div id="slots_container"></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <input type="hidden" name="slot_id"
                                                                value="<?php echo $slot['id']; ?>">
                                                            <input type="hidden" name="appm_id"
                                                                value="<?php echo $slot['appm_id']; ?>">
                                                            <input type="hidden" name="selected_slot_id"
                                                                id="selected_slot_id" value="">
                                                            <button type="submit"
                                                                class="btn btn-success">Reshedule</button>

                                                        </td>
                                                    </form>

                                                </tr>
                                                <?php 
                                                        endif; // End check for selected date
                                                        $i++; endforeach; ?>
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
<script>
$(document).ready(function() {
    $('#appointment_date').change(function() {
        var selectedDate = $(this).val();
        $.ajax({
            type: "POST",
            url: "getnewslots",
            data: {
                date: selectedDate
            },
            dataType: 'json', // Expect JSON data as response
            success: function(slots) {
                // Clear previous slots
                $('#slots_container').empty();
                // Check if slots array is empty
                if (slots.length === 0) {
                    $('#slots_container').html(
                        '<p>No slots available for selected date.</p>');
                } else {
                    // Create a select dropdown with Bootstrap classes
                    var selectDropdown = '<select id="slot_select" class="form-control">';
                    // Add default option
                    selectDropdown += '<option value="">Select</option>';
                    // Iterate through each slot and append to select dropdown
                    $.each(slots, function(index, slot) {
                        selectDropdown += '<option value="' + slot.id + '">' + slot
                            .start_time + '</option>';
                    });
                    selectDropdown += '</select>';
                    $('#slots_container').html(selectDropdown);
                    // Add event listener to select dropdown
                    $('#slot_select').change(function() {
                        var selectedSlotId = $(this).val();
                        // Set the value of the hidden input field to the selected slot's ID
                        $('#selected_slot_id').val(selectedSlotId);
                        // Now you can use selectedSlotId as needed
                        console.log(selectedSlotId);
                    });
                }
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error(xhr.responseText);
            }
        });
    });
});
</script>