<?php
	require("db_connection.php");
	session_start();
	//display all users
	$users_query="SELECT * FROM users order by created desc";
	//users is an associative array
	$users=fetch_all($users_query);
	//var_dump($users);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Testing Database Connection</title>
	<link rel="stylesheet" type="text/css" 
	      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
	 <style type="text/css">
		.col-md-5 form
		{
			vertical-align: top;
			display: inline-block;
		}
		.well
		{
			background-color: #5cb85c;
			color: white;
			font: 20px;
			width: 500px;
		}
	 </style>
</head>
<body class="container">
	<h1 class="page-header">Testing with database</h1>	
	<?php 
		if(isset($_SESSION["flash_messages_success"]))
			{?>
		<div class="well">
		<?php foreach ($_SESSION["flash_messages_success"] as $message) 
			{
				echo $message;
			 }
			} 
			unset($_SESSION["flash_messages_success"]);
	?>
	<?php 
		if(isset($_SESSION["flash_messages_error"]))
			{?>
		<div class="well">
		<?php foreach ($_SESSION["flash_messages_error"] as $message) 
			{
				echo $message;
			 }
			} 
			unset($_SESSION["flash_messages_error"]);
	?>
		</div>
	<div>
		 <a href="new_user.php">
		 	<button class="btn btn-success">Create New User</button>
		 </a>
	</div>
	<br><br>
	<div class="col-md-7">
		<table class="table table-bordered table-striped">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>Time of Creation</th>
			<th>Actions</th>
		</thead>
	<?php 
	 if(!empty($users))
	 {
	 	foreach ($users as $user) {?>
	 		<tr>
	 			<td><?php echo $user['name'];?></td>
	 			<td><?php echo $user['email'];?></td>
	 			<td><?php echo $user['created'];?></td>
	 			<td class="col-md-5">
	 				<form action="edit_user.php" method="post">
	 					<input type="submit" value="edit" class="btn btn-warning">
	 					<input type="hidden" name="edit_user" value="edit_user">
	 					<input type="hidden" name="user_id" value="<?= $user['id'] ?>">
	 				</form> 
	 				<form action="process.php" method="post">
	 					<input type="submit" value="delete" class="btn btn-danger">
	 					<input type="hidden" name="delete_user" value="delete_user">
	 					<input type="hidden" name="user_id" value="<?= $user['id'] ?>">
	 				</form>
	 			</td>
	 	</tr>
	 <?php }
	 }
?> 
</table>	 	 
	</div>
	 
	
	
</body>
</html>