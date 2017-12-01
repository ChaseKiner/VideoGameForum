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
        $sql = "INSERT INTO Message(Title, Content, Posts, Category, DatePosted)
        VALUES('" . mysql_real_escape_string($_POST['title']) . "',
                '". mysql_real_escape_string($_POST['description']) ."',
                ".$_SESSION["userId"].",
                ".$_GET["id"].",
                NOW())";
        $result = mysql_query($sql);
        if(!$result)
        {
            echo 'Error' . mysql_error();
        }
        else
        {   
            $url = 'category.php?id='.$_GET["id"];
            header("Location: $url");
        }
    }
}
?>