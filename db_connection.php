<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "tanslator_dictonary";

$connect = mysqli_connect($host, $user, $pass, $db) or die ("Error while connecting to database");
mysqli_query($connect, 'SET CHARACTER SET utf8'); 
mysqli_query($connect, "SET SESSION collation_connection ='utf8_general_ci'");

?>