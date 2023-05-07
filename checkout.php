<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
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

<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="POST" enctype="multipart/form-data">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Full name">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="abc@gmail.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="Address">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="City">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="State">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="Zip-code">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Name">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Expiry Month">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="Expiry Year">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="CVV">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" name="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  <?php

   // get the tenant id from the URL parameter
  
if(isset($_POST['submit'])){
  // Database connection
  include("connection.php");
  $tt_id =  $_GET['id'];
  // Get form data
  $firstname= mysqli_real_escape_string($conn, $_POST['firstname']);
  $email= mysqli_real_escape_string($conn, $_POST['email']);
  $address= mysqli_real_escape_string($conn, $_POST['address']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  

  // Insert data into house table
  $query = "UPDATE tenantpaid SET email='$email', address='$address', city='$city' WHERE house_id=$tt_id";

  $result = mysqli_query($conn, $query);

  if($result){
    echo "<script>alert('House details uploaded successfully');</script>";
    echo "<script>window.location.href='completedpayment.php';</script>";
  } else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
  }
}

?>

  <?php
// Include the database connection file
require_once("connection.php");

// Check if the 'id' parameter is set and is a valid integer
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    // Sanitize the 'id' parameter to prevent SQL injection attacks
    $house_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Construct the SQL query to select the house data from the database
    $query = "SELECT * FROM house WHERE id = $house_id";

    // Execute the query and check for errors
    if ($result = mysqli_query($conn, $query)) {
        // Check if the query returned any results
        if (mysqli_num_rows($result) > 0) {
            // Fetch the result as an associative array
            $house_data = mysqli_fetch_assoc($result);
            $total_price = $house_data['rate']+$house_data['deposit'];
        } else {
            // Handle the case where the query returned no results
            die("No house found with id $house_id");
        }
    } else {
        // Handle the case where the query failed
        die("Query failed: " . mysqli_error($conn));
    }
} else {
    // Handle the case where the 'id' parameter is missing or invalid
    die("Invalid house id");
}

echo '<div class="col-25">
<div class="container">
        <h4>Bill <span class="price" style="color:black"><b></b></span></h4>
        <p><a href="#">House Rent </a> <span class="price">'.$house_data['rate'].'</span></p>
        <p><a href="#">Tiffin Rent</a> <span class="price">00</span></p>
        <p><a href="#">Deposit</a> <span class="price">'.$house_data['deposit'].'</span></p>
        <hr>
        
        <p>Total <span class="price" style="color:black"><b>'. $total_price .'</b></span></p>
    </div>
</div>';
?>
<script>
  const form = document.getElementById('payment-form');
  const submitButton = document.getElementById('submit-payment');
  form.addEventListener('submit', function(event)) {
    event.preventDefault();
    const cardNumber = document.getElementById('cardnumber').value;
    const cardExpiration = document.getElementById('expmonth').value;
    const cardExpiration1 = document.getElementById('expyear').value;
    const cardCVV = document.getElementById('cvv').value;
    if (cardNumber.length < 16) {
      alert('Please enter a valid card number.');
      return;
    }
    if (cardExpiration>12 ) {
      alert('Please enter a valid expiration date.');
      return;
    }
    if (cardExpiration1.length!=4 ) {
      alert('Please enter a valid expiration date.');
      return;
    }
    if (cardCVV.length < 3) {
      alert('Please enter a valid CVV number.');
      return;
    }
    submitButton.disabled = true;submitButton.innerText = 'Processing Payment...';};
</script>

</body>
</html>
