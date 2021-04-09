<?php

 session_start();


?>


<!DOCTYPE html>
<html>
<head>
	<title>DOCTORS PROFILE</title>
</head>
<body style="background-image: url(27.jpg);background-repeat: no-repeat;background-size: cover;">
	<?php
      include("header.php");




	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
			  <div class="col-md-2" style="margin-left: -30px;">
			  	<?php

                  include("sidenav1.php");
                  include("connection.php");
			  	?>
			  </div>
			  <div class="col-md-10">
			  	<div class="container-fluid">
			  		<div class="col-md-12">
			  			<div class="row">
			  				<div class="col-md-6">
			  					<?php
			  					$doc=$_SESSION['doctor'];
                                    $query="SELECT * FROM doctors WHERE username='$doc'";
                                   $res=mysqli_query($connect,$query);
                                   $row=mysqli_fetch_array($res);
                                   if(isset($_POST['upload'])){
                                   	$img=$_FILES['img']['name'];
                                   	if(empty($img)){

                                   	}else{
                                   		$query="UPDATE doctors SET profile='$img' WHERE username='$doc'";
                                   		$res=mysqli_query($connect,$query);
                                   		if($res){
                                   			move_uploaded_file($_FILES['img']['tmp_name'], "$img");
                                   		}
                                   	}
                                   }
			  					?>
			  					<form method="post" enctype="multipart/form-data">
			  						<?php

                                    echo "<img src= '".$row['profile']."'style='height:250px;'>";

			  						?>
			  						<br><br>
			  						<input type="file" name="img" class="form-control">
			  						<br>
			  						<input type="submit" name="upload" class="btn btn-success" value="Update Profile">
			  					</form>
			  					<div class="my-3">
			  						<table class="table table-bordered">
			  							<tr>
			  								<th colspan="2" class="text-center">DETAILS</th>
			  							</tr>
			  							
			  							<tr>
			  								<td>Username</td>
			  								<td><?php
                                             echo $row['username'];
			  								?></td>
			  							</tr>
			  							<tr>
			  								<td>Email</td>
			  								<td><?php
                                             echo $row['email'];
			  								?></td>
			  							</tr>
			  							<tr>
			  								<td>Phone no</td>
			  								<td>+<?php
                                             echo $row['phoneno'];
			  								?></td>
			  							</tr>
			  							
			  							<tr>
			  								<td>Salary</td>
			  								<td><?php
                                             echo $row['salary'];
			  								?></td>
			  							</tr>

			  							
			  							
			  							
			  						</table>
			  					</div>
			  					
			  				</div>
			  				<div class="col-md-6">
			  					<h5 class="text-center my-2">Change Username</h5>
			  					<?php
                                   if(isset($_POST['change_username'])){
                                   	$username=$_POST['username'];
                                   	if (empty($username)) {
                                   		# code...
                                   	}else{
                                   		$query="UPDATE  doctors SET username='$username'  WHERE username='$doc'";
                                   		$res=mysqli_query($connect,$query);
                                   	if($res){
                                   		$_SESSION['doctor']=$username;
                                   	}

                                   	}
                                   }



			  					?>
			  					<form method="post">
			  						<label>Change Username</label>
			  						<input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter Username">
			  						<br>
			  						<input type="submit" name="change_username" class="btn btn-success" value="Change Username">
			  					</form>
			  					<br><br>
			  					<h5 class="text-center my-2">Change Password</h5>
			  					<?php
                                   if(isset($_POST['change_pass'])){
                                   	 $old=$_POST['old_pass'];
                                   	 $new=$_POST['new_pass'];
                                   	 $con=$_POST['conf_pass'];
                                   
                                   $ol="SELECT * FROM doctors WHERE username='$doc'";
                                   $ols=mysqli_query($connect,$ol);
                                   $row=mysqli_fetch_array($ols);


                                   if ($old != $row['password']) {
                                   	# code...
                                   }else if(empty($new)){

                                   }else if($con!= $new){

                                   }
                                   else{
                                   	$query="UPDATE doctors SET password='$new' WHERE username='$doc'";
                                   	mysqli_query($connect,$query);
                                   }

                                  }

			  					?>
			  					<form method="post">
			  						<div class="form-group">
			  							<label>Old Password</label>
			  							<input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
			  						</div>
			  						<div class="form-group">
			  							<label>New Password</label>
			  							<input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password">
			  						</div>
			  						<div class="form-group">
			  							<label>Confirm Password</label>
			  							<input type="password" name="conf_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
			  						</div>
			  						<input type="submit" name="change_pass" class="btn btn-info" value="Change Password">
			  					</form>
			  				</div>
			  			</div>
			  		</div>
			  	</div>
			  	
			  </div>	
			</div>
		</div>
	</div>

</body>
</html>