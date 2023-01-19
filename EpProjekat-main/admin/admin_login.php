<?php
session_start();
if(isset($_POST['login'])){
    include_once('../connection.php');
    
    $eid = $_POST['eid'];

    $pass=md5($_POST["pass"]);

    $result = mysqli_query($con,"SELECT * FROM admin WHERE username='" . $eid . "' and password = '$pass'");

    $count  = mysqli_num_rows($result);

    if($count==0) {
        header('location:index.php?error=Invalid_username');
        exit;
    }

    else {
        $_SESSION['admin_logged_in']=$eid;
        header('location:dashboard.php');
        exit;
    }
}
?>