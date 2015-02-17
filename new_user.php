<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create new User</title>
	<link rel="stylesheet" type="text/css" 
	      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
</head>
<body class="container">
	<div>
		<h3 class="page-header">Create New User</h3>
		<div>
			<a href="index.php">
				<button class="btn btn-danger">Back</button>
			</a>
		</div>
		<br><br>
		<div class="col-md-4 well">
			<form action="process.php" method="post">
				<div class="form-group"> 
					<label> Name</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group"> 
					<label>Email</label>
					<input type="email" name="email" class="form-control">
				</div>
				<div class="form-group"> 
					<label>Password</label>
					<input type="password" name="password" class="form-control">
				</div>
				<div> 
					<input type="submit" value="Submit" class="btn btn-primary">
				</div>
				<input type="hidden" name="create_user" value="create_user">
			</form>
		</div>
	</div>
</body>
</html>

