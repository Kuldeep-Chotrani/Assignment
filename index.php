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
  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</head>
<body>
  <?php 
        
    if($_SESSION['userrole']==" ")
        
        {

?>
<?php 

include 'Connect_to_Database.php';
$query=" ";
$query="SELECT * FROM available_sample";

if ($stmt = mysqli_prepare($link, $query)) 
{
  /* execute statement */
  mysqli_stmt_execute($stmt);
  /* bind result variables */
  mysqli_stmt_bind_result($stmt,$id,$blood_group,$hospital_name,$quantity);
  /* fetch values */
  ?>
  <div class="navbar">
            <div class="logo">BloodBank Center</div>
      <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Available Samples</button>
  <div id="myDropdown" class="dropdown-content">
   <table class="table table-striped table-hover">
                <thead>
          <tr>
          <th>Sample Id</th>
          <th>Blood Group</th>
          <th>Hospital Name</th>
          <th>Quantity</th>
        </tr>
      </thead>
                 <?php  
      while(mysqli_stmt_fetch($stmt)) 
      { 
        ?>
                <tbody>
                    <tr>
      <td>

      </td>
            <td>1</td>
                        <td><?php  echo $id;  ?></td>
          <td><?php  echo $blood_group;  ?></td>
          <td><?php  echo $hospital_name;  ?></td>
          <td><?php echo $quantity; ?></td>
                        <td>
                            <a href="sent" class="RequestSample" data-toggle="modal">Request Sample</a>
                                      </td>
                    </tr>
                    <tr>
      <td>
<?php
      } 
      ?>      
                </tbody>
            </table>
            <?php 
                    mysqli_stmt_close($stmt);
                  } 
                  ?>
 
  </div>
</div>
         
</div>
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
          <div class="col-12 pt-3 text-center">
                Create your Hospital Account <a href="Hospital_Signup.php">here</a>
              </div>
              <div class="col-12 pt-3 text-center">
                Create your Receiver Account <a href="Receiver_Signup.php">here</a>
              </div>
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