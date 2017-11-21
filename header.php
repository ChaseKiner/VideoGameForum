<?php $webpage = basename($_SERVER['PHP_SELF']);?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <title>Video Game Forum</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="wrapper">
    <img src="img/Nintendo-banner.jpg">
    <div id="menu">
        <a class="item" href="index.php">Home</a> -
        <a class="item" href="quiz.php">Take a quiz</a>
    
        <div id="userbar">
        <?php
            session_start();

            if(!isset($_SESSION["userId"])){
                echo 'Hello, gamer! <a class="item" href="signup.php">Please create an account<a> -
                <a class="item" href="login_page.inc.php">Log in<a>';
            }
            else{
                echo 'Hello, ';
                echo $_SESSION["username"]." ";
                echo '<a class="item" href="login_page.inc.php">Log out<a>';
            }
            ?>
        </div>
    </div>
    
        <div id="content">
