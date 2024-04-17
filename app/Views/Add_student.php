<?php include('header.php');?>
<style>
.form-check-input.box {
    margin-left: -0.25rem;
}

.form-check-input.red {
    margin-left: -0.25rem;
}
</style>
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Appointment Form (Prediction)</h2>
                        </div>
                        <div class="card-body">
                            <form action="add_appointment" method="post">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="name" name="fullname" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-sm-3 col-form-label">Mobile Number:</label>
                                    <div class="col-sm-9">
                                        <input type="tel" id="mobile" name="contact_number" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="twins" class="col-sm-3 col-form-label">Are you one of the twins:</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="wizard-form-radio">
                                                    <input name="twins" id="twinsYes" type="radio" value="yes">
                                                    <label for="twinsYes">Yes</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="wizard-form-radio">
                                                    <input name="twins" id="twinsNo" type="radio" checked value="no">
                                                    <label for="twinsNo">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" id="appointmentType">
                                    <label for="mobile" class="col-sm-3 col-form-label">Appointment Type:</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="wizard-form-radio">
                                                    <input name="appointmentType" id="online" type="radio"
                                                        value="online">
                                                    <label for="online">Online</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="wizard-form-radio">
                                                    <input name="appointmentType" id="offline" type="radio" checked
                                                        value="offline">
                                                    <label for="offline">Offline</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Additional options -->
                                        <div class="extra-options" id="extraOptions" style="display: none;">
                                            <div class="col-sm-2">
                                                <div class="wizard-form-radio">
                                                    <input name="appointmentOption" id="audio" type="radio"
                                                        value="audio">
                                                    <label for="audio">Audio</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="wizard-form-radio">
                                                    <input name="appointmentOption" id="video" type="radio"
                                                        value="video">
                                                    <label for="video">Video</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-group row">
                                    <label for="appointment_date" class="col-sm-3 col-form-label">Appointment
                                        Date:</label>
                                    <div class="col-sm-9">
                                        <input type="date" id="appointment_date" name="appointment_date"
                                            class="form-control" required>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label for="dob" class="col-sm-3 col-form-label">Date of Birth:</label>
                                    <div class="col-sm-9">
                                        <input type="date" id="dob" name="dob" class="form-control" required
                                            max="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tob" class="col-sm-3 col-form-label">Time of Birth:</label>
                                    <div class="col-sm-9">
                                        <input type="time" id="tob" name="tob" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Country" class="col-sm-3 col-form-label">Country:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="Country" name="Country" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="state" class="col-sm-3 col-form-label">State:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="state" name="State" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="City" class="col-sm-3 col-form-label">City:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="City" name="City" class="form-control" required>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="amount" class="col-sm-3 col-form-label">Fee Amount:</label>
                                    <div class="col-sm-3">
                                        <input type="text" id="amount" name="amount" class="form-control" required>
                                    </div>
                                </div> -->

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Subjects:</label>
                                    <div class="col-sm-9">
                                        <!-- First set of checkboxes -->
                                        <div class="inline-checkboxes">
                                            <!-- Checkbox 1 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject1"
                                                    name="subjects[]" value="Education">
                                                <label class="form-check-label" for="subject1">Education</label>
                                            </div>
                                            <!-- Checkbox 2 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject2"
                                                    name="subjects[]" value="Foreign Travel">
                                                <label class="form-check-label" for="subject2">Foreign Travel</label>
                                            </div>
                                            <!-- Checkbox 3 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject3"
                                                    name="subjects[]" value="Marriage">
                                                <label class="form-check-label" for="subject3">Marriage</label>
                                            </div>
                                            <!-- Checkbox 4 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject4"
                                                    name="subjects[]" value="Re-marriage">
                                                <label class="form-check-label" for="subject4">Re-marriage</label>
                                            </div>
                                            <!-- Checkbox 5 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject5"
                                                    name="subjects[]" value="Child birth">
                                                <label class="form-check-label" for="subject5">Child birth</label>
                                            </div>
                                            <!-- Checkbox 6 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject6"
                                                    name="subjects[]" value="Love Life">
                                                <label class="form-check-label" for="subject6">Love Life</label>
                                            </div>
                                            <!-- Checkbox 7 -->

                                        </div>
                                        <!-- Second set of checkboxes -->
                                        <div class="inline-checkboxes">
                                            <!-- Checkbox 8 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject8"
                                                    name="subjects[]" value="Siblings">
                                                <label class="form-check-label" for="subject8">Siblings</label>
                                            </div>
                                            <!-- Checkbox 9 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject9"
                                                    name="subjects[]" value="Job">
                                                <label class="form-check-label" for="subject9">Job</label>
                                            </div>
                                            <!-- Checkbox 10 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject10"
                                                    name="subjects[]" value="Business">
                                                <label class="form-check-label" for="subject10">Business</label>
                                            </div>
                                            <!-- Checkbox 11 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject11"
                                                    name="subjects[]" value="Partnership">
                                                <label class="form-check-label" for="subject11">Partnership</label>
                                            </div>
                                            <!-- Checkbox 12 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject12"
                                                    name="subjects[]" value="Property">
                                                <label class="form-check-label" for="subject12">Property</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject12"
                                                    name="subjects[]" value="BehaviouralIssue">
                                                <label class="form-check-label" for="subject12">Behavioural
                                                    Issue</label>
                                            </div>

                                        </div>
                                        <div class="inline-checkboxes">
                                            <!-- Checkbox 15 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject15"
                                                    name="subjects[]" value="Finance">
                                                <label class="form-check-label" for="subject15">Finance</label>
                                            </div>
                                            <!-- Checkbox 16 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject16"
                                                    name="subjects[]" value="Share market">
                                                <label class="form-check-label" for="subject16">Share market</label>
                                            </div>
                                            <!-- Checkbox 17 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject17"
                                                    name="subjects[]" value="Health">
                                                <label class="form-check-label" for="subject17">Health</label>
                                            </div>
                                            <!-- Checkbox 18 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject18"
                                                    name="subjects[]" value="Parents relation">
                                                <label class="form-check-label" for="subject18">Parents relation</label>
                                            </div>
                                            <!-- Checkbox 19 -->
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject19"
                                                    name="subjects[]" value="Legal case">
                                                <label class="form-check-label" for="subject19">Legal case</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject13"
                                                    name="subjects[]" value="Others">
                                                <label class="form-check-label" for="subject13">Others</label>
                                            </div>
                                        </div>
                                        <div class="inline-checkboxes">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input box" type="checkbox" id="subject7"
                                                    name="subjects[]" value="Divorce">
                                                <label class="form-check-label" for="subject7">Divorce</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="appointment_date" class="col-sm-3 col-form-label">Appointment Date:</label>
                                    <div class="col-sm-9">
                                        <input type="date" id="appointment_date" name="appointment_date"
                                            class="form-control" required>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label for="appointment_date" class="col-sm-3 col-form-label">Appointment
                                        Date:</label>
                                    <div class="col-sm-9">
                                        <input type="date" id="appointment_date" name="appointment_date"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Slots:</label>
                                    <div class="col-sm-9" id="slots_container">
                                        <!-- Slots will be displayed here -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
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
function handleAppointmentTypeChange() {
    var extraOptions = document.querySelector('.extra-options');
    var onlineRadio = document.getElementById('online');
    var offlineRadio = document.getElementById('offline');

    // If Online option is checked, show additional options and uncheck Offline option
    if (onlineRadio.checked) {
        extraOptions.style.display = 'block';
        offlineRadio.checked = false;
    } else {
        extraOptions.style.display = 'none';
    }
}

