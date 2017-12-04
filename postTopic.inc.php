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
<<<<<<< HEAD
    echo '<td class = "categoriesleftpart"><a href = "topic.php?id='.$row["MessageId"].'">'.$row["Title"].'</a></td>
        <td class = "categoriesrightpart">'.$name["FirstName"].' '.$name["LastName"];
=======
    echo '<td class = "categoriesleftpart"><a href = "topic.php?id='.$row["MessageId"].'">'.$row["Title"].'</a>';
    
    $sql = "Select * from favorite where UserWhoFavorited = $_SESSION["userId"] and ParentTable = 'Topic' and FavoritedId = $row["MessageId"]";
        $result = mysqli_query($connect, $sql);
        

        if (mysqli_num_rows($result) == 0) {
          
          echo " <a href="favorite.php?id=$row["MessageId"]&parent=Topic"><i class="fa fa-star-o" aria-hidden="true"></i></a>";
		}

        else{
          
           echo "<a href="favorite.php?id=$row["MessageId"]&parent=Topic"><i class="fa fa-star" aria-hidden="true"></i></a>"; 
        }
    echo '</td>';
    echo '<td class = "categoriesrightpart">'.$name["FirstName"].' '.$name["LastName"].'</td>';
>>>>>>> 252525780b317c0b9cd4672b36597ad5136ff39c
    echo "</tr>";
}


?>
