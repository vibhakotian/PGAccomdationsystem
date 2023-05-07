<!DOCTYPE html>
<html lang="en">
<head>
  <title>House Rental Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid mt-3">
  <div class="row">
  <div class="col-md-12">
  <form class="form-inline mb-3" method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="input-group">
    
    <div class="input-group-append"><h1>Available Houses</h1>
      
    </div>
  
    <div class="input-group-append">
      
    </div>
  </div>
</form>

  
</div>

<?php
// Database connection
include("connection.php");

if(isset($_GET['location'])&& isset($_GET['Price'])){
  $location = mysqli_real_escape_string($conn, $_GET['location']);
  $Price = mysqli_real_escape_string($conn, $_GET['Price']);
  $query="SELECT * FROM house WHERE city LIKE '%$location%' OR state LIKE '%$location%' OR country LIKE '%$location%'";
} 
if(isset($_GET['location']) && !empty($_GET['location'])) {
  // code for when location is present
  $location = mysqli_real_escape_string($conn, $_GET['location']);
  $query = "SELECT * FROM house WHERE city LIKE '%$location%' OR state LIKE '%$location%' OR country LIKE '%$location%'";
} 

if(isset($_GET['Price']) && !empty($_GET['Price'])) {
  // code for when price is present
  $Price = mysqli_real_escape_string($conn, $_GET['Price']);
  $query = "SELECT * FROM house WHERE rate LIKE '%$Price%'";
}

if(!isset($_GET['location']) && !isset($_GET['Price'])) {
  // code for when neither location nor price is present
  $query = "SELECT * FROM house";
}

$data=mysqli_query($conn,$query);

while($result=mysqli_fetch_assoc($data))
{
  echo '<div class="col-md-4 mb-3">
          <div class="card">
            <img class="card-img-top" src="data:pics/jpeg;base64,'.base64_encode( $result['pics'] ).'">
            <div class="card-body">
        
              <p class="card-text"><strong>No. of rooms:</strong> '.$result['no_of_rooms'].'</p>
              <p class="card-text"><strong>Address:</strong> '.$result['address'].', '.$result['city'].', '.$result['state'].', '.$result['country'].'</p>
              <p class="card-text"><strong>Rate:</strong> '.$result['rate'].'</p>
              <a href="viehome.php?id='.$result['id'].'" class="btn btn-primary">View Details</a>
            </div>
          </div>
        </div>';
}
?>
  </div>
</div>
</body>
</html>