<?php require_once('db-connect.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet"  href="<?=base_url(); ?>assets/schedule/css/bootstrap.min.css">
    <link rel="stylesheet"  href="<?=base_url(); ?>assets/schedule/fullcalendar/lib/main.min.css">
    <script src="<?=base_url(); ?>assets/schedule/js/jquery-3.6.0.min.js"></script>
    <script src="<?=base_url(); ?>assets/schedule/js/bootstrap.min.js"></script>
    <script src="<?=base_url(); ?>assets/schedule/fullcalendar/lib/main.min.js"></script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient" id="topNavBar">
        <div class="container">
            <a class="navbar-brand" href="https://sourcecodester.com">
            Sourcecodester
            </a>

            <div>
                <b class="text-light">Sample Scheduling</b>
            </div>
        </div>
    </nav>
    <div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar"></div>
            </div>
            <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Schedule Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="<?=base_url(); ?>set_schedule" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                               
                                <div class="col">
                                    <div class="form-group">
                                        <label for="day" class="form-label">Select Day:</label>
                                        <select id="day" name="day" class="form-select form-control">
                                            <option>select</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="start_date" class="control-label">Start Date</label>
                                        <?php
                                            // Set the start date to the current date
                                            $start_date = date('Y-m-d', strtotime('+0 day'));
                                        ?>
                                        <input type="date" class="form-control form-control-sm rounded-0" name="start_date" id="start_date" value="<?php echo $start_date; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="end_date" class="control-label">End Date</label>
                                        <?php
                                            // Set the end date to start date + 1 year
                                            $end_date = date('Y-m-d', strtotime('+1 year', strtotime($start_date)));
                                        ?>
                                        <input type="date" class="form-control form-control-sm rounded-0" name="end_date" id="end_date" value="<?php echo $end_date; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="time" class="form-label">Start Time:</label>
                                        <input type="time" id="time" name="start_time" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="time" class="form-label">End Time:</label>
                                        <input type="time" id="time" name="end_time" class="form-control">
                                    </div>
                                </div>
                                <div class="col mt-2">
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">Add Time</button>
                                    </div>
                                </div>
                            </form>
                          
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                           <a> <dd id="description" class=""></dd></a>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

<?php 

$sched_res = [];

if(!empty($schedule)){
    // echo "<pre>";print_r($schedule);exit();


foreach($schedule as $data){
    $sdate = date("F d, Y h:i A",strtotime($data->start_date));
    $edate = date("F d, Y h:i A",strtotime($data->end_date));
    $sched_res[$data->id] = $data;
}
}
?>
<?php 
if(isset($conn)) $conn->close();
?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="<?=base_url(); ?>assets/schedule/js/script.js"></script>

</html>