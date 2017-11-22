<?php
include 'header.php';
include 'connect.php';
include 'postReply.inc.php';

displayTopic();

if(isset($_SESSION["userId"]))
if($_SESSION["userId"]==$row["Posts"]){
    echo '<a class="item" href="update.php?id='.$row["MessageId"].'">[Update]</a>';
    echo ' - ';
    echo '<a class="item" href="delete.php?id='.$row["MessageId"].'"> [Delete]</a>';
}
echo '</table>';
echo '</div>';
echo '<br><br>';


//Insert replies
displayReplies();
insertReplyForm();

include 'footer.php';
?>