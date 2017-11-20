<?php
    include 'header.php';
    include 'connect.php';

    $q = "SELECT Title, MessageId, Posts FROM message WHERE Category = ".$_GET['id'];
    $r = mysql_query($q);
    echo mysql_error();
    echo "<table><th>Thread</th><th>Posted by</th>";
    while($row = mysql_fetch_assoc($r)){
        $query = "SELECT FirstName, LastName FROM user WHERE userId = ".$row["Posts"];
        $res = mysql_query($query);
        $name = mysql_fetch_assoc($res);
        echo "<tr>";
        echo "<td><a href = 'topic.php?id=".$row["MessageId"]."'>".$row["Title"]."</a></td>
            <td>".$name["FirstName"]." ".$name["LastName"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
?>

<?php
    include 'footer.php'
?>