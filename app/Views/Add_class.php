<?php include('header.php');?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Class Form</h2>
                        </div>
                        <div class="card-body">
                            <form action="classForm" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" id="name" name="name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" id="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number:</label>
                                            <input type="tel" id="contact_number" name="contact_number" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date">Class Beginning Date:</label>
                                            <input type="date" id="start_date" name="start_date" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">Class End Date:</label>
                                            <input type="date" id="end_date" name="end_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="class_days">Class Days:</label>
                                            <div class="row ml-1">
                                                <div class="col-md-6">
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="Sunday" name="class_days[]" value="Sunday">
                                                        <label class="form-check-label" for="Sunday">Sunday</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="monday" name="class_days[]" value="Monday">
                                                        <label class="form-check-label" for="monday">Monday</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="tuesday" name="class_days[]" value="Tuesday">
                                                        <label class="form-check-label" for="tuesday">Tuesday</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="wednesday" name="class_days[]" value="Wednesday">
                                                        <label class="form-check-label" for="wednesday">Wednesday</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="thursday" name="class_days[]" value="Thursday">
                                                        <label class="form-check-label" for="thursday">Thursday</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="friday" name="class_days[]" value="Friday">
                                                        <label class="form-check-label" for="friday">Friday</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="saturday" name="class_days[]" value="Saturday">
                                                        <label class="form-check-label" for="saturday">Saturday</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="start_time">Class Time:</label>
                                            <input type="time" id="start_time" name="start_time" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="start_time">Batch Name:</label>
                                            <input type="input" id="batch_name" name="batch_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="fees">Fees:</label>
                                            <input type="text" id="fees" name="fees" class="form-control" required>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>
