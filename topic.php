<?php
include 'header.php';
include 'connect.php';
include 'postReply.inc.php';

displayTopic();

//Insert replies
displayReplies();
insertReplyForm();

include 'footer.php';
?>