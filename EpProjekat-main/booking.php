<?php
include_once('connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$country = $_POST['country'];
$roomType = $_POST['room_type'];
$cdate = $_POST['cdate'];
$ctime = $_POST['ctime'];
$occupancy = $_POST['Occupancy'];
$codate = $_POST['codate'];

$sql = "INSERT INTO room_booking_details(name, email, phone, address, country, room_type, check_in_date, check_in_time, check_out_date, Occupancy) VALUES ('$name', '$email', '$phone', '$address', '$country', '$roomType', '$cdate', '$ctime', '$codate', '$occupancy')";

if (mysqli_query($con, $sql)) {
    echo '<script language="javascript"> alert("You succesfully booked a room!"); location.href="index.php" </script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}


?>