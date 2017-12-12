<?php function Connect()
{
 $dbhost = "localhost";
 $dbuser = "benjamin";
 $dbpass = "ba!23456";
 $dbname = "benjamin_";
 
 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
 return $conn;
}
 
?>