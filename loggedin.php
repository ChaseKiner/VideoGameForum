<?php

include 'header.php';
if(isset($_SESSION["userId"]))
    echo "Successfully logged in!";
include 'footer.php';
?>