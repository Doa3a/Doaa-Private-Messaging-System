<?php require_once("connection.php");?>
<?php
            $c_user = $c_email = $c_password = $c_passverif = "";
			$err_array = array('user_err' => '','email_err' => '', 'password_err1' => '', 'password_err2' => '');
			if (isset($_POST['Register'])) {
		$c_user = clean_input($_POST["user_name"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$c_user)) {
			$err_array['user_err'] = 'Only letters and white space allowed';}
			else{
			$sql_u = "SELECT * FROM `users` WHERE `user_name`='$c_user'";
			$res_u = mysqli_query($con, $sql_u);
			if (mysqli_num_rows($res_u) > 0) {
			$err_array['user_err'] = 'Sorry... username already taken';}}
				
		$c_email = clean_input($_POST["Email"]);
            if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $c_email)) {
			$err_array['email_err'] = 'Not a valid email';}
			else{
			$sql_u = "SELECT * FROM `users` WHERE `Email`='$c_email'";
			$res_u = mysqli_query($con, $sql_u);
			if (mysqli_num_rows($res_u) > 0) {
			$err_array['email_err'] = 'Sorry... Email address already taken';}}
                                 
  
         $c_password = clean_input($_POST["password"]);         
				$uppercase = preg_match('@[A-Z]@', $c_password);
				$lowercase = preg_match('@[a-z]@', $c_password);
				$number    = preg_match('@[0-9]@', $c_password);
				$specialChars = preg_match('@[^\w]@', $c_password);
		
            if (!$uppercase || !$lowercase || !$number || !$specialChars ||strlen($c_password) < '8') {  
                $err_array['password_err1'] = "Must contain at least one number and one uppercase and lowercase letter, and the total length is at least 8";
            }
			$c_passverif = clean_input($_POST["passverif"]);
				if ($c_password != $c_passverif) {
                        $err_array['password_err2'] = "Ooops, passwords don't match";
                    }

		if(count(array_filter($err_array)) == 0){
			$q="INSERT INTO `users` (`id`,`user_name`,`password`,`Email` ) 
			    VALUES ('','".$c_user."','".hash("sha256", $c_password)."','".$c_email."' )";
			$r= mysqli_query($con,$q);
			echo '<div class="alert alert-success">
			  <strong>Successfully registered!</strong> You can <a href="login.php" class="alert-link">login now</a>.
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
           Registeration Form 
		</div>
		
		<a style="color:blue;">Please fill the following form to sign up:</a><br/>
		<form method="post">
	 <input type="text" placeholder="user name" name="user_name" class="input" required/><br/>
	 <span class="error"><?php echo $err_array['user_err']; ?></span><br/>
	 <input type="email" placeholder="E-mail address" name="Email" class="input" required/><br/>
	 <span class="error"><?php echo $err_array['email_err']; ?></span><br/>
	 <input type="password" placeholder="Password" name="password" class="input" required/><br/>
	 <span class="error"><?php echo $err_array['password_err1']; ?></span><br/>
	 <input type="password" placeholder="Re-type Password" name="passverif" class="input" required/><br/>
	 <span class="error"><?php echo $err_array['password_err2']; ?></span><br/>
	 <input type="submit" name="Register" value="Register" /><br/>
	 <strong style="margin-left: 5em;">Already have an account? <a href="login.php">Login here</a></strong><br><br>

	     </form>
</div>	

</body>
<html>
