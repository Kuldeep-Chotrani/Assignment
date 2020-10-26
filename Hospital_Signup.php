<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>registration Form</title>
    <link rel="stylesheet" type="text/css" href="./style/login.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
    <div class="login-content">
      <form method="post" name="hospital_signup" action="Hospital_Signup_Results.php">
        <h2 class="title">Registration</h2>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Hospital name</h5>
                    <input type="text" class="input" name="hospital_name" value="" required>
                 </div>
                   </div>
                   <div class="input-div one">
                    <div class="i"> 
                         <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                         <h5>Hospital Email</h5>
                         <input type="text" name="hospital_email" value="" id ="email" class="input" required>
                 </div>
              </div>
              <div class="input-div pass">
                <div class="i"> 
                     <i class="fas fa-phone"></i>
                </div>
                <div class="div">
                     <h5>Contact Number</h5>
                    <input type="numeric" name="hospital_contact" value="" id="phone" pattern="[0-9]{10}" class ="input" required >
  
             </div>
          </div>
        <div class="input-div pass">
                <div class="i"> 
                     <i class="fas fa-address-card"></i>
                </div>
                <div class="div">
                     <h5>Hospital Address</h5>
                    <input type="text" name="hospital_address" value="" id="address" class ="input" required >
  
             </div>
          </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password</h5>
                    <input type="password" name="hospital_password" value="" id = "password" class="input" required>
                 </div>
              </div>
        <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5> Confirm Password</h5>
                    <input  type ="Password" id = "confirm_password" class="input" required>
                 </div>
              </div>
              <input type="submit" name="submit_hospital_signup" value="Finish" class="btn">
            </form>
      <span>Already have an account? Please <a style ="width:157px; font-size: 20px; text-decoration: underline" href="index.php">Login</a>here</span>
        
        </div>
        <script src="./js/hospital.js"></script>
    </div>
</body>
</html>