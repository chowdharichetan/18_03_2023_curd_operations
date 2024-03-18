<?php
	// Assuming connection details are stored in connect.php
	include('connect.php');
	?>

	<!DOCTYPE html>
	<html>
	<head>
	    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/css/bootstrap.min.css">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
	</head>
	<body>

	<div class="container" style="margin: 100px;">
	    <button class="btn btn-primary"><a href="index.php" style="color: black;">Add User</a></button>

	    <table class="table" style="margin: 100px;">
	        <center><h3><u>USER TABLE</u></h3></center>
	        <thead>
	            <tr>
	                <th scope="col">User ID</th>
	                <th scope="col">Username</th>
	                <th scope="col">Mobile</th>
	                <th scope="col">Email</th>
	                <th scope="col">Password</th>
	                <th scope="col">Re-Type Password</th>
	                <!-- <th scope="col">Middle Name</th> -->
	                <th scope="col">Operations</th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php
	            $sql = "SELECT * FROM users;";
	            $results = mysqli_query($con, $sql);

	            echo "<pre>";
	            print_r($results);
	            echo "</pre>";

	         	if($results) {

	                while ($row = mysqli_fetch_assoc($results)) {
	                    $userid = $row['user_id'];	                    
	                    $username = $row['username'];
	                    $mobile = $row['phone_number'];
	                    $email = $row['email'];
	                    $password = $row['passwords'];
	                    $re_type_psw = $row['re_type_password'];
	                    // $middlename = $row['middlename'];
	                    

	                    // echo "<tr>
	                    //         <td scope='row'>" . $userid . "</td>
	                    //         <td>" . $username . "</td>
	                    //         <td>" . $mobile . "</td>
	                    //         <td>" . $email . "</td>
	                    //         <td>" . $password . "</td>
	                    //         <td>" . $re_type_psw . "</td>
	     
	                    //         <td>                 
	                    //             <button class='btn btn-danger'><a href='edit.php?editid="  . $userid . "'><h4 style='color:black;'>Update</h4></a></button>
	                    //             <button class='btn btn-primary'><a href='delete.php?deleteid=" . $userid . "'><h4 style='color:black;'>Delete</h4></a></button>
	                    //         </td>
	                    //     </tr>";
	                }

	            }
	           
	            ?>
	        </tbody>
	    </table>

	</div>	
	</body>
	</html>