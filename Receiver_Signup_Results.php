<?php
session_start();

if(isset($_REQUEST['submit_receiver_signup']))
    {
               $conn= mysqli_connect('localhost', 'root', 'admin') or die(mysqli_connect_error());
               mysqli_select_db('BloodBank') or die(mysqli_error());

               $Receiver_email     		= $_POST["Receiver_email"];
               $Receiver_FullName       = $_POST["Receiver_FullName"];
               $Receiver_Age   			= $_POST["Receiver_Age"];
               $Receiver_Contact   		= $_POST["Receiver_Contact"];
               $Receiver_Address 	    = $_POST["Receiver_Address"];
               $Receiver_Blood_Group    = $_POST['Receiver_Blood_Group'];
               $Receiver_Password 		= $_POST["Receiver_Password"];

               $Query1=mysqli_query($conn, "SELECT * FROM bb_user_info WHERE User_Email='$Receiver_email'");
               $rows=mysqli_fetch_array($Query1);
                if(sizeof($rows)==1)
                 {
                   $Query2=mysqli_query($conn, "INSERT INTO receiver_table (User_Email, Full_Name, Age, Contact, Address, BG) 
                              VALUES('$Receiver_email','$Receiver_FullName',$Receiver_Age ,$Receiver_Contact,
                              '$Receiver_Address','$Receiver_Blood_Group')");

                            if($Query2)
                            {    

                              $Query3=mysqli_query($conn, "INSERT INTO bb_user_info(User_Email, User_Password, User_Role) VALUES 
                                ('$Receiver_email','$Receiver_Password','RECEIVER') ") or die(mysqli_error());

                                      if($Query3)
                                        {
                                           echo "<script type='text/javascript'>alert('Successfully Registered!!')</script>";
                                           header( "refresh:0; url=index.php" );
                                        }
                                        else{
                                          echo "<script type='text/javascript'>alert('Failed Registration!!')</script>";
                                          header("refresh:0,url=Receiver_Signup.php"); 

                                        }

                            }
                          else{
                                echo "<script type='text/javascript'>alert('Incomplete or Incorrect Form Fields,Please Fill it again!!')</script>";

                               header("refresh:0,url=Receiver_Signup.php");  

                            }
                   }
                   else
                   {
                    echo "<script type='text/javascript'>alert('Email id exists. Kindly login or Enter unique id which has not been used')</script>";
                       header( "refresh:0; url=Receiver_Signup.php" );
                   }
          
    }


?>