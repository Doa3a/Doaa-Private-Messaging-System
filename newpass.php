<?php require_once("connection.php");
session_start();
?>
<?php
            $c_password = $c_passverif = "";
			$err_array = array('password_err1' => '', 'password_err2' => '');
			if (isset($_POST['Reset'])) {
         $c_password = clean_input($_POST["password"]);         
				$uppercase = preg_match('@[A-Z]@', $c_password);
				$lowercase = preg_match('@[a-z]@', $c_password);
				$number    = preg_match('@[0-9]@', $c_password);
				$specialChars = preg_match('@[^\w]@', $c_password);

            if (!$uppercase || !$lowercase || !$number || !$specialChars ||strlen($c_password) < '8') {  
                $err_array['password_err1'] = "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
            } else{
			$c_passverif = clean_input($_POST["passverif"]);
			if ($c_password != $c_passverif) {
                        $err_array['password_err2'] = "Ooops, passwords don't match";
                    }
			}
		if(count(array_filter($err_array)) == 0){
			
			$q="UPDATE `users` SET `password`='".hash("sha256", $c_password)."' WHERE `user_name`='".$_SESSION['user_name']."'";
				$res= mysqli_query($con,$q);
			echo '<div class="alert alert-success">
			  <strong>Success!</strong> You should <a href="login.php" class="alert-link">login again</a>.
			</div>';
}	  
			}
function clean_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
    }
	
?>		
<!DOCTYPE html>
<html>
<style> <?php require_once("styles.php");?>
.error{color:red;} </style>
<body> 
 
<div id="container"> 
		<div id="menu" align="center"> 
           <?php echo 'Welcome '.htmlentities($_SESSION['user_name'], ENT_QUOTES, 'UTF-8');?>
		      <br>Set your new Password<br>
</div>
		<form  method="post" class="form-container" >
		
		 <label for="pwd"><b>Password</b></label>
	 <input type="password" placeholder="Password" name="password" class="input" required/><br />
	 <span class="error"><?php echo $err_array['password_err1']; ?></span><br />
	     <label for="pwd"><b>Confirm Password</b></label>
	 <input type="password" placeholder="Re-type Password" name="passverif" class="input" required/><br />
	 <span class="error"><?php echo $err_array['password_err2']; ?></span><br />
	 <input type="submit" name="Reset" value="Reset" /> <br><br>

	     </form>
</div>	
</body>
<html>
