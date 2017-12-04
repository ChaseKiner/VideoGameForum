<?php
    include 'header.php';
    include 'connect.php';
    
    /// Query for retrieving topics
    include 'postTopic.inc.php';

    $r = queryForTopics($connect);
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
