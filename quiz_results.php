<?php
    include 'header.php';
    include 'connect.php';
	
	$rating = $_POST['rating'];
	$franchise = $_POST['franchise'];
	$game_modes = $_POST['game_modes'];
	$genres = $_POST['genres'];
	$popularity = $_POST['popularity'];
	


$sql = "Select * from videogames where  rating <= '" . $rating . "' and rating >= '" . $rating+9 . "' and franchise = '" . $franchise . "' and game_modes = '" . $game_modes . "' and genres = '" . $genres . "' and popularity = '" . $popularity . " LIMIT 1'";
        $result = mysqli_query($connect, $sql);
        
        if (mysqli_num_rows($result) == 0) {
			echo "<h3> This video game seems like a good idea however none exist now. </h3>";
        }
        else{
          $row = mysqli_fetch_assoc($result);
            echo "<h3>";
			echo  $row['Name'];
			echo "</h3>"; 
			
			echo "<h4> Summary: ";
			echo  $row['summary'];
			echo "</h4>";
			
			echo "<h4> Storyline: ";
			echo  $row['storyline'];
			echo "</h4>";
			
			
        }



    include 'footer.php'
?>
