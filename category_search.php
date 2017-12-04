<?php
    include 'header.php';
    include 'connect.php';
    
    /// Query for retrieving topics
    include 'postTopic.inc.php';
        $value = mysqli_real_escape_string($connect, $_GET['SValue']);
        $q = "SELECT Title, MessageId, Posts FROM message WHERE Category = ".$_GET['category']." and (Content LIKE '%". $value ."%' or Title LIKE '%". $_GET['SValue'] ."%')";
    $r = mysqli_query($connect, $q);
    
    /// Begin table creation
    echo "<table><th width = '80%'>Thread</th><th>Posted by</th width = '20%'>";
    
    while($row = mysqli_fetch_assoc($r)){
        postTopic($row, $connect);
    }
    echo "</table>";
    echo"<br>";
    echo '<a class="item" href="create_topic.php?id='.$_GET['category'].'">Create a topic</a>';
    include 'footer.php';
?>
