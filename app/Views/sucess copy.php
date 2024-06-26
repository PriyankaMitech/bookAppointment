<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booked Successfully</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        /* Styles for the card */
.card {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 100px;
}

/* Header styles */
.card-header {
    background-color: #28a745;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    padding: 15px;
}

.card-header h5 {
    margin: 0;
}

/* Body styles */
.card-body {
    padding: 20px;
}

.card-text {
    margin-bottom: 20px;
}

/* List styles */
.list-group-item {
    border: none;
}

.list-group-item:first-child {
    border-top: none;
}

.list-group-item:last-child {
    border-bottom: none;
}

/* Footer styles */
.card-footer {
    background-color: #f8f9fa;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 15px;
    text-align: center;
}

    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Appointment Booked Successfully!</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Thank you, <strong><?php echo $fullname; ?></strong>, for booking your appointment.</p>
                <p class="card-text">Your appointment details:</p>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Full Name:</strong> <?php echo $fullname; ?></li>
                    <li class="list-group-item"><strong>Appointment Type:</strong><?php echo $appointmentType; ?></li>
                    <li class="list-group-item"><strong>Time Slot:</strong><?php echo $timeSlot; ?></li>
                    <li class="list-group-item"><strong>Selected Date:</strong><?php echo $selectedDate; ?></li>
                    <!-- <li class="list-group-item"><strong>Appointment ID:</strong> {{ $lastInsertId }}</li> -->
                </ul>
            </div>
            <div class="card-footer">
                <!-- Add any additional content or buttons here -->
            </div>
        </div>
    </div>
</body>
</html>
