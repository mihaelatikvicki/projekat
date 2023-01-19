<?php
include_once('connection.php');

//chmod("../image/users", 777);
$target = getcwd()."\image\users\\"; 
$target = $target . basename( $_FILES['pict']['name']);

$fname = $_POST['fname'];
$email = $_POST['email'];
$Passw = md5($_POST['Passw']);
$mobi = $_POST['mobi'];
$addr = $_POST['addr'];
$gend = $_POST['gend'];
$countr = $_POST['countr'];
$picturename ='../image/users/' . $_FILES['pict']['name'];
$pict = getcwd() ."\image\users\\".($_FILES['pict']['name']);


$move = move_uploaded_file($_FILES['pict']['tmp_name'], $target);


$sql = "INSERT INTO create_account(name, email, password, mobile, address, gender, country, picture) VALUES ('$fname', '$email', '$Passw', '$mobi', '$addr', '$gend', '$countr', '$picturename')";

if (mysqli_query($con, $sql)) {
     echo '<script language="javascript"> alert("You succesfully made an account!"); location.href="Login.php" </script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}


?>