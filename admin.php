 <?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
                  include("sidenav.php"); 
                  include("connection.php");
                  
				?>

				
			</div>
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<h5 class="text-center">ALL ADMIN</h5>
							<?php
							    $ad=$_SESSION['admin'];
                                $query="SELECT * FROM admin WHERE username !='$ad'";
                                $res=mysqli_query($connect,$query);
                                $output="<table class='table table-bordered'>
                             	<th>ID</th>
                             	<th>USERNAME</th>
                             	<th style='width: 10% ; '>ACTION</th>


                                ";
                                if(mysqli_num_rows($res)<1){
                                	$output="<h5 class='text-center'>No New Admin</h5>";
                                }
                                while ($row= mysqli_fetch_array($res)) {
                                		$id=$row['id'];
                                		$username=$row['username'];
                                		$output .="<tr>
                             		<td>$id</td>
                             		<td>$username</td>
                             		<td>
                             			<a href='admin.php?id=$id'><button id='$id' class='btn btn-danger remove'>REMOVE</button></a>
                             		</td>";
                                		
                                	}

                                
                              $output .="
                              </tr>

                             </table>
                             ";
                             echo $output;

                             if(isset($_GET['id'])){
                             	$id=$_GET['id'];
                             	$query="DELETE FROM admin WHERE id='$id'";
                             	mysqli_query($connect,$query);
                             }




							?>

						</div>
						<div class="col-md-6">
							<?php

                             if(isset($_POST['add'])){
                             	$username=$_POST['username'];
                             	$password =$_POST['password'];
                             	$profile=$_FILES['profile']['name']; 
                             	$error=array();
                             	if(empty($username)){
                             		$error['u']="Enter Admin Username";
                             	}
                             	else if(empty($password)){
                             		$error['u']="Enter Admin Password";
                             	}
                             	else if(empty($profile)){
                             		$error['u']="Add Admin Picture";

                             	}
                             	if(count($error)==0){
                             		$q="INSERT INTO admin(username,password,profile) VALUES('$username','$password','$profile')";
                             		$result=mysqli_query($connect,$q);
                             	
                             	if($result){
                             		move_uploaded_file($_FILES['profile']['tmp_name'], "$profile");
                             	}
                             	else{

                             	}
                             }
                         }
                        

                         if(isset($error['u'])){
                               $er=$error['u'];
                               $show="<h5 class='text-center alert alert-danger'>$er</h5>";
                         }else{
                           $show="";
                         }


							?>
							<h5 class="text-center">ADD ADMIN</h5>
							<form method="post" enctype="multipart/form-data">
								<div>
									<?php echo $show;?>
								</div>
								<div class="form-group">
									<label>USERNAME</label>
									<input type="text" name="username" class="form-control" autocomplete="off"> 
									<div class="form-group">
										<label>PASSWORD</label>
										<input type="password" name="password" class="form-control">
									</div>
									<div class="form-group">
                                       <label>ADD ADMIN PICTURE </label>
										
										<input type="file" name="profile" class="form-control">
									</div><br>
									<input type="submit" name="add" value="ADD NEW ADMIN" class="btn btn-success ">
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
			
				
			</div>
			</div>
		</div>
	</body>
	</html>