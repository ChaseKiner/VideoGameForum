<?php
    session_start();
    unset($_SESSION["userId"]);
    header("Location: login_page.inc.php");
    exit;
?>