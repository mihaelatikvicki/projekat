<?php
include_once('connection.php');

$rating = $_POST['rating'];
$booking_id = $_POST['booking_id'];

$sql = "UPDATE room_booking_details SET Rating = '$rating' WHERE id='$booking_id'";

if (mysqli_query($con, $sql)) {
    echo '<script language="javascript"> alert("You succesfully rated your stay!"); location.href="profile.php" </script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}


?>