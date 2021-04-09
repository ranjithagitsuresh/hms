<?php
include ("connection.php");


if(isset($_POST['create'])){
	$firstname=$_POST['firstname'];
	$surname=$_POST['surname'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$phoneno=$_POST['phoneno'];
	$country=$_POST['country'];
	$password=$_POST['password'];
	$confirm=$_POST['conf_password'];

	$error=array();


	if(empty($firstname)){
		$error['create']="Enter FirstName";
	}
	else if(empty($surname)){
		$error['create']="Enter Surname";
	}
	else if(empty($username)){
		$error['create']="Enter Username";
	}
	else if(empty($email)){
		$error['create']="Enter Email";
	}
	else if(empty($gender)){
		$error['create']="Enter Gender";
	}
	else if(empty($phoneno)){
		$error['create']="Enter Phone Number";
	}
	else if(empty($country)){
		$error['create']="Enter Country";
	}
	else if(empty($password)){
		$error['create']="Enter Password";
	}
	else if($confirm!=$password){
		$error['create']="Both Password do not match";
	}
	
	if(count($error) == 0){

		$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
    $username = $_POST['username'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	
	$phoneno = $_POST['phoneno'];
	$country = $_POST['country'];
	$password = $_POST['password'];

  	$sql_u = "SELECT * FROM patient WHERE username='$username'";
  	$sql_e = "SELECT * FROM patient WHERE email='$email'";
  	$sql_p = "SELECT * FROM patient WHERE phoneno='$phoneno'";
  	$res_u = mysqli_query($connect, $sql_u);
  	$res_e = mysqli_query($connect, $sql_e);
  	$res_p = mysqli_query($connect, $sql_p);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error= "Sorry... username already taken"; 	
       echo "<script type='text/javascript'>alert('$name_error');</script>";
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken";
  	  echo "<script type='text/javascript'>alert('$email_error');</script>"; 	
  	}else if(mysqli_num_rows($res_p) > 0){
  	  $phone_error = "Sorry... phone number already taken";
  	  echo "<script type='text/javascript'>alert('$phone_error');</script>"; 	
  	}
  	else{

		$query="INSERT INTO patient( firstname, surname, username,email,gender,phoneno,country, password, profile) VALUES('$firstname','$surname','$username','$email','$gender','$phoneno','$country','$password','3.jpeg')";

		$result=mysqli_query($connect,$query);
		if($result){
			echo "<script>alert('You have successfully applied')</script>";
			header("Location: patientlogin.php");
		}
		else{
			echo "<script>alert('Failed')</script>";

		}
	}

	}
	
	
	
	
	
}

if(isset($error['create'])){
	$s=$error['create'];
	$show="<h5 class='text-center alert alert-danger'>$s</h5>";
}
else{
	$show ="";


}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
</head>
<body style="background-image: url(27.jpg);background-repeat: no-repeat;background-size: cover;">

	<?php

     include("header.php");


	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-6 my-3 jumbotron">
					<h5 class="text-center">Create Account</h5>
					<div>
						<?php echo $show; ?> 
						
					</div>
					<form method="post">
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="firstname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php
                              if(isset($_POST['firstname'])) echo $_POST['firstname'];

							?>"
						</div>
						<div class="form-group">
							<label>Surname</label>
							<input type="text" name="surname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php
                              if(isset($_POST['surname'])) echo $_POST['surname'];

							?>"
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php
                              if(isset($_POST['username'])) echo $_POST['username'];

							?>"
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email" value="<?php
                              if(isset($_POST['email'])) echo $_POST['email'];

							?>"
						</div>
						<div class="form-group">
							<label>SELECT GENDER</label>
							<select name="gender" class="form-control">
								<option value="">Select Gender</option>
									<option value="Male">MALE</option>
									
								<option value="Female">FEMALE</ option>
							</select>
						</div>
				<div class="form-group">
					<label>PHONE NUMBER</label>
					<input type="number" name="phoneno" class="form-control" autocomplete="off" placeholder="Enter Phone Number"
					value="<?php
                              if(isset($_POST['phoneno'])) echo $_POST['phoneno'];

							?>"
				</div>
				<div class="form-group">
							<label>SELECT COUNTRY</label>
							<select name="country" class="form-control">
								<option value="">Select Country</option>
									<option value="India">India</option>
									
								<option value="Russia">Russia</option>
									<option value="Ghana">Ghana</option>
							</select>
						</div>
           
						<div class="form-group">
							<label>PASSWORD</label>
							<input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div>
						<div class="form-group">
							<label>CONFIRM PASSWORD</label>
							<input type="password" name="conf_password" class="form-control" autocomplete="off" placeholder="Confirm Password">
						</div>
						<input type="submit" name="create" value="Create Now" class="btn btn-info">
						<br><br>
						<p>Already have an account?<a href="patientlogin.php"> Click here.</a></p>
                 </form>
             </div>
				<div class="col-md-3">
					
				</div>
			</div>
		</div>
	</div>

</body>
</html>