<?php
	require("db_connection.php");
	session_start();
	//display all users
	$user_id=$_POST['user_id'];
	$user_query="SELECT * FROM users where id='{$user_id}'";
	//users is an associative array
	$user=fetch_record($user_query);
	//var_dump($users);
	//var_dump($user);
	//die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>edit User</title>
	<link rel="stylesheet" type="text/css" 
	      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
</head>
<body class="container">
	<div>
		<h3 class="page-header">Edit User</h3>
		<div>
			<a href="index.php">
				<button class="btn btn-danger">Back</button>
			</a>
		</div>
		<br><br>
		<div class="col-md-4 well">
			<form action="process.php" method="post">
				<div class="form-group"> 
					<label> Name </label>
					<input type="text" name="name" value="<?=$user['name']?>" class="form-control">
				</div>
				<div class="form-group"> 
					<label>Email</label>
					<input type="email" name="email" value="<?=$user['email']?>" class="form-control">
				</div>
				<div> 
					<input type="submit" value="Edit User" class="btn btn-primary">
				</div>
				<input type="hidden" name="edit_user" value="edit_user">
				<input type="hidden" name="user_id"   value="<?=$user['id']?>" >
			</form>
		</div>
	</div>
</body>
</html>

