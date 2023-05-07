<!DOCTYPE html>
<html lang="en">
<head>
  <title>House Rental Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
function logout() {
    alert('You have logged out sucessfully');
    window.location.href = 'index.html';
}
</script>
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
      <a class="nav-link" href="#" onclick="logout()">
    Sign Out
</a>



      </li>
    </ul>
  </div>  
</nav>
<div class="container-fluid mt-3">
  <div class="row">
  <div class="col-md-12">
  <form class="form-inline mb-3" method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Enter location" name="location">
    <div class="input-group-append">
      <span class="input-group-text">and</span>
    </div>
    <input type="text" class="form-control" placeholder="Budget Range" name="Price">
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit">Search</button>
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