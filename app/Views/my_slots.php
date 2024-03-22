<?php include("header.php"); ?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <?php
                        // Define an array for days of the week
                        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        
                        // Iterate over each day
                        foreach ($daysOfWeek as $day) {
                            ?>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><?php echo $day; ?></h5>
                                    </div>
                                    <div class="card-block">
                                        <ul class="list-group">
                                            <?php
                                            // Iterate over slots for the current day
                                            foreach ($slots as $slot) {
                                                if ($slot->day == $day) {
                                                    ?>
                                                    <li class="list-group-item">
                                                        <span><?php echo $slot->start_time; ?> - <?php echo $slot->end_time; ?></span>
                                                        <?php if ($slot->active_status == 'Y') { ?>
                                                            <button class="btn btn-danger btn-sm float-right">Deactivate</button>
                                                        <?php } else { ?>
                                                            <button class="btn btn-success btn-sm float-right">Activate</button>
                                                        <?php } ?>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
