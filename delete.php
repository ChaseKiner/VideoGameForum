<?php
include 'header.php';
include 'connect.php';

$q = 'SELECT Posts FROM message WHERE MessageId = '.$_GET['id'];
$res = mysqli_fetch_assoc(mysqli_query($connect, $q));
if($_SESSION["userId"]==$res["Posts"]){
    $dquery = 'DELETE FROM message WHERE MessageId = '.$_GET['id'];
    mysqli_query($connect, $dquery);
    echo 'Successfuly deleted';
}
else{
    echo 'Insufficent permissions';
}
include 'footer.php';