<?php include('header.php');?>



<div class="pcoded-content">

    <div class="pcoded-inner-content">

        <!-- Main-body start -->

        <div class="main-body">

            <div class="page-wrapper">

            <div class="page-header card">

                    <div class="row align-items-end">

                        <div class="col-lg-8 col">

                            <div class="page-header-title">

                                <i class="icofont icofont-file-code bg-c-blue"></i>

                                <div class="d-inline">

                                    <h4>Add Student</h4>

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

                                    <li class="breadcrumb-item"><a href="#!">Add Student</a>

                                    </li>

                                   



                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="container">

                    <div class="card">

                       

                        <div class="card-body">

                        <form action="<?= base_url(); ?>classForm" method="post" id="classForm">

<div class="row">

    <div class="col-md-6">

        <div class="form-group">
            <input type="hidden" id="id" name="id" class="form-control" value="<?php if (!empty($single_data)) { echo $single_data->id; } ?>">

            <label for="name">Name *:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php if (!empty($single_data)) { echo $single_data->name; } ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php if (!empty($single_data)) { echo $single_data->email; } ?>">
        </div>

        <div class="form-group">
            <label for="contact_number">Contact Number *:</label>
            <input type="tel" id="contact_number" name="contact_number" class="form-control" value="<?php if (!empty($single_data)) { echo $single_data->contact_number; } ?>" required>
        </div>

        <div class="form-group">
            <label for="start_date">Class Beginning Date *:</label>
            <input type="date" id="start_date" name="start_date" class="form-control" value="<?php if (!empty($single_data)) { echo $single_data->start_date; } ?>" required>
        </div>

        <div class="form-group">
            <label for="end_date">Class End Date :</label>
            <input type="date" id="end_date" name="end_date" value="<?php if (!empty($single_data)) { echo $single_data->end_date; } ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="Certificate">Certificate & Marksheet code :</label>
            <input type="text" id="Certificate" name="Certificatid" class="form-control" value="<?php if (!empty($single_data)) { echo $single_data->Certificatid; } ?>">
        </div>

    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="class_days">Class Days:</label>
            <div class="row ml-1">
                <?php
                $class_days = isset($single_data) && is_object($single_data) ? explode(',', $single_data->class_days) : [];
                $days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                foreach ($days as $day) {
                    $checked = in_array($day, $class_days) ? 'checked' : '';
                    echo "
                    <div class='col-md-6'>
                        <div class='form-check'>
                            <input class='form-check-input' type='checkbox' id='{$day}' name='class_days[]' value='{$day}' {$checked}>
                            <label class='form-check-label' for='{$day}'>{$day}</label>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>

        <div class="form-group">
            <label for="start_time">Class Time *:</label>
            <input type="time" id="start_time" name="start_time" class="form-control" value="<?php if (!empty($single_data)) { echo $single_data->start_time; } ?>" required>
        </div>

        <div class="form-group">
            <label for="batch_name">Batch Name:</label>
            <input type="text" id="batch_name" name="batch_name" class="form-control" value="<?php if (!empty($single_data)) { echo $single_data->batch_name; } ?>">
        </div>

        <div class="form-group">
            <label for="fees">Fees *:</label>
            <input type="text" id="fees" name="fees" class="form-control" value="<?php if (!empty($single_data)) { echo $single_data->fees; } ?>" required>
        </div>

        <div class="form-group">
            <label for="marks">Marks Obtained (%) :</label>
            <input type="text" id="marks" name="marks" class="form-control" value="<?php if (!empty($single_data)) { echo $single_data->marks; } ?>">
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


<script>
$(document).ready(function() {
    $('#classForm').submit(function(e) {
        var checked = $('input[name="class_days[]"]:checked').length > 0;
        if (!checked) {
            alert("Please select at least one class day.");
            e.preventDefault();
        }
    });
});
</script>

