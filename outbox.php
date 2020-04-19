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
	  <div id="menu" align="center"> 
	   <?php if (isset($_SESSION['user_name'])) {
				echo 'Welcome '.htmlentities($_SESSION['user_name'], ENT_QUOTES, 'UTF-8');}
				else{
					header("location:index.php");
				}?>
		</div>
<br><a style="color:blue;">List of your sent messages:</a><br><br>
			<table class="fixed" border="1px" >
			<tbody>
				<col width="50px" />
				<col width="200px" />
				<col width="60px" />
				<col width="50px" />
				<tr>
					<th>To</th>
					<th>Content</th> 
					<th>Title</th>
					<th>Date</th>
				</tr>
		     </tbody>
<?php
		$password = '3sc3RLrpd17';
		$method = 'aes-256-cbc';
		$key = substr(hash('sha256', $password, true), 0, 32);
		$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
		$sql = "SELECT * FROM `messages` WHERE `From_user`= '".$_SESSION['user_name']."'";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result))
		{
		  echo "<tr>";
		  echo "<td>" . $row['To_user'] . "</td>";
		  echo "<td>" . openssl_decrypt(base64_decode($row['Content']), $method, $key, OPENSSL_RAW_DATA, $iv). "</td>";
		  echo "<td>" . $row['Title'] . "</td>";
		  echo "<td>" . $row['Date_of_sent'] . "</td>";
		  echo "</tr>";
		  }
		echo "</table>";
?>		
</div>
<button class = "cancel-button" onclick="goBack()" style = "position:relative; left:370px; bottom:20px; background-color:darkblue;  padding: 5px 9px;">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>