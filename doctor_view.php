<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Patient Details</title>
</head>
<body style="background-image: url(27.jpg);background-repeat: no-repeat;background-size: cover;">
	<?php
       include("header.php");
       include("connection.php");


	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php
                        include("sidenav1.php");
					?>
				</div>
				<div class="col-md-10">
					<h5 class="text-center  my-3">Patient Details</h5>
					<?php
                      if(isset($_GET['id'])){
                      	$id=$_GET['id'];
                      	$query = "SELECT * FROM patient WHERE id='$id'";
                      	$res=mysqli_query($connect,$query);
                      	$row=mysqli_fetch_array($res);
                      }


					?>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3"></div>
								<div class="col-md-6">
									<?php
                                       echo "<img src='".$row['profile']."'  height='250px' class='col-md-12 my-2'width:'500px;';>";


									?>
									<table class="table table-bordered">
										<tr>
										
										<tr>
											<td>Username</td>
											<td><?php echo $row['username'] ?></td>
										</tr>
										<tr>
											<td>Email</td>
											<td><?php echo $row['email'] ?></td>
										</tr>
										<tr>
											<td>Phone Number</td>
											<td><?php echo $row['phoneno'] ?></td>
										</tr>
										<tr>
											<td>Gender</td>
											<td><?php echo $row['gender'] ?></td>
										</tr>
										<tr>
											<td>Country</td>
											<td><?php echo $row['country'] ?></td>
										</tr>
										<tr>
											
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>

</body>
</html>