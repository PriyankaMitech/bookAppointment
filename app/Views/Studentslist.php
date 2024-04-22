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
                                    <h4>Class Information</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Class Information</a>
                                    </li>
                                    

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h5><b>Class Information</b></h5>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Class Days</th>
                                            <th>Class Time</th>
                                            <th>Fees</th>
                                            <th>Paid Amount</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($Students)): ?>
                                            <?php $count = count($Students); ?>
                                            <?php $index = 1; ?>
                                            <?php foreach ($Students as $item): ?>
                                            <?php
                                            // Split the Paid_Ammount string into an array
                                            $paidAmounts = explode(',', $item['Paid_Ammount']);

                                            // Calculate the total paid amount
                                            $totalPaidAmount = array_sum($paidAmounts);
                                            ?>
                                            <tr>
                                                <td><?php echo $index; ?></td>
                                                <td><?php echo $item['name']; ?></td>
                                                <td><?php echo $item['email']; ?></td>
                                                <td><?php echo $item['contact_number']; ?></td>
                                                <td><?php echo $item['start_date']; ?></td>
                                                <td><?php echo $item['end_date']; ?></td>
                                                <td><?php echo $item['class_days']; ?></td>
                                                <td><?php echo $item['start_time']; ?></td>
                                                <td><?php echo $item['fees']; ?></td>
                                                <td><?php echo $totalPaidAmount; ?></td>
                                                <!-- Display the total paid amount -->
                                                <td>
                                                    <!-- Add Fees Button -->
                                                    <form action="add_fees" method="post">
                                                        <input type="hidden" name="student_id"
                                                            value="<?php echo $item['id']; ?>">
                                                        <input type="text" name="Paid_Ammount">
                                                        <button class="btn btn-sucess" type="submit">Add Fees</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <!-- Complete Class Button -->
                                                    <form action="complete_class" method="post">
                                                        <input type="hidden" name="student_id"
                                                            value="<?php echo $item['id']; ?>">
                                                        <input type="hidden" name="completion_status" value="Y">
                                                        <button class="btn btn-danger" type="submit">Complete Class</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $index++; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="12">No classes found</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
