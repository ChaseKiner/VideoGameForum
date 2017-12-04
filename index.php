<?php
    include('header.php');
    include('connect.php');
    include('index.inc.php');

    $query = "SELECT CategoryId, Name, Description FROM category ORDER BY categoryId";
    $result = mysqli_query($connect, $query);

    $recentTopics = getRecentTopics($connect);
    
    echo "<table>";
    while($row = mysqli_fetch_assoc($result)) {

        if($recentTopic = mysqli_fetch_assoc($recentTopics)){
            $recentReplier = mysqli_fetch_assoc(mysqli_query($connect, "SELECT FirstName, LastName FROM user WHERE userId = ".$recentTopic["Sends"]));
        }
        echo "<tr>
            <td class='categoriesimage'>
                <img src='img/".$row["Name"].".png' height='100' width='100'>
            </td>
            <td class='categoriesleftpart'>
                <h3><a class='categoryitem' href='category.php?id=".$row["CategoryId"]."'>".$row["Name"]."</a>";
                $sql = "Select * from favorite where UserWhoFavorited = ".$_SESSION["userId"]." and ParentTable = 'Category' and FavoritedId = ".$row["CategoryId"];
                $res = mysqli_query($connect, $sql);


                if (mysqli_num_rows($res) == 0) {

                   echo "<a href='favorite.php?id=".$row["CategoryId"]."&parent=Category'><i class='fa fa-star-o' aria-hidden='true'></i></a>";
                }

                else{

                   echo "<a href='favorite.php?id=".$row["CategoryId"]."&parent=Category'><i class='fa fa-star' aria-hidden='true'></i></a>"; 
                }
               echo " </h3>".$row["Description"]."
            </td>
            <td class='categoriesrightpart'>
                <a href='topic.php?id=".$recentTopic["Attached"]."'>".$recentTopic["title"]."</a>
                <br> <font size='-2'> most recent reply by " . $recentReplier["FirstName"] . " " . $recentReplier["LastName"]
                ."<br> on " . $recentTopic["DatePosted"] 
                ."</font></td>
       </tr>";
    }
    echo "</table>";


    include('footer.php');
?>
