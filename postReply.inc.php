<?php
    include 'connect.php';
    ob_start();

    function displayTopic($connect){
        $query = 'SELECT * FROM message WHERE MessageId = '.$_GET['id'];
        $res = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($res);
        $q = 'SELECT FirstName, LastName, image FROM user WHERE UserId = '.$row["Posts"];
        $sqlRes = mysqli_query($connect, $q);
        $name = mysqli_fetch_assoc($sqlRes);
       
        echo '<div id="topic-post">
                <table>
                <td><h5>'.$row["DatePosted"].'</td>
                <th width="80%"><h2>'.$row["Title"].'</h2></td>
                    <tr>
                        <td class = "postleftpart">
                        <img class = "post-image" src="'.$name["image"].'"><br>
                            '.$name["FirstName"].' '.$name["LastName"];
        
         $sql = "Select * from favorite where UserWhoFavorited = ".$_SESSION["userId"]." and ParentTable = 'User' and FavoritedId = ".$row['Posts'];
        $result = mysqli_query($connect, $sql);
        

        if (mysqli_num_rows($result) == 0) {
          
          echo " <a href='favorite.php?id=".$row['Posts']."&parent=User'><i class='fa fa-star-o' aria-hidden='true'></i></a>";
		}

        else{
          
           echo "<a href='favorite.php?id=".$row['Posts']."&parent=User'><i class='fa fa-star' aria-hidden='true'></i></a>"; 
        }
                        
        echo '<td class = "postrightpart"><h3>';
        echo $row["Content"];
        echo '</td></tr></h3>';
        echo '<tr><td>';

        if(isset($_SESSION["userId"]))
        if($_SESSION["userId"]==$row["Posts"]){
            echo '<a class="item" href="update.php?id='.$row["MessageId"].'">[Update]</a>';
            echo ' - ';
            echo '<a class="item" href="delete.php?id='.$row["MessageId"].'"> [Delete]</a>';
        }
        echo '</table>';
        echo '</div>';
        echo '<br><br>';        
    }
    
    function fetchReply($rowReply, $connect) {
        $replierQuery = 'SELECT FirstName, LastName, image FROM user WHERE UserId = '.$rowReply["Sends"];
        $replierName = mysqli_fetch_assoc(mysqli_query($connect, $replierQuery));

        echo '<tr>';
        echo '<td class = "date-post">';
        echo $rowReply["DatePosted"];
        echo '</td>';
        echo '<td width = "80%"></td>';
        echo '</tr><tr>';
        echo '<td class="replyleftpart">
            <img class = "post-image"src="'.$replierName["image"].'"><br>'
            .$replierName["FirstName"]." ".$replierName["LastName"];
        
        $sql = "Select * from favorite where UserWhoFavorited = ".$_SESSION["userId"]." and ParentTable = 'User' and FavoritedId = ".$rowReply['Sends'];
        $result = mysqli_query($connect, $sql);
        

        if (mysqli_num_rows($result) == 0) {
          
          echo " <a href='favorite.php?id=".$rowReply['Sends']."&parent=User'><i class='fa fa-star-o' aria-hidden='true'></i></a>";
		}

        else{
          
           echo "<a href='favorite.php?id=".$rowReply['Sends']."&parent=User'><i class='fa fa-star' aria-hidden='true'></i></a>"; 
        }
        
        echo ' </td>';
        echo '<td class="replyrightpart">'.$rowReply["Content"].'</td>';
        echo '</tr>';
    }

    ///Query replies for the id in $_GET['id']
    function queryReplies($connect) {
        $repliesQuery = 'SELECT Content, Sends, DatePosted FROM reply WHERE Attached = '.$_GET['id'];
        $resReply = mysqli_query($connect, $repliesQuery);
        return $resReply;
    }

    //create a <table> of replies for the id in $_GET['id']
    function displayReplies($connect){
        $resReply = queryReplies($connect);
        echo '<table>';
            while($rowReply = mysqli_fetch_assoc($resReply)){
                fetchReply($rowReply, $connect);
            }
        echo '</table>';
        echo '<br><br>';
    }

    function insertReplyForm($connect) {
        //Reply form
        
        if(isset($_SESSION["userId"])) { 
        if($_SERVER['REQUEST_METHOD'] != 'POST') {
            echo "<form method='post' action=''>
                Reply: <br><textarea name='reply' /></textarea><br>
                <input class = 'item' type='submit' value='reply' />
            </form>";
        }
        else {
            //check if reply has any content
            if($_POST['reply'] != ''){
            $sql = "INSERT INTO reply(Content, Sends, Attached, DatePosted)
            VALUES('". mysqli_real_escape_string($connect, $_POST['reply']) ."',
                    ".$_SESSION["userId"].",
                    ".$_GET["id"].",
                    NOW())";
            $result = mysqli_query($connect, $sql);
		    
		    
		    
		    
	$query = "SELECT * from favorite where ParentTable = 'Topic' and FavoritedId = ".$_GET['id'];
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_assoc($result)) {
           $query_2 = "Select * from user where ".$row['UserWhoFavorited']." = UserId";
            $result_2 = mysqli_query($connect, $query_2);
            $row_email = mysqli_fetch_assoc($result_2);
            
            $to = $row_email['Email'];
				
				//who sends the email
				$from = $row_email['Email'];
				
				//reply-to test
				$reply_to = $row_email['Email'];
					
				$subject = "New reply on topic you favorited ";
				
				//begin of HTML message 
				$body = "<html>
						<body>
		                    http://ec2-35-160-100-189.us-west-2.compute.amazonaws.com/topic.php?id=".$_GET['id'] . "
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
		    
		    
            
        //display the new reply
        $url = 'topic.php?id='.$_GET["id"];
        header("Location: $url");
            }
        }
    }
}
?>
