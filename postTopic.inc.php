<?php
function queryForTopics($connect) {
    $q = "SELECT Title, MessageId, Posts 
        FROM message 
        WHERE Category = ".$_GET['id'];
    $r = mysqli_query($connect, $q);
    return $r;
}

function postTopic($row, $connect) {
    $query = "SELECT FirstName, LastName FROM user WHERE userId = ".$row["Posts"];
    $res = mysqli_query($connect, $query);
    $name = mysqli_fetch_assoc($res);
    echo "<tr>";
    echo '<td class = "categoriesleftpart"><a href = "topic.php?id='.$row["MessageId"].'">'.$row["Title"].'</a></td>
        <td class = "categoriesrightpart">'.$name["FirstName"].' '.$name["LastName"];
    echo "</tr>";
}


?>
