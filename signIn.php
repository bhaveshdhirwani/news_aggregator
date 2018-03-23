<html>
	<head>
	<title>
		Sign in
		</title>
		<link rel=stylesheet href="header.css" type="text/css">
		<link rel=stylesheet href="content.css" type="text/css">
		<link rel=stylesheet href="footer.css" type="text/css">
	
	</head>
	
	<body>
		<!-- Head of the page -->
			<div id="header">
				<a href="homepage.php" alt=""><img src="banner.png"></a>
				<ul id="inup">
				<li><a class="menuAnc" href="signUp.php">Sign up</a>
				</ul>
			</div>
			<div>
			<form id="loginForm" action="check_user.php" method="post">
			<p class="loginText">Username:</p><input type="text" class="loginFields" name="uname"/><br><br>
			<p class="loginText">Password:</p><input type="password" class="loginFields" name="password"/><br><br>
			<input type="submit" id="loginButton" class="myButton" value="Sign In"/>
			<?php
			$reasons = array("password" => "Wrong Username or Password", "blank" => "You have left one or more fields blank.");
			if (@$_GET["loginFailed"]) 
			echo $reasons[$_GET["reason"]]; 
			?>
			</form>
			</div>
			<!--About us and Contact us-->
		<div id="footer">
			<ul>
				<li><a class="menuAnc" href="aboutUs.php">About us</a>
				<li><a class="menuAnc" href="contactUs.php">Contact us</a>
			</ul>
		</div>
	</body>
</html>