<?php 
$i=1;
$sql=mysqli_query($con,"select * from admin");
while($res=mysqli_fetch_assoc($sql))
{
?>
<!DOCTYPE html>
<html>
<head>
  <title>Apartman Booking</title>
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
<h1 style="background-color:#e5e5e5;border-radius:50px;text-align:center;box-shadow:5px 5px 9px black;text-shadow:2px 2px #fff;">Admin Profile</h1><br>
<center><img src="../image/user/user.png"style="width:180px;height:180px;"class="img-circle"></center>
<div class="container"style="width:100%;">
  <form action="/action_page.php">
    <div class="form-group">
      <label for="email">Name:</label>
       <input type="text" id="username" value="<?php echo $res['username']; ?>" class="form-control" name="name" readonly="readonly"/>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"value="<?php echo $res['password']; ?>">
    </div>
  </form>
</div>
<?php   
}
?>
</body>
</html>