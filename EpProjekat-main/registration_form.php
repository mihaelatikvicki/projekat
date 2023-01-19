<?php
include('connection.php');
// extract($_REQUEST);
// if(isset($save))
// {
//     $sql= mysqli_query($con,"select * from create_account where email='$email' ");
//     if(mysqli_num_rows($sql))
//     {
//         $msg= "<h1 style='color:red'> Account already exists!</h1>";
//     }
//     else
//     {

//         $sql="insert into create_account(name,email,password,mobile,address,gender,country,pictrure) values('$fname','$email','$Passw','$mobi','$addr','$gend','$countr','$pict')";
//         if(mysqli_query($con,$sql))
//         {
//             $msg= "<h1 style='color:green'>Data Saved Successfully!</h1>";
//             header('location:Login.php');
//         }
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Apartman Booking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="css/style.css"rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body style="margin-top:50px;">
<?php
 include('Menu Bar.php')
?>
<div class="container-fluid"style="background-color:#ffffff;color:#000;"> 
    <div class="container">
        <div class="row">
            <center><h1 style="background-color:#f4ac41; padding:10px; border-radius:10px;display:inline-block;"><b>Create New Account</b></h1></center>
            <?php echo @$msg;?><br>
            <div class="col-sm-2"></div>
            <div class="col-sm-6 ">
                <form class="form-horizontal" method="post" action="user.php" enctype="multipart/form-data">
                    <div class="form-group">

                        <div class="control-label col-sm-5"><h4>Name:</h4></div>
                        <div class="col-sm-7">
                            <input type="text" name="fname" class="form-control"placeholder="Enter your name"required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4>Email:</h4></div>
                        <div class="col-sm-7">
                            <input type="email" name="email" class="form-control"placeholder="Enter your email" autocomplete="off"required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4>Password:</h4></div>
                        <div class="col-sm-7">
                            <input type="password" name="Passw" class="form-control"placeholder="Enter your password"autocomplete="off"required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4>Mobile Number:</h4></div>
                        <div class="col-sm-7">
                            <input type="number" name="mobi" class="form-control"placeholder="Enter your number"required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4>Address:</h4></div>
                        <div class="col-sm-7">
                            <textarea  name="addr" class="form-control"required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4 id="top">Gender:</h4></div>
                        <div class="col-sm-7">
                            <input type="radio" name="gend"value="male"required><b>Male</b>&emsp;
                            <input type="radio" name="gend"value="male"required><b>Female</b>&emsp;
                            <input type="radio" name="gend"value="male"required><b>Other</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4>Country:</h4></div>
                        <div class="col-sm-7">
                            <input name="countr" class="form-control" placeholder="Enter your country" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4 id="top">Profile picture:</h4></div>
                        <div class="col-sm-7">
                            <input type="file" name="pict" accept="image/*">
                        </div>
                        <div class="row">
                            <div class="col-sm-6"style="text-align:right;"><br>
                                <input type="submit" value="Submit" name="save"class="btn btn-success btn-group-justified"required style="color:#000;font-weight:bold;height:40px;"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-4">
        </div>
    </div>
</div>
</div>
<?php
include('Footer.php')
?>
</body>
</html>

