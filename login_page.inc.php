<?php
    include 'header.php';
    
    
    // Start output buffering:
ob_start();

// Initialize a session:
session_unset();
?>
<form class="form" action="login.php" method="post">
			
            <div class="input-group">
              <div class="input-group-addon"> Email</div>
              <input name="email" class="form-control" type="text" placeholder="Email">
            </div>
            
            <br>
            
            <div class="input-group">
              <div class="input-group-addon"> Password</div>
              <input name="pass" class="form-control" type="password" placeholder="Password">
            </div>
            
            <input type="hidden" name="submitted" value="TRUE" />
            <br>
            
            
            <div class="input-group">
              <button type="submit" name="submit"> Login</button>&nbsp;
              
            
            </div>
			</form>
      <?php
    include 'footer.php'
?>
