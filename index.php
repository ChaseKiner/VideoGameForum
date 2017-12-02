<?php
    include('header.php');
    include('connect.php');

    $query = "SELECT CategoryId, Name, Description FROM Category";
    $result = mysqli_query($connect, $query);
    
    echo "<table>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td class='categoriesimage'>
                <img src='img/".$row["Name"].".png' height='100' width='100'>
            </td>
            <td class='categoriesleftpart'>
                <h3><a class='categoryitem' href='category.php?id=".$row["CategoryId"]."'>".$row["Name"]."</a></h3>".$row["Description"]."
            </td>
            <td class='categoriesrightpart'>
                <a href='topic.php?id='>Most Recent Topic</a> at (date)
            </td>
        </tr>";
    }
    echo "</table>";


    include('footer.php');
?>
