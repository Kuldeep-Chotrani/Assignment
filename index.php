<?php 
session_start(); 
if(isset($_SESSION['userrole'])===false){
  $_SESSION['userrole']=" ";
  $_SESSION['useremail']=" ";
  $_SESSION['hospital_name']=" ";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="./style/login.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <?php 
        
    if($_SESSION['userrole']==" ")
        
        {

?>
  <div class="container">
    <div class="login-content">
      <form method="post" name="login_form" action="Login.php">
        <h2 class="title">Login</h2>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Username</h5>
                    <input type="text" name="login_email" value="" class="input">
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password</h5>
                    <input type="password" name="login_password" value="" class="input">
                 </div>
              </div>
              <input type="submit" name="login_submit" value="Sign In" class="btn"> 
            <a href="Hospital_Signup.php">Register as Hospital</a>
            <a href="Receiver_Signup.php" >Register as Reciever</a>       
            </form>
          
        </div>
        <script src="log_reg.js"></script>
    </div>
    <?php 
         } 

         else
         {
         
         if($_SESSION['userrole']=="HOSPITAL")
      {

                header("Location:dash_hosp.php");
  
      }
      if($_SESSION['userrole']=="RECEIVER")
      {

                header("Location:Dash_Receiver.php");

      }
          } ?>
</body>
</html>