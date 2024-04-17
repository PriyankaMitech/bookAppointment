<?php include("header.php"); ?>


<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="icofont icofont-file-code bg-c-blue"></i>
                                <div class="d-inline">
                                    <h4>Working Hours</h4>
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
                                <div class="card-header">
                                    <h5><b>Working Hours </b></h5>
                                    <!-- <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                    <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                                    <div class="card-header-right">
                                        <i class="icofont icofont-spinner-alt-5"></i>
                                    </div>

                                </div>
                                <?php if(empty($schedule)){?>
                                <div class="card-block">
                                    <h4 class="sub-title">Days</h4>
                                    <form method="post" action="set_workinghour">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Monday<input type="hidden"
                                                    name="day[]" value="Monday"></label>
                                            <div class="col-sm-2">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="mt-1">–</span>
                                            <div class="col-sm-2">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>

                                            <span class="ml-2 mt-1"><i class="fa fa-trash" aria-hidden="true">
                                                </i></span>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tuesday<input type="hidden"
                                                    name="day[]" value="Tuesday"></label>
                                            <div class="col-sm-2">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="mt-1">–</span>
                                            <div class="col-sm-2">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>


                                            <span class="ml-2 mt-1"><i class="fa fa-trash" aria-hidden="true">
                                                </i></span>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Wednesday<input type="hidden"
                                                    name="day[]" value="Wednesday"></label>
                                            <div class="col-sm-2">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="mt-1">–</span>
                                            <div class="col-sm-2">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>


                                            <span class="ml-2 mt-1"><i class="fa fa-trash" aria-hidden="true">
                                                </i></span>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Thursday<input type="hidden"
                                                    name="day[]" value="Thursday"></label>
                                            <div class="col-sm-2">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="mt-1">–</span>
                                            <div class="col-sm-2">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>

                                            <span class="ml-2 mt-1"><i class="fa fa-trash" aria-hidden="true">
                                                </i></span>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Friday<input type="hidden"
                                                    name="day[]" value="Friday"></label>
                                            <div class="col-sm-2">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="mt-1">–</span>
                                            <div class="col-sm-2">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>


                                            <span class="ml-2 mt-1"><i class="fa fa-trash" aria-hidden="true">
                                                </i></span>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Saturday<input type="hidden"
                                                    name="day[]" value="Saturday"></label>
                                            <div class="col-sm-2">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="mt-1">–</span>
                                            <div class="col-sm-2">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>


                                            <span class="ml-2 mt-1"><i class="fa fa-trash" aria-hidden="true">
                                                </i></span>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Sunday<input type="hidden"
                                                    name="day[]" value="Sunday"></label>
                                            <div class="col-sm-2">
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <span class="mt-1">–</span>
                                            <div class="col-sm-2">
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>

                                            <span class="ml-2 mt-1"><i class="fa fa-trash" aria-hidden="true">
                                                </i></span>
                                        </div>

                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success btn-round brfbp"
                                        id="primary-popover-content" data-container="body" data-toggle="popover"
                                        title="Primary color states" data-placement="bottom"
                                        data-content="">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="card-block">
                            <h4 class="sub-title">Days</h4>
                            <form method="post" action="set_workinghour">

                                <?php 
                                                                // echo "<pre>";print_r($schedule);exit();
                                                                foreach ($schedule as $data): ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"><?= $data->day ?><input type="hidden"
                                            name="day[]" value="<?= $data->day ?>"></label>
                                    <div class="col-sm-2">
                                        <?php if ($data->start_time != '00:00:00' && $data->is_deleted != 'Y'){ ?>
                                        <input type="time" name="start_time[]" class="form-control"
                                            value="<?= $data->start_time ?>">
                                        <?php }else{ ?>
                                        <input type="time" name="start_time[]" class="form-control">

                                        <?php } ?>
                                    </div>
                                    <span class="mt-1">–</span>
                                    <div class="col-sm-2">
                                        <?php if ($data->end_time != '00:00:00' && $data->is_deleted != 'Y'){ ?>
                                        <input type="time" name="end_time[]" class="form-control"
                                            value="<?= $data->end_time ?>">
                                        <?php }else{ ?>
                                        <input type="time" name="end_time[]" class="form-control">

                                        <?php } ?>
                                    </div>

                                    <a
                                        href="<?=base_url();?>deleteworkinghour/tbl_schedule/<?= $data->day ?>/<?= $data->user_id ?>"><span
                                            class="ml-2 mt-1"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                                </div>
                                <?php endforeach; ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-success btn-round brfbp"
                                            id="primary-popover-content" data-container="body" data-toggle="popover"
                                            title="Primary color states" data-placement="bottom"
                                            data-content="">Save</button>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-info btn-round brfbp" id="cancelButton"
                                            data-container="body" data-toggle="popover" title="Primary color states"
                                            data-placement="bottom" data-content="">Cancel</button>
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