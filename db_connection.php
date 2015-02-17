<?php 
	//File to connect to database

//Define constants
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "root");
	define("DB_DATABASE", "codingdojo");
 
 

// MySQLi or PDO (PHP Data Objects)
// PDO will work on 12 different database systems, where as MySQLi will only work with MySQL databases.
// So, if you have to switch your project to use another database, PDO makes the process easy. You only have to change the connection string and a few queries. With MySQLi, you will need to rewrite the entire code - queries included.
// Both are object-oriented, but MySQLi also offers a procedural API.
// Both support Prepared Statements. Prepared Statements protect from SQL injection, and are very important for web application security.


// Create connection
$connection=new mysqli(DB_HOST,DB_USER,DB_PASS,
	                   DB_DATABASE);

//Check connection error
if($connection->connect_error)
{

	die("connection failed:"
		 .$connection->connect_error);
}
else
{
	//echo "connected successfully";
}
//Fetch multiple record from database
function fetch_all($query)
{
	global $connection;
	$result=$connection->query($query);
    //echo $result->num_rows;
    if($result->num_rows>0)
    {
    	while ($row=mysqli_fetch_assoc($result))
    	{
    		$data[]=$row;
    	}
    	  return $data;
    }
   
}
function fetch_record($query)
{
	global $connection;
	$result=$connection->query($query);
	return(mysqli_fetch_assoc($result));
}
//Update/Insert/Detele query

function run_mysql_query($query)
{
	global $connection;
	$result = $connection->query($query);
	if(preg_match("/insert/i", $query))
	{
		return $connection->insert_id;
	} 
  	else
  	{
  		return $result;
  	}

} 

