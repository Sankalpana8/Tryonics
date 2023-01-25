<?php
try{
    //connect to db
	$con= mysqli_connect("localhost","root","");
	mysqli_select_db($con,"tryonicsdb");
}	
catch(Exception $ex)
{
	echo 'ERROR IN DB CONNECTION';
}
//check variable is set & then insert data to tbl users
if(isset($_POST['name']))
{
	$name  = $_POST['name'];
	$about = $_POST['about'];
	$dob   = $_POST['dob'];    
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$country = $_POST['country'];
	
	$sql= "INSERT INTO users (FullName , About , Birthday, Mobile , Email, Country ) VALUES('$name','$about','$dob','$phone','$email','$country')";
	$ret= mysqli_query($con,$sql);
	if($ret==1)
	{	//Successful
		echo '<script type="text/javascript">';
  	    echo 'setTimeout(function () { swal("User Register Successfully!", "Success!", "success")';
        echo '}, 5);</script>';		
	}
	else
	{
		echo '<script type="text/javascript">';
  	    echo 'setTimeout(function () { swal("Cannot Add User Details!", "Please Check again!", "warning")';
        echo '}, 5);</script>';
	}
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Tryonics Assignment</title>
    <!-- JavaScript for validations -->
    <script src="js/validationsUser.js" type="text/javascript">
    </script>
    <!--sweetalert -->
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body background="img/shape.jpg">
<div><br><br>
<!-- User data insert form -->
<form method="post" action="RgUser.php" class="form-horizontal" id="f1">		
        
        <h1 style="margin-left:40px;">Personal Information</h1>
         <p style="margin-left:40px;">Please fill in your details below.</p>        
        <hr><br>
    <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-6">
        	<input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" autofocus required>
     	 </div>
    </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">About You</label>
        <div class="col-sm-6">
            <textarea type="text" rows="5" name="about" class="form-control" id="about" placeholder="Write About You" autofocus required></textarea>
        </div>
    </div>    
    <div class="form-group">
        <label class="col-sm-2 control-label">Birthday</label>
        <div class="col-sm-4">
            <input type="date" name="dob" class="form-control" id="dob" min="1980-01-01" max="2010-01-01" autofocus required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Mobile Number</label>
        <div class="col-sm-4">
            <input type="tel" name="phone" class="form-control" id="phone" placeholder=" Enter Mobile Number" pattern="^\d{10}$" autofocus required>
        </div>
    </div>    
    <div class="form-group">
        <label class="col-sm-2 control-label">Email Address</label>
        <div class="col-sm-6">
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter User Email Address" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" autofocus required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Country</label>
        <div class="col-sm-4">
            <select class="form-control" name="country" id="country" autofocus required>
                <option style="color:#000000" value="s">Select Your Country</option>                                
                <option style="color:#000000" value="Australia">Australia </option>
                <option style="color:#000000" value="Brazil">Brazil </option>
                <option style="color:#000000" value="Canada">Canada </option>
                <option style="color:#000000" value="India">India </option>
                <option style="color:#000000" value="Sri_Lanka">Sri Lanka </option>
                <option style="color:#000000" value="Swaziland">Swaziland </option>
                <option style="color:#000000" value="UK">United Kingdom </option>
                <option style="color:#000000" value="USA">United States</option>
      	    </select> 
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="create" value="Submit" id="create" class="btn btn-primary" onClick="validations()">
         <button type="button" class="btn btn-default"><a href="RgUser.php">Clear</a></button>  
        </div>
    </div>
</form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
