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
                                    <h4>List Of Working Hours</h4>
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
                                    <li class="breadcrumb-item"><a href="#!">List Of Working Hours</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <!-- Display days of the week in a single line -->
                            <div class="d-flex justify-content-around">
                                <?php
                                // Define an array for days of the week
                                $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                
                                // Default selected day (Monday)
                                $defaultDay = 'Monday';
                                
                                // Iterate over each day
                                foreach ($daysOfWeek as $day) {
                                    $buttonClass = ($day === $defaultDay) ? 'btn btn-primary active' : 'btn btn-primary';
                                    echo '<button class="' . $buttonClass . ' day-button" data-target="#collapse_' . $day . '">' . $day . '</button>';
                                }
                                ?>
                            </div>
                        </div>
                        
                        <?php
                        // Iterate over each day
                        foreach ($daysOfWeek as $day) {
                            ?>
                        <div class="col-md-12 mb-2">
                            <div class="card">
                                <div id="collapse_<?php echo $day; ?>" class="collapse <?php echo ($day === $defaultDay) ? 'show' : ''; ?>">
                                    <div class="card-block">
                                    <div class="row p-2">

                                        <?php
                                            // Check if there are slots available for this day
                                            $slotsAvailable = false;
                                            foreach ($slots as $slot) {
                                                if ($slot->day == $day) {
                                                    $slotsAvailable = true;
                                                    ?>
                                            <div class="col-md-6 p-2">
                                            <ul class="list-group list-group-item liiteam">
                                            <span class="ml-auto"><?php echo $slot->start_time; ?> - <?php echo $slot->end_time; ?></span>

                                                <li class="pt-2">
                                                    <div class="d-flex justify-content-space-around align-items-center">
                                                            <form id="freezeForm_<?php echo $slot->id; ?>" method="post" action="freezeSlots" class="d-inline-flex align-items-center">
                                                                <input type="hidden" name="time_slot_id" value="<?php echo $slot->id; ?>">
                                                                <div class="form-group pt-4">
                                                                    <input type="date" id="freezeDate_<?php echo $slot->id; ?>" name="selected_date" class="form-control ml-2 " required style="width: auto;">
                                                                </div>
                                                            </form>
                                                            <form id="statusForm_<?php echo $slot->id; ?>" method="post" action="updateStatus" class=" d-inline-flex align-items-center ml-2">
                                                                <input type="hidden" name="slotId" value="<?php echo $slot->id; ?>">
                                                                <input type="hidden" name="status" value="<?php echo $slot->active_status == 'Y' ? 'N' : 'Y'; ?>">
                                                                <button class="btn <?php echo $slot->active_status == 'Y' ? 'btn-danger' : 'btn-success'; ?> btn-sm toggle-status ml-2" data-form-id="statusForm_<?php echo $slot->id; ?>">
                                                                    <?php echo $slot->active_status == 'Y' ? 'Deactivate A Slot' : 'Activate A Slot'; ?>
                                                                </button>
                                                            </form>
                                                            <form id="freezeForm_<?php echo $slot->id; ?>" method="post" action="freezeSlots" class="d-inline-flex align-items-center ml-2">
                                                                <input type="hidden" name="time_slot_id" value="<?php echo $slot->id; ?>">
                                                                <button class="btn btn-warning btn-sm freeze-slot ml-2" data-form-id="freezeForm_<?php echo $slot->id; ?>">Freeze A Date</button>
                                                            </form>
                                                    </div>
                                                    
                                                </li>

                                            </ul>

                                            </div>
                                        <?php
                                                }
                                            }
                                            
                                            if (!$slotsAvailable) {
                                                ?>
                                                <div class="col-md-12">
                                                    <div class="alert alert-info mt-3" role="alert">
                                                        No slots available for <?php echo $day; ?>.
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

    $('.day-button').click(function() {
        $('.day-button').removeClass('active btn-primary').addClass('btn-primary'); // Remove active class from all buttons
        $(this).removeClass('btn-primary').addClass('active'); // Add active class to the clicked button
        
        var target = $(this).data('target');
        $('.collapse').collapse('hide'); // Close all collapses
        $(target).collapse('show'); // Show the clicked collapse
    });
});
</script>
