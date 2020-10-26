<?php
session_start();
if($_SESSION['userrole']=="HOSPITAL")
           {
          ?>

          <!DOCTYPE html>
<html>
    <head>
        <title>Dashbord</title>
        <link rel="stylesheet" href="./style/dash.css">
        <script src="./js/dash.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="navbar">
            <div class="logo">BloodBank Center</div>
            <div class="user">
                <a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
            </div>

            <div class="sidenav">
                <div class="toggle"></div> 
                  <ul>
                    <li>
                        <a href="dash_hosp.php">
                            <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                
                        </a>
                    </li>
                    <li>
                        <a href="help.html">
                            <span class="icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                
                        </a>
                    </li>

                    <li>
                        <a id="logOut" href="Logout.php">
                            <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
               
                        </a>
                    </li>
                  </ul>  
            </div>
        </div>
        <div class="content">
            <div class="con" id="1">
                <h1>Requests</h1>
                <img class="bld" src="img/blood2.png" style ="height: 215px; width:300px;"/>

              <br>
              <a href="View_Requests.php"> <button class="btn">View Requests</button></a>
            </div>
            <div class="con" id="2">
                <h1>View Blood Samples</h1>
                <img class="dona" src="img/blood3.jpg"/>
                <a href="Available_Sample.php"><button class="btn">Add</button></a>
            </div>
            </div>
        </div>
    </body>
</html>

          <?php
          }
          ?>
