<?php

 include ("connection.php");


$query="SELECT * FROM doctors WHERE status='Pending' ORDER BY username ASC";
$res=mysqli_query($connect,$query);


$output="";

$output .="
        <table class='table table-bordered'>
            <tr>
                 <th>ID</th>
                 <th>Firstname</th>
                 <th>Surname</th>
                 <th>Username</th>
                 <th>Email</th>
                 <th>Gender</th>
                 <th>Phone</th>
                 <th>Country</th>
                
                 <th>Action</th>
            </tr>


     


";

if(mysqli_num_rows($res)<1){
	$output .= "
        

        <tr>
        <td colspan='10' class='text-center'>No job request yet.</td>
 
        </tr>
   




	";
}

while($row=mysqli_fetch_array($res)){
	$output .="
      <tr>

      <td>".$row['id']."</td>
       <td>".$row['firstname']."</td>
        <td>".$row['surname']."</td>
         <td>".$row['username']."</td>
          <td>".$row['email']."</td>
           <td>".$row['gender']."</td>
            <td>".$row['phoneno']."</td>
             <td>".$row['country']."</td>
              
               <td>
                  <div class='col-md-12'>
                    <div class='row'>
                    <div class='col-md-6'>
                      <button id='".$row['id']."' class='btn btn-success approve'> APPROVE </button>



                    </div>
                    <div class='col-md-6'>
                    <button id='".$row['id']."' class='btn btn-danger reject'> REJECT</button>
                    </div>
                    </div>
                  </div>
               </td>


	";
}
$output .= "
   </tr>
   </table>
 
";

echo $output;

?>