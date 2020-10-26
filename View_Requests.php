<?php
session_start();
?>
<?php 
include 'Connect_to_Database.php';
$hospital_name=$_SESSION['hospital_name'];
$query1="SELECT req.request_id,req.user_email,sample.blood_group 
	   FROM view_requests as req , available_sample as sample 
	   WHERE req.request_id=sample.id AND sample.hospital_name='$hospital_name'";

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
<div class="container">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="row">

        <div class="col-sm-6">
          <h2> <b>Requests</b></h2>
        </div>
        <div class="col-sm-6">
          <h4>Blood Sample Requests For <?php echo $hospital_name;?></h4>   
        </div>
      </div>
    </div>



<?php

if ($stmt1 = mysqli_prepare($link, $query1)) 
	{
						
						    mysqli_stmt_execute($stmt1);
						 
						     mysqli_stmt_bind_result($stmt1, $request_id,$user_email,$blood_group);

					     ?>
						    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>
           <span class="custom-checkbox">
            <input type="checkbox" id="selectAll">
            <label for="selectAll"></label>
          </span>
        </th>
        <th> Request Id</th>
        <th>Requested Blood Group</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
						 
						<?php
							     while (mysqli_stmt_fetch($stmt1)) {
						?>
						<tr>
        <td>
         <span class="custom-checkbox">
          <input type="checkbox" id="checkbox1" name="options[]" value="1">
          <label for="checkbox1"></label>
        </span>
      </td>
      <td><?php echo $request_id; ?></td>
      <td><?php echo $blood_group; ?></td>
      <td><?php echo $user_email; ?></td>
    </tr>
							 
							     		

					    <?php
							     }
					    ?>
					    	 </tbody>
</table>
						   <?php
		mysqli_stmt_close($stmt1);

}

else
{
	echo "error in view_requests";
	#header("refresh:2,url=index.php");
}

?>
</body>
</html>    

