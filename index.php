<?php
    include('header.php');
    include('connect.php');

    $query = "SELECT CategoryId, Name, Description FROM category";
    $result = mysqli_query($connect, $query);
    
    echo "<table>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td class='categoriesimage'>
                <img src='img/".$row["Name"].".png' height='100' width='100'>
            </td>
            <td class='categoriesleftpart'>
                <h3><a class='categoryitem' href='category.php?id=".$row["CategoryId"]."'>".$row["Name"]."</a>";
                $sql = "Select * from favorite where UserWhoFavorited = $_SESSION["userId"] and ParentTable = 'Category' and FavoritedId = $row["CategoryId"]";
                $result = mysqli_query($connect, $sql);


                if (mysqli_num_rows($result) == 0) {

                   echo "<a href="favorite.php?id=$row["CategoryId"]&parent=Category"><i class="fa fa-star-o" aria-hidden="true"></i></a>";
                }

                else{

                   echo "<a href="favorite.php?id=$row["CategoryId"]&parent=Category"><i class="fa fa-star" aria-hidden="true"></i></a>"; 
                }
               echo " </h3>".$row["Description"]."
            </td>
            <td class='categoriesrightpart'>
                <a href='topic.php?id='>Most Recent Topic</a> at (date)
            </td>
        </tr>";
    }
    echo "</table>";


    include('footer.php');
?>
