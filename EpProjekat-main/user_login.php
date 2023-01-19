<?php
session_start();
if(isset($_POST['login'])){
    include_once('connection.php');
    
    $eid = $_POST['eid'];

    $pass=md5($_POST["pass"]);

    $result = mysqli_query($con,"SELECT * FROM create_account WHERE email='" . $eid . "' and password = '$pass'");

    $count  = mysqli_num_rows($result);

    if($count==0) {
        header('location: Login.php?error=Invalid_username');
        exit;
    }

    else {
        $_SESSION['create_account_logged_in']=$eid;
         header('location:Booking Form.php');
         exit;
    }
}
?>