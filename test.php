<?php
include('sql_helper.php');

$firstName=$_REQUEST['fname'];
$lastName=$_REQUEST['lname'];
$username=$_REQUEST['uname'];
$password=$_REQUEST['pwd'];
$gender=$_REQUEST['gender'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$checkedInterests=$_REQUEST['interests'];

$interests="";
foreach($checkedInterests as $checked)
{
	$interests=$interests.$checked.",";
}

$usernameExists=false;

$checkUsername=$obj->select("username","user","1=1");

foreach($checkUsername as $row)
{
	if($row['username']==$username)
	{
		$usernameExists=true;
		break;
	}
}

if($usernameExists)
{
	echo "Username exists. Go back and select valid username";
}
else
{
	$obj->insert("user","fname,lname,username,password,gender,phone,email,interests",
			"'$firstName','$lastName','$username','$password','$gender','$phone','$email','$interests'");
	session_start();
	$_SESSION['user_name']=$username;
	$_SESSION['password']=$password;
	$_SESSION['user_status']='logged_in';
	header('Location: check_user.php');
}			
?>

<!-- <html>
<head>
		<title>
		The Ceryx
		</title>
		<link rel=stylesheet href="header.css" type="text/css">
		<link rel=stylesheet href="menu.css" type="text/css">
		<link rel=stylesheet href="content.css" type="text/css">
		<link rel=stylesheet href="footer.css" type="text/css">
		<link rel=stylesheet href="formatSlider.css" type="text/css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="sliders.js"></script>
	</head>
<body>
<!-- Head of the page -->
			<div id="header">
				<a href="homepage.php" alt=""><img src="banner.png"></a>
			</div>
<form action="signIn.php" method="POST">
<input type="submit" class="myButton" value="Sign In">
</form>
<!--About us and Contact us-->
		<div id="footer">
			<ul>
				<li><a href="aboutUs.php">About us</a>
				<li><a href="contactUs.php">Contact us</a>
			</ul>
		</div>
</body>
</html> -->