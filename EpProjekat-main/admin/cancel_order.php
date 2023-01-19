<?php
include('../connection.php');
$oid=$_GET['booking_id'];
$sql=mysqli_query($con,"select * from room_booking_details where id='$oid' ");
$res=mysqli_fetch_assoc($sql);
$q=mysqli_query($con,"delete from  room_booking_details where id='$oid' ");



if($q)
{
    $to      = $res['email'];
    $subject = 'Otkazivanje rezervacije';
    $message = 'Nazalost Vasu rezervaciju od '. $res['check_in_date'] .' do ' . $res['check_out_date'] .' moramo otkazati!';
    $headers = 'From: administrator@example.com' . "\r\n" .
        'Reply-To: administrator@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $headers);

    header('location:dashboard.php?option=booking_details');
    
}
?>

