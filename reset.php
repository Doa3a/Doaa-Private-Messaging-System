<?php require_once("connection.php");
session_start();
?>
<?php
			$c_user = $c_email = "";
			$err_array = array('user_err' => '','email_err' => '');
			if (isset($_POST['Submit'])) {
	        
			$c_user = clean_input($_POST["user_name"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$c_user)) {
			$err_array['user_err'] = 'Only letters and white space allowed';}
			
		    $c_email = clean_input($_POST["Email"]);
            if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $c_email)) {
			$err_array['email_err'] = 'Not a valid email';}
			
			$sql_u = "SELECT * FROM `users` WHERE `user_name`='$c_user' AND `Email`='$c_email'";
			$res_u = mysqli_query($con, $sql_u);
			if (mysqli_num_rows($res_u) == 0) {
			$err_array['email_err'] = 'No record found with the supplied data';}
			if(count(array_filter($err_array)) == 0){
			header("location:newpass.php");
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
		Resetting password   
		</div>
<div>
		<form method="post" class="form-container" >
		<br/><a style="color:blue;">Please enter your user name and the registered E-mail address:</a><br/><br/>
		 <label for="user"><b>Username</b></label>
		 <input type="text" placeholder="user name" name="user_name" class="input" required/><br/>
	     <span class="error"><?php echo $err_array['user_err']; ?></span><br/>
		<label for="email"><b>E-mail</b></label>
		 <input type="email" placeholder="E-mail" name="Email" class="input" required/><br/>
		 <span class="error"><?php echo $err_array['email_err']; ?></span><br><br>
		<input type="submit" name="Submit" style="margin-left: 10px;" value="Submit" /> 
<button class = "cancel-button" onclick="goBack()" style="margin-left: 10px; background-color:darkblue">Cancel</button>

	    </form>
</div>	

<script>
function goBack() {
  window.history.back();
}
</script>
</body>
<html>
