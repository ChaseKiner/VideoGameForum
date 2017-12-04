<?php
    include 'header.php';
    include 'connect.php';
	
	
	
?>

<form role="form" action="quiz_results.php" method="post">
<table>
<tr>
	<td> Franchise </td> <td><?php 
             	$rs_q = "SELECT DISTINCT franchise FROM videogames ORDER BY franchise ASC";
         		$rs_rs = mysqli_query($connect, $rs_q);
				
				//start the drop down box
				echo '<select id="franchise" name="franchise">';
				
				while($rs_row = mysqli_fetch_array($rs_rs))	{
					echo '<option value="'.$rs_row['franchise'].'">'.$rs_row['franchise'].'</option>\n';
				}
				
				//end the dropdown box
				echo '</select>';

            ?>
	</td> 
</tr>
<tr><td> Rating </td> <td>
<?php 
             	echo '<select id="rating" name="rating">';
			echo '<option value="50">50-59</option>\n';
echo '<option value="60">60-69</option>\n';
echo '<option value="70">70-79</option>\n';
echo '<option value="80">80-89</option>\n';
echo '<option value="90">90-100</option>\n';
			
		echo '</select>';

            ?>
	</td>
</tr>
<tr><td> Game Modes </td> <td>
<?php 
             	$rs_q = "SELECT DISTINCT game_modes FROM videogames ORDER BY game_modes ASC";
         		$rs_rs = mysqli_query($connect, $rs_q);
				
				//start the drop down box
				echo '<select id="game_modes" name="game_modes">';
				
				while($rs_row = mysqli_fetch_array($rs_rs))	{
					echo '<option value="'.$rs_row['game_modes'].'">'.$rs_row['game_modes'].'</option>\n';
				}
				
				//end the dropdown box
				echo '</select>';

            ?>
	</td>
</tr>
<tr><td> Genre </td> <td>
<?php 
             	$rs_q = "SELECT  DISTINCT genres FROM videogames ORDER BY genres ASC";
         		$rs_rs = mysqli_query($connect, $rs_q);
				
				//start the drop down box
				echo '<select id="genres" name="genres">';
				
				while($rs_row = mysqli_fetch_array($rs_rs))	{
					echo '<option value="'.$rs_row['genres'].'">'.$rs_row['genres'].'</option>\n';
				}
				
				//end the dropdown box
				echo '</select>';

            ?>
	</td>
</tr>
<tr><td> Popularity </td> <td>
<?php 
             	$rs_q = "SELECT DISTINCT popularity FROM videogames ORDER BY popularity ASC";
         		$rs_rs = mysqli_query($connect, $rs_q);
				
				//start the drop down box
				echo '<select id="popularity" name="popularity">';
				
				while($rs_row = mysqli_fetch_array($rs_rs))	{
					echo '<option value="'.$rs_row['popularity'].'">'.$rs_row['popularity'].'</option>\n';
				}
				
				//end the dropdown box
				echo '</select>';

            ?>

</tr>



	<tr> <td> </td> <td> <input type="submit" value="Submit"> </td> 
</table>
</form> 
<?php
    include 'footer.php';
?>
