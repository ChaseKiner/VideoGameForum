<?php
//connect.php
$server = '127.0.0.1';
$username   = 'root';
$password   = 'pass';
$database   = 'forum';
 
if(!mysql_connect($server, $username,  $password))
{
    exit('Error: could not establish database connection');
}
if(!mysql_select_db($database))
{
    exit('Error: could not select the database');
}
?>