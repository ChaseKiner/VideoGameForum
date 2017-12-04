<?php
//create_cat.php

include 'header.php';
include 'connect.php';
if(isset($_SESSION['userId'])){
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {

        echo "<form method='post' action=''>
            Title: <br><input type='text' name='title' /><br>
            Description: <br><textarea name='description' /></textarea><br>
            <input type='submit' value='Add Topic' />
        </form>";
    }
    else
    {
        //the form has been posted, so save it
        $sql = "INSERT INTO message(Title, Content, Posts, Category, DatePosted)
        VALUES('" .$_POST['title']. "',
                '".$_POST['description']."',
                ".$_SESSION["userId"].",
                ".$_GET["id"].",
                NOW())";
        $result = mysqli_query($connect, $sql);
        
        $url = 'category.php?id='.$_GET["id"];
        header("Location: $url");
    }
}
?>