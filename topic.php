<?php
include 'header.php';
include 'connect.php';
$query = 'SELECT * FROM Message WHERE MessageId = '.$_GET['id'];
$res = mysql_query($query);
$row = mysql_fetch_assoc($res);
$q = 'SELECT FirstName, LastName FROM User WHERE UserId = '.$row["Posts"];
$name = mysql_fetch_assoc(mysql_query($q));

echo '<table><th><h2>'.$row["Title"].'</th></h2>';
echo '<tr><td><h3>';
echo $row["Content"];
echo '</td></tr></h3>';
echo '<tr><td>';
echo 'Posted by:'.$name["FirstName"].' '.$name["LastName"];
if($_SESSION["userId"]==$row["Posts"]){
    echo '<a href="update.php?id='.$row["MessageId"].'"> [Update]</a>';
    echo ' - ';
    echo '<a href="delete.php?id='.$row["MessageId"].'"> [Delete]</a>';
}
echo '</table>';


include 'footer.php';
?>