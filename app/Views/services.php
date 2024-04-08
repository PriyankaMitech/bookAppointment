<?php include("header.php"); ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
        <div class="page-wrapper">
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
                        <input type="date" class="form-control" id="service_date" name="service_date" required>
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
                        <input type="text" class="form-control" id="transaction_id" name="transaction_id" required>
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
<?php include("footer.php"); ?>