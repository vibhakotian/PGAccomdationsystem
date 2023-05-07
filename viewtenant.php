<?php
include("connection.php");
$tt_id =  $_GET['id']; // get the tenant id from the URL parameter
$query = "select * from tenantpaid where id = $tt_id" ;// select the tenant data from the database

$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
?>

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
<link rel="stylesheet" href="viewtenant.css">

<link rel="stylesheet" type="text/css" href="viehome.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="viewtenant.js"></script>
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


<div class="user-detail-container">
<!--   ya dekhi -->
    <div class="user-detail">
      <div class="upper-card">
      <div class="row">
        <div class="col-md-6">
          <div class="card user-profile-card" data-mh="card-one">
            <div class="card-img-top">
            <?php echo '<img src="data:pics/jpeg;base64,'.base64_encode($result['id_photo']).'" class="img-fluid">' ?>   
          </div>
            <div class="card-body">
              <h3><?php echo $result['firstname'] ?></h3>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card user-detail-card" data-mh="card-one">
          <?php if (isset($result['firstname'])) { ?>
    <h3><?php echo $result['firstname'] ?></h3>
  <?php } ?>
  <?php if (isset($result['age'])) { ?>
    <p><span>Age :</span> <?php echo $result['age'] ?></p>
  <?php } ?>
  <?php if (isset($result['email'])) { ?>
    <p><span>Email :</span> <?php echo $result['email'] ?></p>
  <?php } ?>
  <?php if (isset($result['city'])) { ?>
    <p><span>Location :</span> <?php echo $result['city'] ?></p>
  <?php } ?>
  <?php if (isset($result['calender'])) { ?>
    <p><span>Booking Date :</span> <?php echo $result['calender'] ?></p>
  <?php } ?>
  <?php if (isset($result['mobile_no'])) { ?>
    <p><span>Contact no. :</span> <?php echo $result['mobile_no'] ?></p>
  <?php } ?>

          </div>
        </div>
      </div>
        </div>
      <div class="lower-card">
          <div class="card">
            <div class="box">
                <!-- User Detail -->
                <div class="parent-container">
                  <ul class="faq">
                    
                    <li>
                      <h3 class="question">Manage Image
                        <div class="plus-minus-toggle collapsed"></div>
                      </h3>
                      <div class="answer">
                        <div class="img-gallery">
                          <img src="https://pmcvariety.files.wordpress.com/2018/08/j-lo.jpg?w=1000" alt="">
                          <img src="https://static.independent.co.uk/s3fs-public/thumbnails/image/2019/04/17/10/jlo-vanity-fair.jpg" alt="">
                          <img src="https://cdn3.iconfinder.com/data/icons/user-with-laptop/100/user-laptop-512.png" alt="">
                          <img src="https://cdn3.iconfinder.com/data/icons/user-with-laptop/100/user-laptop-512.png" alt="">
                        </div>
                      </div>
                    </li>
                    <li>
                      <h3 class="question">My Prefrences
                        <div class="plus-minus-toggle collapsed"></div>
                      </h3>
                      <div class="answer">
                        <p class="list-title">Full Name :</p>
                        <span>Suraj Maharjan</span>
                        <p class="list-title">Age :</p>
                        <span>25</span>
                        <p class="list-title">Location :</p>
                        <span>Near Kathmandu</span>
                        <p class="list-title">Date of Birth :</p>
                        <span>1995-023-13</span>
                        <p class="list-title">Gender :</p>
                        <span>Male</span>
                        <p class="list-title">About Me :</p>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, sunt in. </span>
                      </div>
                    </li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        </div>
<!--   ya samma -->
</div>
</body>
</html>
