<?php
    include 'header.php';
    include 'connect.php';
    
    /// Query for retrieving topics
    include 'postTopic.inc.php';

    /// Begin table creation
    echo "<table><th width = '80%'>Thread</th><th>Posted by</th width = '20%'>";
    if(mysql_num_rows($r)==0){
        echo '<tr><td>No topics in this category yet</td></tr>';
    }
    
    while($row = mysql_fetch_assoc($r)){
        postTopic($row);
    }
    echo "</table>";
    echo"<br>";
    echo '<a class="item" href="create_topic.php?id='.$_GET['id'].'">Create a topic</a>';

    include 'footer.php'
?>