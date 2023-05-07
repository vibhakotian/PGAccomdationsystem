<!DOCTYPE html>
<html lang="en">
<head>
  <title>House Rental Management System - House Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" type="text/css" href="viehome.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    body {
      background-color: #f2f2f2;
    }
    .navbar {
      background-color: #f8f9fa;
      border-bottom: 1px solid #dee2e6;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 24px;
    }
    h1, h4 {
      color: #343a40;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
<div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Paying Guest Accomodation System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Houses <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="houses.php">Houses</a></li>
            <li><a href="rating.php">Rating</a></li>
          </ul>
        </li>

        <li><a href="owner.php">Owners</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tenants<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="tenant.php">Tenants</a></li>
            <li><a href="members.php">Members</a></li>
          </ul></li>
        <li><a href="booking.php">Booking</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">

         <li><a href="#"><span class="glyphicon glyphicon-user"></span>Hi <?php session_start();echo $_SESSION['uname'];?></a>
         </li>
        <li><a href="index.html"><span class="glyphicon glyphicon-user"></span> Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php
include("connection.php");
$house_id = $_GET['id']; // get the house id from the URL parameter
$query = "select * from house where id = $house_id"; // select the house data from the database
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
?>
<div class="container mt-4">
  <h1><?php echo $result['address'] ?>, <?php echo $result['city'] ?>, <?php echo $result['state'] ?></h1>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <?php echo '<img src="data:pics/jpeg;base64,'.base64_encode($result['pics']).'" class="img-fluid">' ?>
    </div>
    <div class="col-md-6">
      <h4>House Details</h4>
      <ul>
        <li><strong>No of rooms: </strong><?php echo $result['no_of_rooms'] ?></li>
        <li><strong>Address: </strong><?php echo $result['address'] ?></li>
        <li><strong>City: </strong><?php echo $result['city'] ?></li>
        <li><strong>State: </strong><?php echo $result['state'] ?></li>
        <li><strong>Country: </strong><?php echo $result['country'] ?></li>
        <li><strong>Description: </strong><?php echo $result['description'] ?></li>
        <li><strong>Rate for rent: </strong><?php echo $result['rate'] ?></li>
        <li><strong>Preferred tenant: </strong><?php echo $result['Types'] ?></li>
        <!-- add more details here if needed -->
      </ul>

      <a href="checkout.html" class="btn btn-primary">Book Now</a>
    </div>
  </div>
  <hr>
  <h4>Facilities</h4>
  <ul id="facilites">
    <li class="fact">Free Wi-Fi</li>
    <li class="fact">Air Conditioning</li>
    <li class="fact">24-hour Security</li>
    <!-- add more facilities here if needed -->
  </ul>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
