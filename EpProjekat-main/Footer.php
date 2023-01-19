<?php
include('connection.php');
extract($_REQUEST);
if(isset($send))
{
    mysqli_query($con,"insert into feedback values('','$n','$e','$mob','$msg')");
    $msg= "<h4 style='color:green;'>feedback sent successfully</h4>";
}
?>


<footer style="background-color: #393939;">
    <div class="container-fluid">
        <div class="col-sm-4 hov">
            <br>
            <img src="logo/logo1.png"width="200px"height="50px"/><br>
        </div>&nbsp;&nbsp;
        <br> <br>
        <br> <br>
        <div class="col-sm-4 text-justify">
            <h3 style="color:#cdd51f;">Contact Us</h3>
            <p style="color:white;"><strong>Address: </strong>Marka Oreskovica 16</p>
            <p style="color:white;"><strong>Email:&nbsp;</strong>apartmanbooking@gmail.com</p>
            <p style="color:white;"><strong>Contact Us:&nbsp;</strong>+381/6212345</p><br><br><br>

        </div>&nbsp;



    </div>
</footer>

<div id="detection">
    <?php
    $header_ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    $keywords = array("nokia","samsung","sonyericsson","alcatel","panasonic","tosh","benq","sagem","android","iphone","berry","palm","mobi","lg","symb");
    $mobile = false;
    $match = "";

    foreach($keywords as $keyword)
    {
        if(strpos($header_ua,$keyword)!==false)
        {
            $mobile = true;
            $match = $keyword;
            break;
        }
    }
    echo "<p><b>You are using :</b> $header_ua</b>";

    if($mobile)
        echo "<p>You are using mobile device. (Your device is : $match)</p>";
    else
        echo "<p>You are not using mobile device.</p>"
    ?>

<footer class="container-fluid text-center"style="background-color:#000408;height:40px;padding-top:10px;color:#f0f0f0;">
    <p> All Rights Reserved 2021</p>
</footer>

