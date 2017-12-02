<?php
//connect.php
$server = '127.0.0.1';
$username   = 'root';
$password   = 'pass';
$database   = 'forum';

$connect = mysqli_connect($server, $username, $password, $database); 

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


?>