// Event listeners for both Online and Offline radio buttons
document.getElementById('online').addEventListener('change', handleAppointmentTypeChange);
document.getElementById('offline').addEventListener('change', handleAppointmentTypeChange);

// Initial setup to ensure correct display state based on initial radio button checked state
handleAppointmentTypeChange();
</script>
<script>
$(document).ready(function() {
    $('#appointment_date').change(function() {
        var selectedDate = $(this).val();
        $.ajax({
            type: "POST",
            url: "getnewslots",
            data: {
                date: selectedDate
            },
            dataType: 'json', // Expect JSON data as response
            success: function(slots) {
                // Clear previous slots
                $('#slots_container').empty();
                // Check if slots array is empty
                if (slots.length === 0) {
                    $('#slots_container').html(
                        '<p>No slots available for selected date.</p>');
                } else {
                    // Iterate through each slot and append to slots container
                    $.each(slots, function(index, slot) {
                        $('#slots_container').append(
                            '<div class="form-check form-check-inline">' +
                            '<input class="form-check-input red" type="radio" id="slot_' +
                            slot.id + '" name="slot" value="' + slot.id + '">' +
                            '<label class="form-check-label" for="slot_' + slot
                            .id +
                            '">' + slot.start_time + '</label>' +
                            '</div>');
                    });

                    // Add event listener to radio buttons
                    $('input[name="slot"]').change(function() {
                        var selectedSlotId = $(this).val();
                        // Now you can use selectedSlotId as needed
                        console.log(selectedSlotId);
                    });
                }
            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.error(xhr.responseText);
            }
        });
    });
});
</script>