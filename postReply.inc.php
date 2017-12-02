<?php
    include 'connect.php';
    ob_start();

    function displayTopic($connect){
        $query = 'SELECT * FROM message WHERE MessageId = '.$_GET['id'];
        $res = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($res);
        $q = 'SELECT FirstName, LastName FROM user WHERE UserId = '.$row["Posts"];
        $name = mysqli_fetch_assoc(mysqli_query($connect, $q));

        echo '<div id="topic-post">
                <table>
                <th width="20%"></th>
                <th width="80%"><h2>'.$row["Title"].'</h2></td>
                    <tr>
                        <td class = "postleftpart">
                        <img class = "post-image"src="img/PlaceholderFace.svg.png"><br>
                            '.$name["FirstName"].' '.$name["LastName"];
                        
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
        $replierQuery = 'SELECT FirstName, LastName FROM user WHERE UserId = '.$rowReply["Sends"];
        $replierName = mysqli_fetch_assoc(mysqli_query($connect, $replierQuery));

        echo '<tr>';
        echo '<td class="replyleftpart">
            <img class = "post-image"src="img/PlaceholderFace.svg.png"><br>'
            .$replierName["FirstName"]." ".$replierName["LastName"].'
            </td>';
        echo '<td class="replyrightpart">'.$rowReply["Content"].'</td>';
        echo '</tr>';
    }

    ///Query replies for the id in $_GET['id']
    function queryReplies($connect) {
        $repliesQuery = 'SELECT Content, Sends FROM reply WHERE Attached = '.$_GET['id'];
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
            
        //display the new reply
        $url = 'topic.php?id='.$_GET["id"];
        header("Location: $url");
            }
        }
    }
}
?>