<?php
include("connection.php");
$house_id = $_GET['id']; // get the house id from the URL parameter
$query = "SELECT *, owner_id FROM house WHERE id = $house_id"; // select the house data and owner_id from the database

$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$owner_id=$result['owner_id'];
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="fromfill.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
    
<link rel="stylesheet" type="text/css" href="viehome.css">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
    </head>
    <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">PG Accomdation System</a>
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

      <div class="row">
    <div class="col-md-12">
      <form  method="post">
        <h1> Fill the form </h1>
       <form method="POST" enctype="multipart/form-data"> 
        <fieldset>
          
          <legend><span class="number">1</span> Your Basic Info</legend>
        
          <label for="name">Name:</label>
          <input type="text" id="user_name" name="user_name">      
          
          <label for="age">Age:</label>
          <input type="number" id="user_age" name="user_age">
        
                   
        </fieldset>
        <fieldset>  
        
          <legend><span class="number">2</span> Identification</legend>
          
         <label for="bio">Photo</label>
          
         <input type="file" class="form-control-file" id="pic" name="pic" required>
        
       
        
         <label for="job">Identity Card:</label>
          <select id="job" name="user_job">
            <optgroup label="Web">
              <option value="frontend_developer">Adhar-card</option>
              <option value="php_developer">Pan-Card</option>
              <option value="python_developer">Passport</option>
              <option value="rails_developer">Ration Card</option>
            </optgroup>
            </select>
         <label for="name">Identity Card No:</label>
        <input type="text" id="us_id" name="user_id"> 
              
         </fieldset>
       
         <fieldset>  
        
          <legend><span class="number">3</span> House Details </legend>
          
         <label for="bio">Agreement</label>
         
         <a href="agreement.txt"> : Fill this Agreement</a><br>
         <label for="upload"> Upload Agreement</label>
      
          <input type="file" class="form-control-file" id="agree" name="agree" required>
        <br>
          <label for="name">No of Month</label>
        <input type="text" id="no_month" name="no_month">
          
         <label for="name">Starting Date</label>
         <div class="header-booking" id="booking-1" role="form" aria-label="Make a Reservation" >
  <form class="booking" name="booking" method="get" target="_blank" action="//ichotelsgroup.com/redirect">
      <div class="booking-input date">
          <input type="date" class="arrival" name="arrivaldate" id="arrivaldate" aria-label="Arrival Date">
          <i class="fa-regular fa-calendar-days"></i>
      </div>

      <input type="hidden" name="checkInDate" value="">
      <input type="hidden" name="checkOutDate" value="">
      <input type="hidden" name="checkInMonthYear" value="">
      <input type="hidden" name="checkOutMonthYear" value="">
      <input type="hidden" name="path" value="rates">
      <input type="hidden" name="brandCode" value="hi">
      <input type="hidden" name="numberOfAdults" value="1">
      <input type="hidden" name="numberOfChildren" value="0">
      <input type="hidden" name="numberOfRooms" value="1">
      <input type="hidden" name="rateCode" value="6CBARC">
      <input type="hidden" name="hotelCode" value="dislb">
      <input type="hidden" name="_PMID" value="99502222">

      

  </form>
</div>
    

   
            
          <label>Do you want tiffin service ? </label>
          <input type="checkbox" id="tiffin" value="tiffin" name="user_interest"><label class="light" for="tiffin">Tiffin</label><br>
         
         <br>
         <br> 
         <div class="tacbox">
         <input id="checkbox" type="checkbox" />
  <label for="checkbox"> I agree to these <a href="#" data-toggle="modal" data-target="#modal-lg1">Terms and Conditions</a>.</label>
</div>

<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
       
<div class="modal fade bd-example-modal-lg1" id="modal-lg1">
        <div class="modal-dialog modal-lg1">
          <div class="modal-content">
            <div class="modal-header">
              
            <div style="position: fixed; right: 20px;">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background-color: red; color: white; border: none; padding: 5px 10px; border-radius: 5px; font-size: 20px;">
        <span aria-hidden="true">&times;</span>
    </button>
</div>


            </div>
            <div class="modal-body p-0">
                  <!-- /.grid-wrapper -->
                  <h2 class="modal-title" style="text-align:center;">Terms and conditions</h2> 
                  
                 <b> Introduction</b><br>
