<?php include("header.php"); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
        <div class="card">
            <div class="page-wrapper">
            <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="icofont icofont-file-code bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Service</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">Service</a>
                                    </li>
                                    

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                   
                        <form action="all_services" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="service">Select Service:</label>
                                        <select class="form-control" id="service" name="service" required>
                                            <option value="">Select</option>
                                            <!-- <option value="Prediction">Prediction</option> -->
                                            <option value="Tarot">Tarot</option>
                                            <option value="Preparing Kundali">Preparing Kundali</option>
                                            <option value="Kundali Matching">Kundali Matching</option>
                                            <option value="Muhurta">Muhurta</option>
                                            <!-- <option value="Astrology Coaching">Astrology Coaching</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mobile">Mobile:</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="service_date">Service Date:</label>
                                        <input type="date" class="form-control" id="service_date" name="service_date"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="amount">Amount:</label>
                                        <input type="number" class="form-control" id="amount" name="amount" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="transaction_id">Transaction ID:</label>
                                        <input type="text" class="form-control" id="transaction_id"
                                            name="transaction_id" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php include("footer.php"); ?>