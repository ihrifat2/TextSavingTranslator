<?php
//error handling
set_error_handler("databaseError",E_ALL);
function databaseError($errno, $errstr)
{
	echo "No Database Connection.";
	die();
}
//database connection variable
$host = "localhost";
$user = "root";
$pass = "";
$db = "tanslator_dictonary";
//database connection
$connect = mysqli_connect($host, $user, $pass, $db) or die ("Error while connecting to database.");
//database character set
mysqli_query($connect, 'SET CHARACTER SET utf8'); 
mysqli_query($connect, "SET SESSION collation_connection ='utf8_general_ci'");

?>