<?php
// Initialize the session
require_once("connection.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <style><?php require_once("styles.php");?></style>
</head>
<body>
   <div id="container" >  
	   <div id="menu"> 
	   <?php if (isset($_SESSION['user_name'])) {
				echo 'Welcome '.htmlentities($_SESSION['user_name'], ENT_QUOTES, 'UTF-8');}
				else{
					header("location:index.php");}?>
                             <a style ="float:right" href="Logout.php" >Logout</a>
		</div>
<div class = "section2"> 
      <a style="color:blue;">Send a new message:</a>
	 <form  action="welcome.php" class="form-container" method="post">
	 <label for="snd"><b>Send to</b></label>
		<input type="text" name="recipient" class="input" required/><br>
		<label for="snd"><b>Title</b></label>
		<input type="text" name="title" class="input"/><br>
		<label for="msg"><b>Message</b></label>
		<textarea placeholder="Type message.." name="message" required></textarea>
		<button type="submit"  name="Send" class="btn">Send</button>
	  </form>
<?php if(isset($_POST['Send'])){
		$title = $_POST['title'];
		$recipient = $_POST['recipient'];
		$message = $_POST['message'];
		$password = '3sc3RLrpd17';
		$method = 'aes-256-cbc';
		$key = substr(hash('sha256', $password, true), 0, 32);
		$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
		$encrypted = base64_encode(openssl_encrypt($message, $method, $key, OPENSSL_RAW_DATA, $iv));
		$date = date("Y-m-d");
			$q="INSERT INTO `messages` (`id`,`From_user`,`To_user`,`Title` ,`Content`, `Date_of_sent`) 
			    VALUES ('','".$_SESSION['user_name']."','".$recipient."','".$title."','".$encrypted."','".$date."' )";
			$r= mysqli_query($con,$q);
			if($r){
			echo '<section2  class="alert alert-success">
			  <strong></strong> Your message has been sucessfuly sent. Reload the page to back please.</section2>';
			} else {
				echo '<section2  class="alert alert-success">
			  <strong></strong> Something error.</section2>';
			}
}
?>
</div>
<div class = "section1"> 
<input type="button" onclick="redirinbox()" class="in-button" value="inbox"/>

<input type="button" onclick="rediroutbox()" class="out-button" value="outbox"/>

</div>

	<script>
function clean_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
}
function redirinbox() {
    window.location = "inbox.php";
  }
function rediroutbox() {
    window.location = "outbox.php";
  }
</script>

</body>
</html>
	
