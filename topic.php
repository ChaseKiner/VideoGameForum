<?php
include 'header.php';
include 'postReply.inc.php';

displayTopic($connect);

//Insert replies
displayReplies($connect);

insertReplyForm($connect);

include 'footer.php';
?>