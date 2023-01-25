<?php
  	$UserID="";
	$name  = "";
	$about = "";
	$dob   = "";    
	$phone = "";
	$email = "";
	$country = "";
try{
	//connect to db
	$con= mysqli_connect("localhost","root","");
	mysqli_select_db($con,"tryonicsdb");
}	
catch(Exception $ex)
{
	echo 'ERROR IN DB CONNECTION';
}
$sqlIT="SELECT UserID FROM Users";
$resultIT = mysqli_query($con,$sqlIT);

$color="black";
//search
	if(isset($_POST['btn_Search']))
	{		
		$UserID=$_POST['UserID'];
		$name  = $_POST['name'];
		$about = $_POST['about'];
		$dob   = $_POST['dob'];    
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$country = $_POST['country'];

		//select relevant data for selected user id
		$Ssql="SELECT `FullName`, `About`, `Birthday`, `Mobile`, `Email`, `Country` FROM `Users` WHERE `UserID` = '".$UserID."' LIMIT 1";
			$sResult=mysqli_query($con,$Ssql);
				if(mysqli_num_rows($sResult)>0)
				{
					while($row=mysqli_fetch_array($sResult))
					{
						//set db values to variables
						$name=$row["FullName"];
						$about=$row["About"];
						$dob=$row["Birthday"];
						$phone=$row["Mobile"];
						$email=$row["Email"];
						$country=$row["Country"];				
					}
				}
				
			mysqli_free_result($sResult);
	}
//edit the data of selected user id 			
	if(isset($_POST['btn_Update']))
	{	
		$UserID=$_POST['UserID'];
		$name  = $_POST['name'];
		$about = $_POST['about'];
		$dob   = $_POST['dob'];    
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$country = $_POST['country'];

		if(!$_POST['name']=="")
		{
			$Ssql="UPDATE `Users` SET `FullName`='$name',`About`='$about',`Birthday`='$dob',`Mobile`='$phone',`Email`='$email',`Country`='$country' WHERE `UserID` = '".$UserID."'";
			$sResult=mysqli_query($con,$Ssql);
			if($sResult)
			{
				echo '<script type="text/javascript">';
  				echo 'setTimeout(function () { swal("Data Updated successfully!","success!","success");';
  				echo '}, 5);</script>';	}
			else
			{
				echo '<script type="text/javascript">';
  				echo 'setTimeout(function () { swal("Something wrong!!","Check again!","warning");';
  				echo '}, 5);</script>';	}
		}
		else
		{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Something wrong!!","Please Enter Customer Id and Search!!","warning");';
  			echo '}, 5);</script>';}
	}
//delete the data of selected user id	
	if(isset($_POST['btn_Delete']))
	{	
		$UserID=$_POST['UserID'];
		$name  = $_POST['name'];
		$about = $_POST['about'];
		$dob   = $_POST['dob'];    
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$country = $_POST['country'];

		if(!$_POST['name']=="")
		{
			$Ssql="DELETE FROM `Users` WHERE `UserID` = '".$UserID."'";
			$sResult=mysqli_query($con,$Ssql);
			if($sResult)
			{
				echo '<script type="text/javascript">';
  						echo 'setTimeout(function () { swal({';
  						echo 'title: "Are you sure?",';
  						echo 'text: "Once deleted, you will not be able to recover this User Data!",';
  						echo 'icon: "warning",';
  						echo 'dangerMode: true,';
 						echo '})';
  						echo '.then((willDelete) => {';
  						echo ' if (willDelete) {';
  						echo 'swal("Data Deleted successfully!", {';
  						echo ' icon: "success",';
   						echo ' });}});';
  						echo '}, 5);</script>';		}
			else
			{
				echo '<script type="text/javascript">';
  				echo 'setTimeout(function () { swal("Something wrong!!","Check again!","warning");';
  				echo '}, 5);</script>';	}
		}
		else
		{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Something wrong!!","Please Enter User Name and Search!!","warning");';
  			echo '}, 5);</script>';	}
	}
mysqli_close($con);
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Tryonics Assignment</title>
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body background="img/shape.jpg">
<div><br><br>
<!--edit user data form-->
<form method="post" action="" class="form-horizontal">
		<h1 style="margin-left:40px;">Edit Personal Information </h1>
         <p style="margin-left:40px;">Update or Delete User Information by using User Id</p>
		 <hr><br>
    <div class="form-group">
        <label class="col-sm-2 control-label">User Id</label>
        <div class="col-sm-4">
        	<table><tr><!--load userid from db to dropdown-->
            <td><select name="UserID" id="UserID" class="form-control">
        		<option style="color:#000000" value="<?Php echo $UserID;?>">User Id <?Php echo $UserID;?></option> 
                     <?php 
					 	while($row=$resultIT-> fetch_assoc())
						{
							$UserID=$row['UserID'];
							echo "<option value=$UserID style='color:$color;'>$UserID</option>";	
							}
					 ?>                
           </select></td>
            <td>&nbsp;&nbsp; </td>
            <td><input type="submit" name="btn_Search" value="Search" id="btn_Search" class="btn btn-info"></td>
            </tr></table>
        </div>
    </div>   <!--after select userid, load relevant user data from db to form-->
    <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-6">
        	<input type="text" name="name" class="form-control" id="name" value="<?php echo $name;?>">
     	 </div>
    </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">About User</label>
        <div class="col-sm-6">
            <input type="text" name="about" class="form-control" id="about" value="<?php echo $about;?>">
        </div>
    </div>    
    <div class="form-group">
        <label class="col-sm-2 control-label">Birthday</label>
        <div class="col-sm-4">
            <input type="date" name="dob" class="form-control" id="dob" min="1980-01-01" max="2010-01-01" value="<?Php echo $dob;?>">
        </div>
    </div>
	<div class="form-group">
        <label class="col-sm-2 control-label">Email Address</label>
        <div class="col-sm-6">
            <input name="email" class="form-control" id="email" value="<?Php echo $email;?>" type="text" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Mobile Number</label>
        <div class="col-sm-4">
            <input type="tel" name="phone" class="form-control" id="phone" value="<?Php echo $phone;?>" pattern="^\d{10}$">
        </div>
    </div>
	<div class="form-group">
        <label class="col-sm-2 control-label">Country</label>
        <div class="col-sm-4">
        <select name="country" id="country" class="form-control">
        		<option style="color:#000000" value="<?Php echo $country;?>">Country <?Php echo $country;?></option>                                              
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
            <button type="submit" name="btn_Update" value="Update" id="btn_Update" class="btn btn-primary">Update</button>&nbsp;
         <button type="submit" name="btn_Delete" value="Delete" id="btn_Delete" class="btn btn-warning">Delete</button>&nbsp;
         <button type="button" class="btn btn-default"><a href="EditUser.php">Refresh</a></button>  
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