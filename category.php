<?php
    include 'header.php';
    include 'connect.php';

    $q = "SELECT Title, MessageId, Posts FROM message WHERE Category = ".$_GET['id'];
    $r = mysql_query($q);
    echo mysql_error();
    echo "<table><th width = '80%'>Thread</th><th>Posted by</th width = '20%'>";
    if(mysql_num_rows($r)==0){
        echo '<tr><td>No topics in this category yet</td></tr>';
    }
    while($row = mysql_fetch_assoc($r)){
        $query = "SELECT FirstName, LastName FROM user WHERE userId = ".$row["Posts"];
        $res = mysql_query($query);
        $name = mysql_fetch_assoc($res);
        echo "<tr>";
        echo '<td class = "categoriesleftpart"><a href = "topic.php?id='.$row["MessageId"].'">'.$row["Title"].'</a></td>
            <td class = "categoriesrightpart">'.$name["FirstName"].' '.$name["LastName"].'</td>';
        echo "</tr>";
    }
    echo "</table>";
    echo"<br>";
    echo '<a class="item" href="create_topic.php?id='.$_GET['id'].'">Create a topic</a>';
?>

<?php
    include 'footer.php'
?>