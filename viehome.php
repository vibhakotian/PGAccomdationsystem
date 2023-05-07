<!DOCTYPE html>
<html lang="en">
<head>
  <title>House Rental Management System - House Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Paying Guest Accomodation System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Hi <?php if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
;echo $_SESSION['uname'];?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.html">Sign Out</a>
      </li>
    </ul>
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
  <h1 id="header"><?php echo $result['address'] ?>, <?php echo $result['city'] ?>, <?php echo $result['state'] ?></h1>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <?php echo '<img src="data:pics/jpeg;base64,'.base64_encode($result['pics']).'" class="img-fluid">' ?>
    </div>
    <div class="col-md-6">
      <h4>House Details</h4>
      <ul>
        <li><strong>No of rooms: </strong><?php echo $result['no_of_rooms'] ?></li>
        <li><strong>City: </strong><?php echo $result['city'] ?></li>
        <li><strong>State: </strong><?php echo $result['state'] ?></li>
        <li><strong>Country: </strong><?php echo $result['country'] ?></li>
        <li><strong>Deposit: </strong> ₹ <?php echo $result['deposit'] ?> </li>
        <li><strong>Rate for rent: </strong> ₹ <?php echo $result['rate'] ?> </li>
        <li><strong>PG Type: </strong><?php echo $result['pg_type'] ?> </li>
        <li><strong>Preferred tenant: </strong><?php echo $result['Types'] ?></li>
        <!-- add more details here if needed -->
      </ul>

       <a href="fromfill.php?id=<?php echo $result['id'] ?>" class="btn btn-primary">Book Now</a>
    </div>
  </div>
  <hr>
  <h4>Facilities</h4>
  <ul id="facilities">
  <li class="fact"><i class="fa fa-wifi"></i> Free Wi-Fi</li>
  <li class="fact"><i class="fa fa-snowflake"></i> Air Conditioning</li>
  <li class="fact"><i class="fa fa-utensils"></i> Tiffin Facility</li>
  <li class="fact"><i class="fa fa-burn"></i> Geyser</li>
  <li class="fact"><i class="fa fa-toolbox"></i> Well Maintained</li>
  <li class="fact"><i class="fa fa-tshirt"></i> Laundry Facility</li>
  <li class="fact"><i class="fa fa-bolt"></i> 24/7 Electricity Supply</li>
  <!-- add more facilities here if needed -->
</ul>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
