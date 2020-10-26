<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="./style/login.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <div class="container">
  
    <div class="login-content">
    
      <form method="post" name="Receiver_Signup " action="Receiver_Signup_Results.php">
        <h2 class="title">Registration</h2>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Receiver Name</h5>
                    <input type="text" name="Receiver_FullName" value="" class="input" required>
                 </div>
                   </div>
                   <div class="input-div one">
                    <div class="i"> 
                         <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                         <h5>Receiver Email</h5>
                         <input name="Receiver_email" value="" type="email" id ="email" class="input" required>
                 </div>
              </div>
              <div class="input-div pass">
                <div class="i"> 
                     <i class="fas fa-phone"></i>
                </div>
                <div class="div">
                     <h5>Age</h5>
                    <input type="numeric" name="Receiver_Age" value="" pattern="[0-9]{2}" class ="input" required >
  
             </div>
          </div>
              <div class="input-div pass">
                <div class="i"> 
                     <i class="fas fa-phone"></i>
                </div>
                <div class="div">
                     <h5>Contact Number</h5>
                    <input type="numeric" name="Receiver_Contact" value="" id="phone"             pattern="[0-9]{10}"   class ="input" required >
  
             </div>
          </div>
        <div class="input-div pass">
                <div class="i"> 
                     <i class="fas fa-address-card"></i>
                </div>
                <div class="div">
                     <h5>Receiver Address</h5>
                    <input type="text" name="Receiver_Address" value="" id="address" class ="input" required >
  
             </div>
          </div>
        <div class="input-div pass">
        <div class="i"> 
                     <i class="fas fa-heart"></i>
                </div>
               
                <div class="div">
                   <h5 style = "color:#999;"> BloodGroup </h5>
                    <select style = "margin-left: 100px; margin-top: 15px; border-color: gray;" name="Receiver_Blood-Group">
                    <option value=" ">Select your Blood Group</option>
                   
          <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>

                    </select>
  
             </div>
          </div>
      
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password</h5>
                    <input name="Receiver_Password" value="" type="password"  id = "password" class="input" required>
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
              <input type="submit" name="submit_receiver_signup" value="Finish" class="btn" >
        
            </form>
      <span>Already have an account? Please <a style ="width:157px; font-size: 20px; text-decoration: underline; margin-right: 50px;" href="log_reg.html">Login</a>here</span>
  
          <span>Want to register with Hospital account? Please <a style ="width:157px; font-size: 20px; text-decoration: underline;" href="reg.html">Register</a>here</span>
     
   </div>
        <script src="./js/receive.js"></script>
    </div>
</body>
</html>

