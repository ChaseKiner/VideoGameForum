<?php
    include('header.php');
    include('connect.php');
    include('index.inc.php');

    $query = "SELECT CategoryId, Name, Description FROM category";
    $result = mysqli_query($connect, $query);
    
    echo "<table>";
    while($row = mysqli_fetch_assoc($result)) {
        
        $recentTopic = getRecentTopic($row["CategoryId"], $connect);
        echo "<tr>
            <td class='categoriesimage'>
                <img src='img/".$row["Name"].".png' height='100' width='100'>
            </td>
            <td class='categoriesleftpart'>
                <h3><a class='categoryitem' href='category.php?id=".$row["CategoryId"]."'>".$row["Name"]."</a></h3>".$row["Description"]."
            </td>
            <td class='categoriesrightpart'>".
                $recentTopic
                ."</td>
       </tr>";
    }
    echo "</table>";


    include('footer.php');
?>
