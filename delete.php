<?php
include 'header.php';
include 'connect.php';

$q = 'SELECT Posts FROM Message WHERE MessageId = '.$_GET['id'];
$res = mysql_fetch_assoc(mysql_query($q));
if($_SESSION["userId"]==$res["Posts"]){
    $dquery = 'DELETE FROM Message WHERE MessageId = '.$_GET['id'];
    mysql_query($dquery);
    echo 'Successfuly deleted';
}
else{
    echo 'Insufficent permissions';
}
include 'footer.php';