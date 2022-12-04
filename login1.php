<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style1.css">
	<title>Document</title>
</head>
<body>
	
<form action="#" method="post">
     	<h2>LOGIN</h2>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit" name="b1">Login</button>
     </form>

<?php 
session_start(); 
include "db_conn.php";


if(isset($_POST['b1'])){
	if (empty($_POST['uname']) && empty($_POST['password'])) {
		echo '<script>alert("Email and Password required");</script>';
	} 
	else {
			if (strlen($_POST['password']) < 4){
			echo '<script>alert("Password should be equal or greater than 4 characters");</script>';
			}
			else{
				$uname=$_POST['uname'];
				$pwd=$_POST['password'];
				$sql = "SELECT * FROM users WHERE username ='$uname' AND password = '$pwd'"; 
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($result);
      
				//$count = mysqli_num_rows($result);
	  
		
				if($row > 0) {
					//$_SESSION['isloggedin'] = true;
					//$_SESSION['name']=$row['first name'];
         
					echo"<script>alert('You are logged in!!'); location='about.php';</script>";
				}
				else {
					echo '<script>alert("Invalid details!!");</script>';
				}
			}	
	}	
	
}

?>

</body>
</html>