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
        $sql = "INSERT INTO message(Title, Content, Posts, Category, DatePosted)
        VALUES('" .$_POST['title']. "',
                '".$_POST['description']."',
                ".$_SESSION["userId"].",
                ".$_GET["id"].",
                NOW())";
        $result = mysqli_query($connect, $sql);
      
        
         $query = "SELECT * from favorite where ParentTable = 'User' and FavoritedId = $_SESSION['userId']";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_assoc($result)) {
           $query_2 = "Select * from user where $row['UserWhoFavorited'] = UserId";
            $result_2 = mysqli_query($connect, $query_2);
            $row_email = mysqli_fetch_assoc($result_2);
            
            $to = $row_email['Email'];
				
				//who sends the email
				$from = $row_email['Email'];
				
				//reply-to test
				$reply_to = $row_email['Email'];
					
				$subject = "New topic by User you favorited ";
				
				//begin of HTML message 
				$body = "<html>
						<body>
		                    http://ec2-35-160-100-189.us-west-2.compute.amazonaws.com/category.php?id=".$_GET['id'] . "
						</body>
						</html>";
				//end of message 
				
				// To send the HTML mail we need to set the Content-type header. 
				$headers = "From: " . strip_tags($from) . "\r\n";
				$headers .= "Reply-To: ". strip_tags($reply_to) . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				
				//send the email - not yet
				mail("$to","$subject","$body","$headers");
            
        }
        
        $query = "SELECT * from favorite where ParentTable = 'Category' and FavoritedId = $_GET['id']";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_assoc($result)) {
           $query_2 = "Select * from user where $row['UserWhoFavorited'] = UserId";
            $result_2 = mysqli_query($connect, $query_2);
            $row_email = mysqli_fetch_assoc($result_2);
            
            $to = $row_email['Email'];
				
				//who sends the email
				$from = $row_email['Email'];
				
				//reply-to test
				$reply_to = $row_email['Email'];
					
				$subject = "Addition to Category you favorited ";
				
				//begin of HTML message 
				$body = "<html>
						<body>
		                    http://ec2-35-160-100-189.us-west-2.compute.amazonaws.com/category.php?id=".$_GET['id'] . "
						</body>
						</html>";
				//end of message 
				
				// To send the HTML mail we need to set the Content-type header. 
				$headers = "From: " . strip_tags($from) . "\r\n";
				$headers .= "Reply-To: ". strip_tags($reply_to) . "\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				
				//send the email - not yet
				mail("$to","$subject","$body","$headers");
            
        }
        
        
        
        
        $url = 'category.php?id='.$_GET["id"];
        header("Location: $url");
    }
}
?>