Welcome to our website. By accessing and using our website, you agree to be bound by these terms and conditions. If you do not agree with any part of these terms and conditions, you must not use our website.
<br>
<b>Use of the Website </b><br>
You may use our website for lawful purposes only. You must not use our website in any way that violates any applicable laws or regulations.
<br>
<b>Intellectual Property</b><br>
All content on our website, including but not limited to text, graphics, logos, images, and software, is the property of our company or our licensors and is protected by intellectual property laws. You may not use any content on our website without our prior written consent.
<br>
<b>User Content</b><br>
You are solely responsible for any content you post or upload to our website. By posting or uploading content, you grant us a non-exclusive, royalty-free, perpetual, irrevocable, and fully sub-licensable right to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, and display such content throughout the world in any media.
<br>
<b>Links to Third-Party Websites</b><br>
Our website may contain links to third-party websites. We are not responsible for the content or practices of these websites, and you access them at your own risk.
<br>
<b>Disclaimer of Warranties</b>
Our website is provided on an "as is" and "as available" basis. We do not make any warranties, express or implied, regarding the website, including but not limited to warranties of merchantability, fitness for a particular purpose, and non-infringement.
<br>
<b>Limitation of Liability</b>
We will not be liable for any damages arising out of or in connection with the use of our website, including but not limited to direct, indirect, incidental, consequential, or punitive damages.
<br>
<b>Indemnification</b>
You agree to indemnify and hold us and our affiliates, officers, agents, and employees harmless from any claim or demand, including reasonable attorneys' fees, made by any third party due to or arising out of your use of our website, your violation of these terms and conditions, or your violation of any rights of another.



                </div>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



         </fieldset>
       
        
        <button type="submit" class="btn" data-toggle="modal" data-target="#modal-lg">Select Payment Method</button>
        <div class="modal fade bd-example-modal-lg" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Payment Method</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-0">
              <div class="container">
                  <div class="grid-wrapper grid-col-auto">
                    <label for="radio-card-1" class="radio-card">
                      <input type="radio" name="radio-card" id="radio-card-1" checked />
                      <div class="card-content-wrapper">
                        <span class="check-icon"></span>
                        <div class="card-content text-center">
                          <img src="https://static.seekingalpha.com/uploads/2017/6/28/44583886-14986589045573394_origin.png"
                            class="img-fluid" />
                          <h4>Visa</h4>
                        </div>
                      </div>
                    </label>
                    <!-- /.radio-card -->
                    <label for="radio-card-2" class="radio-card">
                      <input type="radio" name="radio-card" id="radio-card-2" />
                      <div class="card-content-wrapper">
                        <span class="check-icon"></span>
                        <div class="card-content text-center">
                          <img src="https://i0.wp.com/financebuddha.com/blog/wp-content/uploads/2016/12/23155635/UPI1.jpg?fit=1024%2C768&ssl=1"
                            class="img-fluid" />
                          <h4>UPI</h4>
                        </div>
                      </div>
                    </label>
                    <!-- /.radio-card -->
                    <label for="radio-card-3" class="radio-card">
                      <input type="radio" name="radio-card" id="radio-card-3" />
                      <div class="card-content-wrapper">
                        <span class="check-icon"></span>
                        <div class="card-content text-center">
                          <img src="https://logos-download.com/wp-content/uploads/2016/03/Mastercard_Logo_1990-2048x1223.png"
                            class="img-fluid" />
                          <h4>Credit card</h4>
                        </div>
                      </div>
                    </label>
                    <!-- /.radio-card -->
                    
                    <!-- /.radio-card -->
                    <label for="radio-card-5" class="radio-card">
                      <input type="radio" name="radio-card" id="radio-card-5" />
                      <div class="card-content-wrapper">
                        <span class="check-icon"></span>
                        <div class="card-content text-center">
                          <img src="https://cdn-icons-png.flaticon.com/512/2175/2175515.png"
                            class="img-fluid" />
                          <h4>Others</h4>
                        </div>
                      </div>
                    </label>
                    <!-- /.radio-card -->

                  </div>
                  <!-- /.grid-wrapper -->
                </div>
            </div>
            <div class="modal-footer justify-content-end p-0">
													<button type="button" class="btn-outline-light m-0" data-dismiss="modal" aria-label="Close">Cancel</button>
              <button type="submit" class="btn-outline-primary m-0" name="submit" data-dismiss="modal" aria-label="Close"  onclick="window.location.href='checkout.php?id=<?php echo $result['id'] ?>'">Apply</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

        
       </form>
        </div>
      </div>
      <?php
if(isset($_POST['submit'])){
  // Database connection
  include("connection.php");

  // Get form data
  $username= mysqli_real_escape_string($conn, $_POST['user_name']);
  $age= mysqli_real_escape_string($conn, $_POST['user_age']);
  $userid= mysqli_real_escape_string($conn, $_POST['user_id']);
  $no_month= mysqli_real_escape_string($conn, $_POST['no_month']);
 
  if(isset($_FILES["agree"]) && $_FILES["agree"]["error"] == 0) {
    $agreement = addslashes(file_get_contents($_FILES["agree"]["tmp_name"]));
 }
 
  $date = DateTime::createFromFormat('Y-m-d', $_POST['arrivaldate']);
  if (isset($_FILES["pic"])) {
    $pic = addslashes(file_get_contents($_FILES["pic"]["tmp_name"]));
}
if (isset($_FILES["pic"]) && isset($_FILES["pic"]["tmp_name"])) {
  $pic = addslashes(file_get_contents($_FILES["pic"]["tmp_name"]));
}


if (!$date) {
    // Invalid date format
    // Handle the error as necessary (e.g. display an error message to the user)
} else {
    // Sanitize the input against SQL injection using mysqli_real_escape_string
    $arrival = mysqli_real_escape_string($conn, $date->format('Y-m-d'));
}  

  // Insert data into house table
  $query = "INSERT INTO tenantpaid (firstname,age,id_photo,id_card,aggrement,no_month,calender,house_id,owner_id) VALUES ('$username', '$age', '$pic', '$userid','$agreement','$no_month','$arrival','$house_id','$owner_id')";
  $result = mysqli_query($conn, $query);

  if($result){
    echo "<script>alert('House details uploaded successfully');</script>";
   

  } else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
  }
}
?>  
    </body>
</html>
