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
                                    <h4>List of Conducted Appointments</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">List of Conducted Appointments</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                             
                                <div class="card-block">
                                    <form action="<?=base_url(); ?>appointmentsList" method="GET" class="form-inline mb-3">
                                        <div class="form-group mr-2">
                                            <label for="filter_date" class="mr-2">Filter by Date:</label>
                                            <input type="date" class="form-control" id="filter_date" name="filter_date"
                                                value="<?php echo isset($_GET['filter_date']) ? htmlspecialchars($_GET['filter_date']) : ''; ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Apply Filter</button>
                                        <?php if (isset($_GET['filter_date'])): ?>
                                            <button type="button" class="btn btn-danger ml-2" onclick="removeFilter()">Remove
                                                Filter</button>
                                        <?php endif; ?>
                                    </form>
                                    <div class="table-responsive">
                                        <?php if (empty($bookedslots)): ?>
                                            <p>No records found.</p>
                                        <?php else: ?>
                                            <table class="table tabler table-bordered">                                                <thead>
                                                    <tr>
                                                        <th>Sr.No</th>
                                                        <th>Name</th>
                                                        <th>Appointment Date</th>
                                                        <th>Type</th>
                                                        <th>Contact Number</th>
                                                        <th>Gender</th>
                                                        <th>Marital Status</th>
                                                        <th>DOB</th>
                                                        <th>TOB</th>
                                                        <th>Reference</th>
                                                        <th>Are you one of the twins</th>
                                                        <th>Email Id</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                  
                                                    <?php foreach ($bookedslots as $slot): 
                                                        
                                                        ?>
                                                          <?php
                                                        // Check if filter date is set and matches service_date
                                                        if (isset($_GET['filter_date']) && date('Y-m-d', strtotime($slot['appointment_date'])) !== $_GET['filter_date']) {
                                                            continue; // Skip this row if date doesn't match filter
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $slot['fullname']; ?></td>
                                                            <td><?php echo date('d F Y', strtotime($slot['appointment_date'])); ?></td>
                                                            <td><?php echo $slot['appointmentType'] ?></td>
                                                            <td><?php echo $slot['contact_number'] ?></td>
                                                            <td><?php echo $slot['gender'] ?></td>
                                                            <td><?php echo $slot['marital_status'] ?></td>
                                                            <td><?php echo date('d-m-Y', strtotime($slot['dob'])); ?></td>
                                                            <td><?php echo $slot['tob'] ?></td>
                                                            <td><?php echo $slot['source'] ?></td>
                                                            <td><?php echo $slot['twins'] ?></td>
                                                            <td><?php echo $slot['email']; ?></td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php endforeach; ?>
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
