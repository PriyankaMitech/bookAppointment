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
                                    <h4>Services List</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Services List</a></li>
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
                                        <button type="button" class="btn btn-danger ml-2" onclick="removeFilter()">Remove
                                            Filter</button>
                                        <?php endif; ?>
                                    </form>
                                    <div class="table-responsive">
                                        <?php
                                        if (empty($services)): ?>
                                            <p>No records found.</p>
                                        <?php else: ?>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.No</th>
                                                        <th>Name</th>
                                                        <th>Service</th>
                                                        <th>Date</th>
                                                        <th>Contact Number</th>
                                                        <th>Email Id</th>
                                                        <th>Amount</th> 
                                                        <th>Transaction ID</th>
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
                                                    usort($services, function($a, $b) {
                                                        return strtotime($a->service_date) - strtotime($b->service_date);
                                                    });
                                                    foreach ($services as $slot): 
                                                        // Check if the selected date matches the booked slot date
                                                        if ($filter_date && $slot->service_date == $filter_date):
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $slot->name; ?></td>
                                                                <td><?php echo $slot->service; ?></td>
                                                                <td><?php echo date('d F Y', strtotime($slot->service_date)); ?></td>                                                        
                                                                <td><?php echo $slot->mobile; ?></td>
                                                                <td><?php echo $slot->email; ?></td>
                                                                <td><?php echo $slot->amount; ?></td> 
                                                                <td><?php echo $slot->transaction_id; ?></td>
                                                                <td>
                                                                    <form action="cancelBooking" method="post">
                                                                        <input type="hidden" name="slot_id" value="<?php echo $slot->id; ?>">
                                                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                    <?php 
                                                        // If no filter is applied, display all booked slots
                                                        elseif (!$filter_date):
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $slot->name; ?></td>
                                                                <td><?php echo $slot->service; ?></td>
                                                                <td><?php echo date('d F Y', strtotime($slot->service_date)); ?></td>                                                        
                                                                <td><?php echo $slot->mobile; ?></td>
                                                                <td><?php echo $slot->email; ?></td>
                                                                <td><?php echo $slot->amount; ?></td> 
                                                                <td><?php echo $slot->transaction_id; ?></td>
                                                                <td>
                                                                    <form action="cancelservices" method="post">
                                                                        <input type="hidden" name="slot_id" value="<?php echo $slot->id; ?>">
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                    <?php 
                                                        endif; // End check for selected date
                                                        $i++; 
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