<!DOCTYPE html>
<html lang="en">
<head>
  <title>House Rental Management System</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    #tenant{
	float:right;
	margin-right: -100%;

}
#house{
	margin-left: 20%;
}

    </style>

</head>
<body>

  
<div class="container" style="margin-top:0px ">
<h3><b>Welcome <?php 
 echo $_SESSION['uname'];
 ?></b><br><br></h3>
 <div class="row">
  <div class="col-lg-3">
 <div class="card colo-md-4" style="width:350px"id="house" >
  <img class="card-img-top" src="https://assets.architecturaldigest.in/photos/60083c32a87939f78414efcc/16:9/pass/Pune-home-interiors-Mirari-Design-Visuals-1366x768.jpg"  alt="Card image" width="250px;" height="100px;">
  <div class="card-body"><center>
    <h4 class="card-title"><b>Add house</b></h4><br>
    <p class="card-text">Details of our house .</p><br>
    <a href="addinghouse.php" class="btn btn-primary">See Details</a></center><br>
  </div>
</div>
<br>
</div>
  <div class="col-lg-3">
<div class="card colo-md-4" style="width:350px" id="tenant">
  <img class="card-img-top" src="tenantimg.jpeg" alt="Card image" width="350px;" height="100px;">
  <div class="card-body">
    <center><h4 class="card-title"><b>Tenants</b></h4><br>
    <p class="card-text"> details of all Tenants.</p><br>
    <a href="tenant.php" class="btn btn-primary">See Details</a></center><br>
  </div>
</div>
<br>

</div>

 

</div>

</div>
</body>
</html>
