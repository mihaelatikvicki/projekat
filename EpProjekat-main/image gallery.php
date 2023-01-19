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
</head> 
<body style="margin-top:50px;"> 
  <?php
      include('Menu Bar.php')
  ?>
<div class="container">
  <h2>Gallery</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="image/Slider/img1.jpeg" target="_blank">
          <img src="image/Slider/img1.jpeg" alt="img1 Not Show" style="width:100%;height:160px;">
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="image/Slider/img2.jpeg" target="_blank">
          <img src="image/Slider/img2.jpeg" alt="img2 Not Show" style="width:100%;height:160px;">
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="image/Slider/img3.jpeg" target="_blank">
          <img src="image/Slider/img3.jpeg" alt="img3 Not Show" style="width:100%;height:160px;">
        </a>
      </div>
    </div>
  </div>
</div>
<?php
  include('Footer.php')
?>
</body>
</html>