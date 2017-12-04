<?php
    include 'header.php';
    include 'connect.php';
    
    /// Query for retrieving topics
    include 'postTopic.inc.php';
        $q = "SELECT Title, MessageId, Posts FROM message WHERE Category = ".$_GET['category']." and archive = 0 and (Content LIKE "%'. $_GET['SValue'] .'%" or Title LIKE "%'. $_GET['SValue'] .'%") ORDER BY;
    $r = mysqli_query($connect, $q);
    
    /// Begin table creation
    echo "<table><th width = '80%'>Thread</th><th>Posted by</th width = '20%'>";
    
    while($row = mysqli_fetch_assoc($r)){
        postTopic($row, $connect);
    }
    echo "</table>";
    echo"<br>";
    echo '<a class="item" href="create_topic.php?id='.$_GET['id'].'">Create a topic</a>';
    include 'footer.php'
?>
