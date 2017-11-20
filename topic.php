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

//Insert replies
$repliesQuery = 'SELECT Content, Sends FROM Reply WHERE Attached = '.$_GET['id'];
$resReply = mysql_query($repliesQuery);
echo '<table>';
while($rowReply = mysql_fetch_assoc($resReply)){
//Get name of replier
$replierQuery = 'SELECT FirstName, LastName FROM User WHERE UserId = '.$rowReply["Sends"];
$replierName = mysql_fetch_assoc(mysql_query($replierQuery));
echo '<tr>';
echo '<td class="rightpart">'.$replierName["FirstName"]." ".$replierName["LastName"].'</td>';
echo '<td class="leftpart">'.$rowReply["Content"].'</td>';
echo '</tr>';
}
echo '</table>';
if(isset($_SESSION["userId"])){
        echo "<form method='post' action=''>
            Reply: <br><textarea name='reply' /></textarea><br>
            <input type='submit' value='Reply' />
        </form>";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sql = "INSERT INTO Reply(Content, Sends, Attached)
        VALUES('". mysql_real_escape_string($_POST['reply']) ."',
                ".$_SESSION["userId"].",
                ".$_GET["id"].")";
        $result = mysql_query($sql);
        //display the new reply
        echo '<table><tr><td class="rightpart">'.$_SESSION['username'].'
        </td><td class="leftpart">'.$_POST['reply'].'</td></tr></table>';
        

    }
}

include 'footer.php';
?>