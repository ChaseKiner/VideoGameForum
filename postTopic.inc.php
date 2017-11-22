<?php
function postTopic($row) {
    $query = "SELECT FirstName, LastName FROM user WHERE userId = ".$row["Posts"];
    $res = mysql_query($query);
    $name = mysql_fetch_assoc($res);
    echo "<tr>";
    echo '<td class = "categoriesleftpart"><a href = "topic.php?id='.$row["MessageId"].'">'.$row["Title"].'</a></td>
        <td class = "categoriesrightpart">'.$name["FirstName"].' '.$name["LastName"].'</td>';
    echo "</tr>";
}

$q = "SELECT Title, MessageId, Posts FROM message WHERE Category = ".$_GET['id'];
$r = mysql_query($q);
echo mysql_error();
?>