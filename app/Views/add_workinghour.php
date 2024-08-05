<?php include("header.php"); ?>



<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8 col">
                            <div class="page-header-title">
                                <i class="icofont icofont-file-code bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Working Hours</h4>
                                    <!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->
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
                                    <li class="breadcrumb-item"><a href="#!">Schedule</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Working Hours</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Working Hours card start -->
                            <div class="card p-3">
                       
                                <?php if(empty($schedule)){?>
                                <div class="card-block">
                                    <form method="post" action="set_workinghour">
                                        <div class="form-group row align-items-center">
                                            <label class="col-12 col-sm-2 col-form-label">Monday
                                                <input type="hidden" name="day[]" value="Monday">
                                            </label>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="col-1 text-center">–</span>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>
                                            <div class="col-2 text-center">
                                            <a href="" class="text-danger">

                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-12 col-sm-2 col-form-label">Tuesday
                                                <input type="hidden" name="day[]" value="Tuesday">
                                            </label>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="col-1 text-center">–</span>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>
                                            <div class="col-2 text-center">
                                            <a href="" class="text-danger">

                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-12 col-sm-2 col-form-label">Wednesday
                                                <input type="hidden" name="day[]" value="Wednesday">
                                            </label>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="col-1 text-center">–</span>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>
                                            <div class="col-2 text-center">
                                            <a href="" class="text-danger">

                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-12 col-sm-2 col-form-label">Thursday
                                                <input type="hidden" name="day[]" value="Thursday">
                                            </label>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="col-1 text-center">–</span>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>
                                            <div class="col-2 text-center">
                                            <a href="" class="text-danger">

                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-12 col-sm-2 col-form-label">Friday
                                                <input type="hidden" name="day[]" value="Friday">
                                            </label>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="col-1 text-center">–</span>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>
                                            <div class="col-2 text-center">
                                            <a href="" class="text-danger">

                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-12 col-sm-2 col-form-label">Saturday
                                                <input type="hidden" name="day[]" value="Saturday">
                                            </label>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="col-1 text-center">–</span>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>
                                            <div class="col-2 text-center">
                                            <a href="" class="text-danger">

                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-12 col-sm-2 col-form-label">Sunday
                                                <input type="hidden" name="day[]" value="Sunday">
                                            </label>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="col-1 text-center">–</span>
                                            <div class="col-4 col-sm-2 setw">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>
                                            <div class="col-2 text-center">
                                            <a href="" class="text-danger">

                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>

                                            </div>
                                           
                                    </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 col-sm-2">
                                                <button type="submit" class="btn btn-success btn-round brfbp" id="primary-popover-content" data-container="body" data-toggle="popover" title="Primary color states" data-placement="bottom" data-content="">Save</button>
                                            </div>
                                            <div class="col-6 col-sm-2">
                                                <button type="button" class="btn btn-info btn-round brfbp" id="cancelButton" data-container="body" data-toggle="popover" title="Primary color states" data-placement="bottom" data-content="">Cancel</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        <?php }else{ ?>
                        <div class="card-block">
                            <form method="post" action="set_workinghour">
                                <?php foreach ($schedule as $data): ?>
                                <div class="form-group row align-items-center ">
                                    <label class="col-12 col-sm-2 col-form-label"><?= $data->day ?>
                                        <input type="hidden" name="day[]" value="<?= $data->day ?>">
                                    </label>
                                    <div class="col-4 col-sm-2 setw">
                                        <?php if ($data->start_time != '00:00:00' && $data->is_deleted != 'Y'){ ?>
                                        <input type="time" name="start_time[]" class="form-control" value="<?= $data->start_time ?>">
                                        <?php } else { ?>
                                        <input type="time" name="start_time[]" class="form-control">
                                        <?php } ?>
                                    </div>
                                    <span class="col-1 text-center ">–</span>
                                    <div class="col-4 col-sm-2 setw">
                                        <?php if ($data->end_time != '00:00:00' && $data->is_deleted != 'Y'){ ?>
                                        <input type="time" name="end_time[]" class="form-control" value="<?= $data->end_time ?>">
                                        <?php } else { ?>
                                        <input type="time" name="end_time[]" class="form-control">
                                        <?php } ?>
                                    </div>
                                    <div class="col-2 text-center">
                                        <a href="<?=base_url();?>deleteworkinghour/tbl_schedule/<?= $data->day ?>/<?= $data->user_id ?>" class="text-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <div class="row">
                                    <div class="col-6 col-sm-2">
                                        <button type="submit" class="btn btn-success btn-round brfbp" id="primary-popover-content" data-container="body" data-toggle="popover" title="Primary color states" data-placement="bottom" data-content="">Save</button>
                                    </div>
                                    <div class="col-6 col-sm-2">
                                        <button type="button" class="btn btn-info btn-round brfbp" id="cancelButton" data-container="body" data-toggle="popover" title="Primary color states" data-placement="bottom" data-content="">Cancel</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
        <script>
        // Add an event listener to the Cancel button
        document.getElementById('cancelButton').addEventListener('click', function() {
            // Reload the current page
            location.reload();
        });
        </script>