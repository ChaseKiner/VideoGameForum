<?php 
$parent = $_GET['parent'];
$id = $_GET['id']; 
$user = $_SESSION["userId"];

       $sql = "Select * from favorite where UserWhoFavorited = $user and ParentTable = '" . $parent . "' and FavoritedId = $id";
        $result = mysqli_query($connect, $sql);
        

        if (mysqli_num_rows($result) == 0) {
        
            $sql = "INSERT INTO favorite(ParentTable, FavoritedId, UserWhoFavorited)
            VALUES('" . $parent . "',
                    '". $id ."',
                    ".$user."";
            $result = mysqli_query($connect, $sql);
        }

        else{
          
            $sql = "DELETE FROM favorite where UserWhoFavorited = $user and ParentTable = '" . $parent . "' and FavoritedId = $id";
            $result = mysqli_query($connect, $sql);       
        }

header('Location: ' . $_SERVER['HTTP_REFERER']);

?> 
