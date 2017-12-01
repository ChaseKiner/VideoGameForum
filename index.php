<?php
    include('header.php');
    include('connect.php');

    $query = "SELECT CategoryId, Name, Description FROM Category";
    $result = mysql_query($query);
    echo mysql_error();
    
    echo "<table>";
    while($row = mysql_fetch_assoc($result)) {
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

?>
<!-- 
<table>
<tr>
    <td class="categoriesimage">
        <img src="img/PS4.png" height="100" width="100">
    </td>
    <td class="categoriesleftpart">
        <h3><a class="categoryitem" href="category.php?id=2">Playstation 4</a></h3>Discuss all things related to PS4 here
    </td>
    <td class="categoriesrightpart">
        <a href="topic.php?id=">Most Recent Topic</a> at (date)
    </td>
</tr>
<tr>
    <td class="categoriesimage">
        <img src="img/Xbox.png" height="100" width="100">
    </td>
    <td class="categoriesleftpart">
        <h3><a class="categoryitem" href="category.php?id=10">Xbox One</a></h3>Discuss all things related to Xbox here
    </td>
    <td class="categoriesrightpart">
        <a href="topic.php?id=">Most Recent Topic</a> at (date)
    </td>
</tr>
<tr>
    <td class="categoriesimage">
        <img src="img/PC.jpg" height="100" width="100">
    </td>
    <td class="categoriesleftpart">
        <h3><a class="categoryitem" href="category.php?id=7">PC</a></h3>Discuss all things related to PC gaming here
    </td>
    <td class="categoriesrightpart">
        <a href="topic.php?id=">Most Recent Topic</a> at (date)
    </td>
</tr>
<tr>
<td class="categoriesimage">
        <img src="img/Switch.png" height="100" width="100">
    </td>
    <td class="categoriesleftpart">
        <h3><a class="categoryitem" href="category.php?id=6">Nintendo Switch</a></h3>Discuss all things related to the Nintendo Switch here
    </td>
    <td class="categoriesrightpart">
        <a href="topic.php?id=">Most Recent Topic</a> at (date)
    </td>
</tr>
</table> -->



<?php
    include('footer.php');
?>