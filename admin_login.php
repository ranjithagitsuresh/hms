<?php
session_start();
  include("connection.php");
  if(isset($_POST['login'])){
  	$username=$_POST['username'];
  	$password=$_POST['password'];
  	$error =array();
  	if(empty($username)){
  		$error['admin']="Enter Username";
  	}
  	else if (empty($password)) {
  		$error['admin']="Enter Password";
  	}
  	if(count($error)==0){
  		$query="SELECT * FROM admin WHERE username='$username' AND password='$password'";
  		$res=mysqli_query($connect,$query);

  		if(mysqli_num_rows($res)==1){
           echo "<script>alert('You have logged in as admin ')</script>";
           $_SESSION['admin']=$username;
           header("Location:index.php");
           exit();
  		}
  		else{
  			echo "<script>alert('Invalid username or password ')</script>";
  		}
  	}
  }

?>
 

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN PAGE</title>
</head>
<body style="background-image: url(27.jpg);background-repeat: no-repeat;background-size: cover;">
	<?php
 include("header.php");



?>
<div style="margin-top: 40px"></div>
<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 jumbotron">
				<img src="2.gif"class="col-md-12">
				<form method="post" class="my-2">
					<div >
						<?php
						if(isset($error['admin'])){
							$sh  =$error['admin'];
							$show="<h4 class='alert alert-danger'>$sh</h4>";
						}
						else{
							$show="";
						}
						echo $show;
						?>
					</div>
					<div class="form-group">
						<label>USERNAME</label>
						<input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter  Username">
					</div>
					<div class="form-group">
						<label>PASSWORD</label>
						<input type="password" name="password" class="form-control" placeholder="Enter password">
					</div>
					<input type="submit" name="login" class="btn btn-success" value="Login">
				</form>
			</div>
			<div class="col-md-3"></div> 
		</div>
	</div>
</div>

</body>
</html>