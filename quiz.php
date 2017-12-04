<?php
    include 'header.php'
    include 'connect.php'
	
	
	
?>

<form role="form" action="quiz_results.php" method="post">
<table>
<tr>
<?php 
             	$rs_q = "SELECT franchise FROM videogames ORDER BY franchise ASC";
         		$rs_rs = mysqli_query($connect, $rs_q);
				
				//start the drop down box
				echo '<select id="franchise" name="franchise">';
				
				while($rs_row = mysqli_fetch_array($rs_rs))	{
					echo '<option value="'.$rs_row['franchise'].'">'.$rs_row['franchise'].'</option>\n';
				}
				
				//end the dropdown box
				echo '</select>';

                }
            ?>

</tr>
<tr>
<?php 
             	$rs_q = "SELECT rating FROM videogames ORDER BY rating ASC";
         		$rs_rs = mysqli_query($connect, $rs_q);
				
				//start the drop down box
				echo '<select id="rating" name="rating">';
				
				while($rs_row = mysqli_fetch_array($rs_rs))	{
					echo '<option value="'.$rs_row['rating'].'">'.$rs_row['rating'].'</option>\n';
				}
				
				//end the dropdown box
				echo '</select>';

                }
            ?>

</tr>
<tr>
<?php 
             	$rs_q = "SELECT game_modes FROM videogames ORDER BY game_modes ASC";
         		$rs_rs = mysqli_query($connect, $rs_q);
				
				//start the drop down box
				echo '<select id="game_modes" name="game_modes">';
				
				while($rs_row = mysqli_fetch_array($rs_rs))	{
					echo '<option value="'.$rs_row['game_modes'].'">'.$rs_row['game_modes'].'</option>\n';
				}
				
				//end the dropdown box
				echo '</select>';

                }
            ?>

</tr>
<tr>
<?php 
             	$rs_q = "SELECT genres FROM videogames ORDER BY genres ASC";
         		$rs_rs = mysqli_query($connect, $rs_q);
				
				//start the drop down box
				echo '<select id="genres" name="genres">';
				
				while($rs_row = mysqli_fetch_array($rs_rs))	{
					echo '<option value="'.$rs_row['genres'].'">'.$rs_row['genres'].'</option>\n';
				}
				
				//end the dropdown box
				echo '</select>';

                }
            ?>

</tr>
<tr>
<?php 
             	$rs_q = "SELECT popularity FROM videogames ORDER BY popularity ASC";
         		$rs_rs = mysqli_query($connect, $rs_q);
				
				//start the drop down box
				echo '<select id="popularity" name="popularity">';
				
				while($rs_row = mysqli_fetch_array($rs_rs))	{
					echo '<option value="'.$rs_row['popularity'].'">'.$rs_row['popularity'].'</option>\n';
				}
				
				//end the dropdown box
				echo '</select>';

                }
            ?>

</tr>




</table>
</form> 
<?php
    include 'footer.php'
?>
