<?php
	session_start();
	require("db_connection.php");



//var_dump($users);

	if(isset($_POST['edit_user']) &&
	    $_POST['edit_user']=="edit_user" 
	    )
	{
		$user_id	= $_POST['user_id'];
		$user_name	= $_POST['name'];
		$user_email		= $_POST['email'];
		$update_query = "UPDATE users SET name='{$user_name}',email='{$user_email}'
					   WHERE id='{$user_id}' ";
		$update_user = run_mysql_query($update_query) ;
		var_dump($update_user);
		die();
		 
		$_SESSION["flash_messages_success"][]="User updated Successfully" ;
		header("Location:index.php");
		die(); 

	}
	if(isset($_POST['delete_user']) &&
	    $_POST['delete_user']=="delete_user" 
	    )
	{
		//echo "delete_user";
		$user_id=$_POST['user_id'];
		$delete_query="DELETE from users where id='{$user_id}' ";
		if(run_mysql_query($delete_query)==0)
		{
			$_SESSION["flash_messages_success"][]="Successfully deleted";
		}
		header("Location:index.php");
		die();
	}

	if(isset($_POST['create_user'])&& 
		$_POST['create_user']=="create_user")
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$create_user="INSERT INTO  users(name,email,password,created)
                           VALUES('{$name}','{$email}','{$password}',NOW()) ";

        $result = run_mysql_query($create_user) ;
        var_dump($result);
        die();

		if(run_mysql_query($create_user) )
		{
			$_SESSION["flash_messages_success"][]="User created Successfully" ;
			header("Location:index.php");
			die();
		}
		else
		{
			$_SESSION["flash_messages_error"][]="User cannot be  created";
			header("Location:index.php");
			die();
		}
	}
?>