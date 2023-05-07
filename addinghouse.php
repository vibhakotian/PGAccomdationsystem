<!DOCTYPE html>
<html>
<head>
	<title>House Rental Management System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		.navbar-brand {
			font-size: 24px;
			font-weight: bold;
		}
		.form-group {
			margin-bottom: 20px;
		}
		.form-control-file {
			padding-top: 7px;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">House Rental Management System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Hi <?php session_start();echo $_SESSION['uname'];?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.html">Sign Out</a>
      </li>
    </ul>
  </div>  
</nav>
<div class="container mt-3">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="no_of_rooms">Number of Rooms:</label>
          <input type="number" class="form-control" id="no_of_rooms" name="no_of_rooms" required>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" required>
          </div>
          <div class="form-group col-md-6">
            <label for="state">State:</label>
            <input type="text" class="form-control" id="state" name="state" required>
          </div>
        </div>
        <div class="form-group">
          <label for="country">Country:</label>
          <input type="text" class="form-control" id="country" name="country" required>
        </div>
        <div class="form-group">
          <label for="rate">Rate:</label>
          <input type="number" class="form-control" id="rate" name="rate" required>
        </div>
        <div class="form-group">
          <label for="rate">Gender</label>
          <input type="text" class="form-control" id="Gender" name="Gender" required>
        </div>
        <div class="form-group">
          <label for="country">Type</label>
          <input type="text" class="form-control" id="pg_type" name="pg_type" required>
        </div>
        <div class="form-group">
          <label for="pics">Upload Pictures:</label>
          <input type="file" class="form-control-file" id="pics" name="pics" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>
  </div>
</div>
<?php
if(isset($_POST['submit'])){
  // Database connection
  include("connection.php");

  // Get form data
  $no_of_rooms = mysqli_real_escape_string($conn, $_POST['no_of_rooms']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $state = mysqli_real_escape_string($conn, $_POST['state']);
  $country = mysqli_real_escape_string($conn, $_POST['country']);
  $rate = mysqli_real_escape_string($conn, $_POST['rate']);
  $pics = addslashes(file_get_contents($_FILES["pics"]["tmp_name"]));
  $Gender= mysqli_real_escape_string($conn, $_POST['Gender']);
  $pg_types= mysqli_real_escape_string($conn, $_POST['pg_types']);

  // Insert data into house table
  $query = "INSERT INTO house (no_of_rooms, address, city, state, country, rate, pics,Types,pg_type) VALUES ('$no_of_rooms', '$address', '$city', '$state', '$country', '$rate', '$pics',$Gender,$pg_types)";
  $result = mysqli_query($conn, $query);

  if($result){
    echo "<script>alert('House details uploaded successfully');</script>";
    echo "<script>window.location.href='ownerweb.php';</script>";
  } else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
  }
}
?>
</div>
</body>
</html>
