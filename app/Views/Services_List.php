<?php include("header.php"); ?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8 col">
                            <div class="page-header-title">
                                <i class="icofont icofont-file-code bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Services List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col">
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
                                        <?php if (empty($services)): ?>
                                            <p>No records found.</p>
                                        <?php else: ?>
                                            <table class="table tabler table-bordered">                                                <thead>
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
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($services as $slot): ?>
                                                        <?php
                                                        // Check if filter date is set and matches service_date
                                                        if (isset($_GET['filter_date']) && date('Y-m-d', strtotime($slot['service_date'])) !== $_GET['filter_date']) {
                                                            continue; // Skip this row if date doesn't match filter
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td><?= $i++ ?></td>
                                                            <td><?= $slot['name'] ?></td>
                                                            <td><?= $slot['service'] ?></td>
                                                            <td><?= date('d M Y', strtotime($slot['service_date'])) ?></td>
                                                            <td><?= $slot['mobile'] ?></td>
                                                            <td><?= $slot['email'] ?></td>
                                                            <td><?= $slot['amount'] ?></td>
                                                            <td><?= $slot['transaction_id'] ?></td>
                                                            <td>
                                                                <form action="<?= base_url('cancelService') ?>" method="post">
                                                                    <input type="hidden" name="slot_id" value="<?= $slot['id'] ?>">
                                                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                                                </form>
                                                            </td>
                                                        </tr>
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
