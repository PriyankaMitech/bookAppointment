<?php
require_once('db-connect.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $conn->close();
    exit;
}

extract($_POST);
$allday = isset($allday);

// Format the datetime values for database insertion
$start_datetime = strtotime($start_datetime);
$end_datetime = strtotime($end_datetime);

while ($start_datetime <= $end_datetime) {
    $current_datetime = date('Y-m-d H:i:s', $start_datetime);

    if (empty($id)) {
        $sql = "INSERT INTO `schedule_list` (`title`,`description`,`start_datetime`,`end_datetime`) VALUES ('$title','$description','$current_datetime','$current_datetime')";
    } else {
        $sql = "UPDATE `schedule_list` SET `title` = '{$title}', `description` = '{$description}', `start_datetime` = '{$current_datetime}', `end_datetime` = '{$current_datetime}' WHERE `id` = '{$id}'";
    }

    $save = $conn->query($sql);

    if (!$save) {
        echo "<pre>";
        echo "An Error occurred.<br>";
        echo "Error: " . $conn->error . "<br>";
        echo "SQL: " . $sql . "<br>";
        echo "</pre>";
        $conn->close();
        exit;
    }

    // Increment to the next day
    $start_datetime = strtotime('+1 day', $start_datetime);
}

echo "<script> alert('Schedule Successfully Saved.'); location.replace('./') </script>";
$conn->close();
?>



