<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
	require_once 'login.php';


	
	$fullname = $_POST["Full Name"];
	$CatName = $_POST["CatName"];
	$age = $_POST["age"];
	
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	

	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}   
	
		$statement = $mysqli->prepare("INSERT INTO Person (Animal_id, Catname, age) VALUES(?, ?, ?)"); 
		$statement->bind_param('sss', $fullname, $CatName $age); 
		if($statement->execute())
			{
				echo nl2br("Hello "." ". $fullname . "! We are so happy that you've chosen". $CatName.  "\r\nage ". $age .".", false);
			}
			else{
					print $mysqli->error;
				}
echo"<br><form action= 'update_delete.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form>";
         }
else{
    echo ("error");
    }         
?>