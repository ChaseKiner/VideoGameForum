<?php

    function displayTopic(){
        $query = 'SELECT * FROM Message WHERE MessageId = '.$_GET['id'];
        $res = mysql_query($query);
        $row = mysql_fetch_assoc($res);
        $q = 'SELECT FirstName, LastName FROM User WHERE UserId = '.$row["Posts"];
        $name = mysql_fetch_assoc(mysql_query($q));

        echo '<div id="topic-post">
                <table>
                <th width="20%"></th>
                <th width="80%"><h2>'.$row["Title"].'</h2></td>
                    <tr>
                        <td class = "postleftpart">
                        <img class = "post-image"src="img/Placeholderface.svg.png"><br>
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
    
    function fetchReply($rowReply) {
        $replierQuery = 'SELECT FirstName, LastName FROM User WHERE UserId = '.$rowReply["Sends"];
        $replierName = mysql_fetch_assoc(mysql_query($replierQuery));

        echo '<tr>';
        echo '<td class="replyleftpart">
            <img class = "post-image"src="img/Placeholderface.svg.png"><br>'
            .$replierName["FirstName"]." ".$replierName["LastName"].'
            </td>';
        echo '<td class="replyrightpart">'.$rowReply["Content"].'</td>';
        echo '</tr>';
    }

    ///Query replies for the id in $_GET['id']
    function queryReplies() {
        $repliesQuery = 'SELECT Content, Sends FROM Reply WHERE Attached = '.$_GET['id'];
        $resReply = mysql_query($repliesQuery);
        return $resReply;
    }

    //create a <table> of replies for the id in $_GET['id']
    function displayReplies(){
    $resReply = queryReplies();
    echo '<table>';
        while($rowReply = mysql_fetch_assoc($resReply)){
            fetchReply($rowReply);
        }
    echo '</table>';
    echo '<br><br>';
    }

    function insertReplyForm() {
        //Reply form
        if(isset($_SESSION["userId"])){
            echo "<form method='post' action=''>
                Reply: <br><textarea name='reply' /></textarea><br>
                <input class = 'item' type='submit' value='reply' />
            </form>";
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //check if reply has any content
            if($_POST['reply'] != ''){
            $sql = "INSERT INTO Reply(Content, Sends, Attached, DatePosted)
            VALUES('". mysql_real_escape_string($_POST['reply']) ."',
                    ".$_SESSION["userId"].",
                    ".$_GET["id"].",
                    NOW())";
            $result = mysql_query($sql);
            }
        //display the new reply
        $url = 'topic.php?id='.$_GET["id"];
        header("Location: $url");
}
}
    }
?>