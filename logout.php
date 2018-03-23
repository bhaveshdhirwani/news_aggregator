<?php
	session_start();
	unset($_SESSION['user_status']);
	unset($_SESSION['user_name']);
	
	session_destroy();
	
		echo "Thank you"."<br>";
		echo "<a href='signIn.php'>Login again</a>";
?>