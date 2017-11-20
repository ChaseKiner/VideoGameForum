<?php
    include 'header.php';
	include 'connect.php';
	
   if (isset($_POST['submit'])) {
	   $first_name = $_POST['first_name'];
	   $last_name = $_POST['last_name'];
	   $email = $_POST['email'];
	   $password = $_POST['password'];
	   $p = $_POST['p'];  
	   $match = $_POST['match'];
        // Check for a first name:
		if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $first_name)) {
		} else {
			echo '
	  <strong>Oops!</strong> Please enter your first name!<br>';
			$errors[] = 'First Name';
		}

		// Check for a last name:
		if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $last_name)) {
		} else {
			echo '<strong>Oops!</strong> Please enter your last name!<br>';
		$errors[] = 'Last Name';
		}
		
		// Check for an email address:
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		} else {
			echo '<strong>Oops!</strong> Please enter your email address!<br>';
		$errors[] = 'Email';
		}

		// Check for a password and match against the confirmed password:
		if (preg_match ('/^\w{4,20}$/', $password) ) {
			if ($password == $p) {
			} else {
				echo '<strong>Oops!</strong> Your passwords do not match!<br>';
	$errors[] = 'Match';
			}
		} else {
			echo '<strong>Oops!</strong>Please enter a valid password!  Must be at least 4 characters and less than 20.<br>';
	$errors[] = 'Password';
		}
		if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO user (			  
				FirstName,
				LastName,
				Email,
				Password
			) VALUES (
				'$first_name',
				'$last_name',
				'$email',
				SHA1('$password')
				)";
		$r = @mysql_query($q); // Run the query.
		if ($r) { // If it ran OK.
			// Print a message:
							echo '<h3 class="panel-title">Submission to Database Successful!</h3>';
							}else { // If it did not run OK.
				// Public message:
			echo '<h2><strong>System Error!</strong></h2>
			<p class="error">There are problems with this submission.</p>';
			echo mysql_error();
			
			$ShowSubmit = 1; //show the submit button
			unset($_POST['submit']);
						
		} // End of if ($r) IF.
		} else { // Report the errors.
		unset($_POST['submit']);
		
	} // End of if (empty($errors)) IF.
		//mysql_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
else{
	$first_name = '';
	$last_name = '';
	$email = '';
	$password = '';
	$p = '';
	$match = '';
	$ShowSubmit = 0;
	}
?>
<script>
		//for double password check
		
			function checkPassword() {
				var js_p = document.getElementById("password").value;
				var js_p2 = document.getElementById("p").value;
				if (js_p == js_p2){document.getElementById("match").value = 'They match!';
				document.getElementById("match").style.backgroundColor = "lightgreen";
				document.getElementById("match").style.color = "black";}
				else {document.getElementById("match").value = 'The passwords do not match.';
				document.getElementById("match").style.backgroundColor = "#F41414";
				document.getElementById("match").style.color = "white";}
				}
		</script>

<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="corpopsform1" id="corpopsform1">
<table class="table table-striped table-condensed">
			<tr>
			   <td width="5%" align="left">&nbsp;</td> 
				 <td width="20%" align="right"></td>
			<td width="20%" align="right"><strong>First Name</strong></td>
				<td width="20%" align="left">    
						<?php 
								if (isset($_POST['submit'])) {
									echo '<span class="text-muted">'.$first_name.'</span>';
								} else {
									echo '<input type="text" class="form-control" id="first_name" name="first_name" value="'.$first_name.'" placeholder="First Name">';
								}
							?>
				</td><td width="20%" align="left">
				</td>  
				<td width="15%" align="left">&nbsp;</td>        
		     
			</tr>
				<tr>
			   <td width="5%" align="left">&nbsp;</td> 
				 <td width="20%" align="right"></td>
						<td width="20%" align="right"><strong>Last Name</strong></td>
				<td width="20%" align="left">    
						<?php 
								if (isset($_POST['submit'])) {
									echo '<span class="text-muted">'.$last_name.'</span>';
								} else {
									echo '<input type="text" class="form-control" id="last_name" name="last_name" value="'.$last_name.'" placeholder="Last Name">';
								}
							?>
				</td>
			<td width="20%" align="left">
				</td>  
				<td width="15%" align="left">&nbsp;</td>        
		     </tr>
			<tr>
			<td width="5%" align="left">&nbsp;</td> 
			<td width="20%" align="left">&nbsp;</td> 
			<td width="20%" align="right"><strong>Email</strong></td>
				<td width="20%" align="left">    
						<?php 
								if (isset($_POST['submit'])) {
									echo '<span class="text-muted">'.$email.'</span>';
								} else {
									echo '<input type="text" class="form-control" id="email" name="email" value="'.$email.'" placeholder="Email">';
								}
							?>
				</td><td width="20%" align="left">
				</td>  
				<td width="15%" align="left">&nbsp;</td>        
		     
			</tr>
				
				<tr>
			   <td width="5%" align="left">&nbsp;</td> 
				 <td width="20%" align="right"></td>
		
			<td width="20%" align="right"><strong>Password</strong></td>
				<td width="20%" align="left">    
						<?php 
								if (isset($_POST['submit'])) {
									echo '<span class="text-muted"></span>';
								} else {
									echo '<input type="password" class="form-control" id="password" name="password" value="'.$password.'" placeholder="Password" onChange="checkPassword();">';
								}
							?>
				</td><td width="20%" align="left">
				</td>  
				<td width="15%" align="left">&nbsp;</td>        
		     
			</tr>
				<tr>
			   <td width="5%" align="left">&nbsp;</td> 
				 <td width="20%" align="right"></td>
						<td width="20%" align="right"><strong>Repeat Password</strong></td>
				<td width="20%" align="left">    
						<?php 
								if (isset($_POST['submit'])) {
									echo '<span class="text-muted"></span>';
								} else {
									echo '<input type="password" class="form-control" id="p" name="p" value="'.$p.'" placeholder="Repeat Password" onChange="checkPassword();">';
								}
							?>
				</td>
			<td width="20%" align="left">
				</td>  
				<td width="15%" align="left">&nbsp;</td>        
		     
			</tr>
				<tr>
			   
			   <td width="5%" align="left">&nbsp;</td> 
				 <td width="20%" align="right"></td>
				<td width="20%" align="right"><strong>Passwords Match?</strong></td>
				<td width="20%" align="left">    
						<?php 
							if (isset($_POST['submit'])) {
								echo '<span class="text-muted">'.$match.'</span>';
							} else {
								echo '<input name="match" id="match" class="form-control" value="'.$match.'"readonly>';
							} 
							?>
				</td>  
				<td width="20%" align="left">
				</td>  
				<td width="15%" align="left">&nbsp;</td>        
		     
			</tr>
    </table>
<?php 
		if ($ShowSubmit == 1) { 
		
		echo "<br><button type=\"submit\" class=\"btn btn-primary\" value=\"Submit\" id=\"submit\" name=\"submit\"><span class=\"glyphicon glyphicon-send\"></span> Submit</button></span>";  

		}

		?>

</form> 
<?php
    include 'footer.php'
?>
