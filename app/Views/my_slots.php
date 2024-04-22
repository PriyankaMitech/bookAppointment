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
                                    <h4>My Slots</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">My Slots</a>
                                    </li>
                                    

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <button class="btn btn-link float-right toggle-collapse" data-target="#collapse_<?php echo $day; ?>">
                                        View
                                    </button>
                                </div>
                                <div id="collapse_<?php echo $day; ?>" class="collapse">
                                    <div class="card-block">
                                        <div class="row">
                                            <?php
                                                $count = 0;
                                                // Iterate over slots for the current day
                                                foreach ($slots as $slot) {
                                                    if ($slot->day == $day) {
                                                        ?>
                                            <div class="col-md-6">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <span><?php echo $slot->start_time; ?>-<?php echo $slot->end_time; ?></span>
                                                        <form id="statusForm_<?php echo $slot->id; ?>" method="post"
                                                            action="updateStatus">
                                                            <input type="hidden" name="slotId"
                                                                value="<?php echo $slot->id; ?>">
                                                            <input type="hidden" name="status"
                                                                value="<?php echo $slot->active_status == 'Y' ? 'N' : 'Y'; ?>">
                                                            <button
                                                                class="btn <?php echo $slot->active_status == 'Y' ? 'btn-danger' : 'btn-success'; ?> btn-sm float-right toggle-status"
                                                                data-form-id="statusForm_<?php echo $slot->id; ?>">
                                                                <?php echo $slot->active_status == 'Y' ? 'Deactivate' : 'Activate'; ?>
                                                            </button>
                                                        </form>
                                                        <form id="freezeForm_<?php echo $slot->id; ?>" method="post"
                                                            action="freezeSlots">
                                                            <input type="hidden" name="time_slot_id"
                                                                value="<?php echo $slot->id; ?>">
                                                            <div class="form-group mt-5">
                                                                <label for="freezeDate_<?php echo $slot->id; ?>">Select
                                                                    Date:</label>
                                                                <input type="date" id="freezeDate_<?php echo $slot->id; ?>"
                                                                    name="selected_date" class="form-control" required>
                                                            </div>
                                                            <button
                                                                class="btn btn-warning btn-sm float-right mr-2 freeze-slot"
                                                                data-form-id="freezeForm_<?php echo $slot->id; ?>">Freeze</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                                                        // Increase count
                                                        $count++;

                                                        // Check if count is divisible by 2 to start new row
                                                        if ($count % 2 == 0) {
                                                            echo '</div><div class="row">';
                                                        }
                                                    }
                                                }
                                                ?>
                                        </div>
                                    </div>
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

<script>
$(document).ready(function() {
    $('.toggle-status').click(function() {
        var formId = $(this).data('form-id');
        $('#' + formId).submit();
    });

    $('.toggle-collapse').click(function() {
        var target = $(this).data('target');
        $(target).collapse('toggle');
    });
});
</script>
