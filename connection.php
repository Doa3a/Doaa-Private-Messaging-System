 <?php
/* if ($con= mysqli_connect("localhost", "root", "", "messages")){
	echo 'Connected to Database server ... <br /><br />';
	if($database = mysqli_select_db($con, "messages")){
		echo 'Database has been selected ... <br />';
	} else {
		echo 'Database was not found ... <br /><br />';
	}
	} else{
		echo 'Unable to connect to MYSQL server... <br />';
		
	} */
	
	$con= mysqli_connect("localhost", "root", "", "messages");
	function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?> 
