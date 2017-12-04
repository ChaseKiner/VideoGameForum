<?php
    include("header.php");
    ?>
    
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload: <br>
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php
    include("footer.php");
    ?>