<?php
    include 'header.php';
    include 'connect.php';
    
    /// Query for retrieving topics
    include 'postTopic.inc.php';

    $r = queryForTopics($connect);
    /// Begin table creation
    echo "<table><th width = '80%'>Thread</th><th>Posted by</th width = '20%'>";
    echo "<th width = '80%'><form role='search' action='category_search.php' method='get'>
        <input type='text' class='form-control' placeholder='Search terms' name='SValue'> <input type='hidden' name='category' value='.$_GET['id'].'> <button type='submit'><i class='fa fa-search' aria-hidden="true"></i> Go!</button>
      </form></th><th></th width = '20%'>";
    while($row = mysqli_fetch_assoc($r)){
        postTopic($row, $connect);
    }
    echo "</table>";
    echo"<br>";
    echo '<a class="item" href="create_topic.php?id='.$_GET['id'].'">Create a topic</a>';

    include 'footer.php'
?>
