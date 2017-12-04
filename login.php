<?php
    include 'header.php';
    include 'connect.php';
        
        
    $email_post = $_POST['email'];
    $p = $_POST['pass'];

function absolute_url ($page = '') {

	// Start defining the URL...
	// URL is http:// plus the host name plus the current directory:
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	
	// Remove any trailing slashes:
	$url = rtrim($url, '/\\');
	
	// Add the page:
	$url .= '/' . $page;
	
	// Return the URL:
	return $url;

} // End of absolute_url() function
$email_post = mysqli_real_escape_string($connect, $email_post);
$$p = mysqli_real_escape_string($connect, $p);

$q = "SELECT * FROM user WHERE Email='$email_post' AND Password=SHA1('$p')";
$r = @mysqli_query($connect, $q);

if (mysqli_num_rows($r) == 1) {
    // Get the user's information:
    
	$row = mysqli_fetch_assoc($r);
	
    // Set the session data:
    session_start();
    $_SESSION['userId'] = $row['UserId'];
    $_SESSION['user_email'] = strtolower($email_post);
    $_SESSION['username'] = $row['FirstName'];
   //will need changed
    $_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);
    
    
    $url = absolute_url ('loggedin.php');
	header("Location: $url");
	exit();
}
    echo 'username or password is incorrect';
    include 'footer.php'
?>
