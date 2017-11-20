<?php
    include 'header.php';
    include 'connect.php';
    $q = 'SELECT * FROM Message WHERE MessageId = '.$_GET['id'];
    $res = mysql_fetch_assoc(mysql_query($q));
    if($_SESSION["userId"] == $res["Posts"]){
        if($_SERVER['REQUEST_METHOD'] != 'POST'){

    echo "<form method='post' action=''>
    Title: <br><input type='text' name='title' value = '".$res["Title"]."'/><br>
    Description: <br><textarea name='description'>".$res["Content"]."</textarea><br>
    <input type='submit' value='Update' />
</form>";
        }
        else{
            $update = "UPDATE Message SET Title = '".$_POST["title"]."', 
            Content = '".$_POST["description"]."' WHERE MessageId = ".$res["MessageId"];
            mysql_query($update);
            echo "Successfully updated";
        }
}
else{
    echo "Invalid permission";
}
    include 'footer.php';