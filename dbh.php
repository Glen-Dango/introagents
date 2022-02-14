<?php   //600 seconds
//con = connection

//sessions are held on 'log in' page  
session_start();

$conn = mysqli_connect("localhost", "root" , "" , "listalot");
if (!$conn){
	die("Connection Failed: ".mysqli_connect_error());
}
//echo "Connected successfully<br>";
//echo "<br>";







?>
 <meta http-equiv="refresh" content="1000;url=http://localhost/listalot1/login.php" /> 