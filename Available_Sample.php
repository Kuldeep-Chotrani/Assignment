<?php 
session_start();

include 'Connect_to_Database.php';

    $query=" ";
    $hospital_name=" ";
    if($_SESSION['userrole']==="RECEIVER")
    {
      $query="SELECT * FROM available_sample"; 
    }

    if($_SESSION['userrole']==="HOSPITAL")
    {
      $hospital_name=$_SESSION['hospital_name'];
      $query="SELECT * FROM available_sample WHERE hospital_name='$hospital_name'";
    }
    else
    {
      $query="SELECT * FROM available_sample"; 
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./style/sample.css">
<script type="text/javascript">
$(document).ready(function()
{
 // Activate tooltip
 $('[data-toggle="tooltip"]').tooltip();
 
 // Select/Deselect checkboxes
 var checkbox = $('table tbody input[type="checkbox"]');
 $("#selectAll").click(function()
 {
  if(this.checked){
   checkbox.each(function()
   {
    this.checked = true;                        
   });
  }
  else
  {
   checkbox.each(function()
   {
    this.checked = false;                        
   });
  } 
 });
 checkbox.click(function()
 {
  if(!this.checked)
  {
   $("#selectAll").prop("checked", false);
  }
 });
});
</script>
</head>
<body>
 <div class="sidenav">
                <div class="toggle"></div> 
                  <ul>
                    <li>
                        <a href="dashHospital.html">
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
    
  
        <?php
          if ($stmt = mysqli_prepare($link, $query)) 
          {
            /* execute statement */
            mysqli_stmt_execute($stmt);
            /* bind result variables */
            mysqli_stmt_bind_result($stmt,$id,$blood_group,$hospital_name);
            /* fetch values */
          ?>


        <?php
        if ($_SESSION['userrole']===" ") {
                  ?>
                  <h2>Guest!! Kindly login before posting a request of your blood sample</h2>
                <?php
                }
        ?>
        <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                  
                    <div class="col-sm-6">
      <h2>Blood <b>Samples</b></h2>
     </div>
     <div class="col-sm-6">
      <a href="#addHospital" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Sample</span></a>
      <a href="#delete" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>      
     </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
      <th>
       <span class="custom-checkbox">
        <input type="checkbox" id="selectAll">
        <label for="selectAll"></label>
       </span>
      </th>
            <th>Sample Id</th>
                        <th>Blood Group</th>
                        <th>Hospital Name</th>
        
        
      
                <?php 
                if ($_SESSION['userrole']==="HOSPITAL") {
                  ?>
                <?php
                }
                else{
                ?>
                <td>Operation</td>
                <?php
                }
                ?>
              </tr>
                </thead>



            <?php  
              while(mysqli_stmt_fetch($stmt)) 
              { 
              ?>
              <tbody>
                    <tr>
      <td>
       <span class="custom-checkbox">
        <input type="checkbox" id="checkbox1" name="options[]" value="1">
        <label for="checkbox1"></label>
       </span>
      </td>
                  <td><?php  echo $id;  ?></td>
                      <td><?php  echo $blood_group;  ?></td>
                        <td><?php  echo $hospital_name;  ?></td>
                    <?php 
                    if($_SESSION['userrole']==="HOSPITAL")
                    {
                    ?>
                    <?php
                    } 
                    if($_SESSION['userrole']==="RECEIVER")
                     {
                        if($_SESSION['receiver_blood_group']===$blood_group)
                        {
                        ?>
                         <td>
                          <a href="Request_Sample.php?Blood_Sample_Id=<?php echo $id; ?>">Request_Sample</a>
                         </td>
<?php 
                        }
                        else
                        {
                        ?>
                        <?php
                        }
                    }  
                    if($_SESSION['userrole']===" ")
                     {
                    ?>
                    <td><a href="Available_Sample.php">Request_Sample</a></td>
                    <?php 
                     }
                     ?> 
                </tr>
              <?php
              } 
        ?>

<!-- 
                        <td>
                            <a href="#editHospital" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#delete" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td> -->
                    </tr>



                
                
                      
                      
                        
                        
                      
            </tbody>
            </table>

      <?php 
      mysqli_stmt_close($stmt);
      } 
    ?>
      
<div id="addHospital" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form method="post" name="Add_Blood_Info" action="Add_Blood_Info.php" >
     <div class="modal-header">      
      <h4 class="modal-title">Add Sample</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     

      <div class="form-group">
       <label>BloodGroup</label>
       <select id="id" name="add_info">
                    <option value=" ">select Blood Group</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="B+">B+</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
              </select>
      </div>

    <!--   <div class="form-group">
       <label>Amount</label>
       <textarea class="form-control" required></textarea>
      </div>     -->
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" name="add_info_submit" class="btn btn-success" value="Add">
     </div>
    </form>
   </div>
  </div>
 </div>
</body>
</html>