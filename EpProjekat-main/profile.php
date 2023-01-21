<?php
session_start();
error_reporting(1);
include('connection.php');
$eid=$_SESSION['create_account_logged_in'];
extract($_REQUEST);
if(isset($update))
{
    $que="update create_account set name='$name',password='$pass',mobile='$mob',address='$add' where email='$eid'";
    mysqli_query($con,$que);
    $msg= "<h3 style='color:blue'>Profile Updated successfully</h3>";
}
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
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body style="margin-top:50px;">
<?php
include('Menu Bar.php');
?>
<?php
$sql= mysqli_query($con,"select * from create_account where email='$eid' ");
$result=mysqli_fetch_assoc($sql);
?>
<div class="container-fluid"id="primary">
    <center><h1 style="background-color:#f4ac41;border-radius:10px;padding:10px; display:inline-block;font-weight:bold;">User Profile</h1></center><br>
    <div class="container">
        <div class="row">
            <center><?php  echo $msg; ?></center>
            <form class="form-horizontal" method="post">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4"><h4> Name :</h4></div>
                            <div class="col-sm-8">
                                <input type="text" name="name" value="<?php echo $result['name']; ?>"class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4"><h4>Email:</h4></div>
                            <div class="col-sm-8">
                                <input type="text" value="<?php echo $result['email']; ?>"class="form-control"/readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4"><h4>Password:</h4></div>
                            <div class="col-sm-8">
                                <input type="text" name="pass" value="<?php echo $result['password']; ?>"class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4"><h4>Mobile:</h4></div>
                            <div class="col-sm-8">
                                <input type="text" name="mob" value="<?php echo $result['mobile']; ?>"class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4"><h4>Address:</h4></div>
                            <div class="col-sm-8">
                                <input type="text" name="add" value="<?php echo $result['address']; ?>"class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-4"><h4>Gender:</h4></div>
                            <div class="col-sm-8">
                                <strong><?php echo $result['gender']; ?></strong>
                            </div>
                        </div>
                    </div>
                

                    <div class="form-group">
                        <div class="row">
                            <div class="control-label col-sm-5"></div>
                            <div class="col-sm-7	">
                                <input type="submit" value="Update Profile" name="update" class="btn btn-success btn-group-justified"required style="color:#000;font-weight:bold;height:40px;"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <center><h1 style="background-color:#f4ac41;border-radius:10px;padding:10px; display:inline-block;font-weight:bold;">Bookings History</h1></center><br>
    <div class="container" style="margin-bottom: 40px;">
        <?php
        $sqlGetBookings=mysqli_query($con,"select * from room_booking_details WHERE email='$eid'");
        while($b_res=mysqli_fetch_assoc($sqlGetBookings))
        {
        ?>
            <div style="border: 1px solid #333; padding: 16px; margin-bottom: 16px; border-radius: 10px;">
                <h3 style="margin: 0; margin-bottom: 16px; background-color:#f4ac41;border-radius:10px;padding:10px; display: inline-block;">Booking (#<?php echo $b_res['id']; ?>)</h3>
                <p style="margin: 0; margin-bottom: 8px; text-transform:capitalize;"><strong>Room Type: </strong> <?php echo $b_res['room_type']; ?> </p>
                <p style="margin: 0; margin-bottom: 8px; text-transform:capitalize;"><strong>Occupancy: </strong> <?php echo $b_res['Occupancy']; ?> </p>
                <p style="margin: 0; margin-bottom: 8px;"><strong>Check In: </strong> <?php echo $b_res['check_in_date']; ?> (<?php echo $b_res['check_in_time'] ?>) </p>
                <p style="margin: 0; margin-bottom: 8px;"><strong>Check Out: </strong> <?php echo $b_res['check_out_date']; ?> </p>
                <hr>
                <form method="post" action="rate_booking.php">
                    <label for="rating-input">Rate your stay:</label>
                    <input type="hidden" name="booking_id" value="<?php echo $b_res['id'] ?>" />
                    <input
                        type="number"
                        min="1" max="5"
                        value="<?php echo $b_res['Rating']; ?>"
                        class="form-control"
                        style="width: auto; display:inline-block; margin-left: 8px;"
                        id="rating-input"
                        name="rating"
                        placeholder="1-5"
                        required
                        <?php
                            if($b_res['Rating']) {
                        ?>
                        disabled
                        <?php
                        }
                        ?>
                    />
                    <input
                        type="submit"
                        value="Leave rating"
                        class="btn btn-success btn-group-justified"
                        required
                        style="color:#000;font-weight:bold;width: 120px;border: 1px solid #5cb85c;margin-top: 8px;"
                    />
                </form>
            </div>
        <?php }?>
    </div>
</div>
<?php
include('Footer.php')
?>
</body>
</html>
