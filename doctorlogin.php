<?php

session_start();

include("connection.php");


if(isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];


	$error = array();
   
   $q="SELECT * FROM doctors WHERE username ='$username' AND password='$password' ";
   $qq=mysqli_query($connect,$q);
   $row=mysqli_fetch_array($qq);

	if(empty($username)){
		$error['doctor']="Enter Username";
	}else if(empty($password)){
		$error['doctor']="Enter Password";
	}else if($row['status']=="Pending"){
		$error['doctor']="Please wait for the admin to confirm";
	}else if ($row['status']=="Rejected") {
		$error['doctor']="Try again later";
		# code...
	}

	if(count($error)==0){
		$query="SELECT * FROM doctors WHERE username='$username' AND password='$password'";
		$res=mysqli_query($connect,$query);


		if(mysqli_num_rows($res)==1){
			echo "<script>alert('Done')</script>";
			$_SESSION['doctor']=$username;
			header("Location:doctor_index.php");
			//header("Location: ")
		}else{
			echo "<script>alert('Failed')</script>";
		}
	}
}
if(isset($error['login'])){
	$l=$error['login'];
	$show="<h5 class='text-center alert alert-danger'>$l</h5>";
}else{
	$show="";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>DOCTOR LOGIN PAGE</title>
</head>
<body style="background-image: url(27.jpg);background-repeat: no-repeat;background-size: cover;" >
	<?php
      include("header.php");
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
					<div class="col-md-6 jumbotron my-3">
						
						<h5 class="text-center my-2">
						DOCTORS LOGIN</h5>
						<div>
							<?php
						if(isset($error['doctor'])){
							$sh  =$error['doctor'];
							$show="<h4 class='alert alert-danger'>$sh</h4>";
						}
						else{
							$show="";
						}
						echo $show;
						?>
						</div>
						<form method="post" class="my-2">
							<div class="form-group">
								<label>USERNAME</label>
								<input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter Username">
							</div>
							<div class="form-group">
								<label>PASSWORD</label>
								<input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password">
							</div>
							<input type="submit" name="login" class="btn btn-success" value="Login">
							<br><br>
							<p> Don't have an account?<a href="apply.php">Apply Now!!!</a></p>
						</form>
				</div>
				<div class="col-md-3"></div>
			</div>
			
		</div>
		
	</div>

</body>
</html>