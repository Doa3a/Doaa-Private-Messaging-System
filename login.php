<?php
require_once("connection.php");
session_start();
?>
<?php
$c_user = $c_password = "";
$err_array = array('user_err' => '','password_err'  => '');
if (isset($_POST['Login'])) {
	$c_user = clean_input($_POST["user_name"]);
	$q="SELECT * FROM `users` WHERE `user_name`= '$c_user'";
    $res= mysqli_query($con,$q);
	if (mysqli_num_rows($res) > 0) {
	$c_password = clean_input($_POST["password"]);
	$c_password = hash("sha256", $c_password);
	$q="SELECT * FROM `users` WHERE `user_name`= '$c_user' AND `password`='$c_password' ";
	$res= mysqli_query($con,$q);
			if (mysqli_num_rows($res) == 0) {
				$err_array['password_err'] = "Your Username and Password do not matched ";
			}
			} else {
				$err_array['user_err'] = "This user does not exist ";
		}
		if(count(array_filter($err_array)) == 0){
			header("location:welcome.php");
			$_SESSION['user_name'] = $_POST['user_name']; 
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
           Login Form 
		</div>
<div>
	 	<br><a style="color:blue;">Please enter your credentials:</a><br><br>
	<form method="post" >
		<label for="user"><b>Username</b></label>
	     <input type="text" placeholder="user name" name="user_name" class="input" required/><br />
		 <span class="error" color="red"><?php echo $err_array['user_err']; ?></span><br />
		 <label for="pwd"><b>Password</b></label>
		 <input type="password" placeholder="Password" name="password" class="input" required/><br />
		 <span class="error"><?php echo $err_array['password_err']; ?></span><br />
		 <input type="submit" name="Login" value="Login" /> <br><br>
		 <strong style="margin-left: 5em;">Forget <a href="reset.php">password?</a></strong><br><br>
	     <strong style="margin-left: 5em;">Don't have an account <a href="register.php">Register here</a></strong>
	  </form>
</div>	
</body>
<html>