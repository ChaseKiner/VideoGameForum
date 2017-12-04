<?php


function postTopic($row, $connect) {
    $query = "SELECT FirstName, LastName FROM user WHERE userId = ".$row["Posts"];
    $res = mysqli_query($connect, $query);
    $name = mysqli_fetch_assoc($res);
    echo "<tr>";
    echo '<td class = "categoriesleftpart"><a href = "topic.php?id='.$row["MessageId"].'">'.$row["Title"].'</a></td>';
    
    $sql = "Select * from favorite where UserWhoFavorited = $_SESSION["userId"] and ParentTable = 'Topic' and FavoritedId = $row["MessageId"]";
        $result = mysqli_query($connect, $sql);
        

        if (mysqli_num_rows($result) == 0) {
          
          echo " <a href="favorite.php?id=$row["MessageId"]&parent=Topic"><i class="fa fa-star-o" aria-hidden="true"></i></a>";
		}

        else{
          
           echo "<a href="favorite.php?id=$row["MessageId"]&parent=Topic"><i class="fa fa-star" aria-hidden="true"></i></a>"; 
        }
    
    echo '<td class = "categoriesrightpart">'.$name["FirstName"].' '.$name["LastName"].'</td>';
    echo "</tr>";
}

$q = "SELECT Title, MessageId, Posts FROM message WHERE Category = ".$_GET['id'];
$r = mysqli_query($connect, $q);


?>
