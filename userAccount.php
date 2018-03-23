<html>
	<head>
	<title>
		The Ceryx
		</title>
		<link rel=stylesheet href="header.css" type="text/css">
		<link rel=stylesheet href="content.css" type="text/css">
		<link rel=stylesheet href="footer.css" type="text/css">
	
	</head>
	
	<body>
		<!-- Head of the page -->
			<div id="header">
				<?php
					session_start();
					
					$servername="localhost";
						$username="root";
						$password="12345";
						$dbname="ceryx";

						/*Create connection*/
						$con=mysqli_connect($servername,$username,$password,$dbname);

						if(!$con) {
							die("Connection failed: ".mysqli_connect_error());
						}
					
					if(isset($_SESSION['user_status'])) {
						$username=$_SESSION['user_name'];
						$sql="SELECT * FROM user WHERE username='$username'";
						$res=mysqli_query($con,$sql);
					
						while($row=mysqli_fetch_assoc($res))
						{
							$firstName=$row["fname"];
							$password=$row["password"];
							$email=$row["email"];
							$phone=$row["phone"];
							$lastName=$row["lname"];
						}
						echo "<a href='check_user.php' alt=''><img src='banner.png'></a>
								<div id='userWelcome'>Welcome, ".$firstName."<br><br><br>"."
								<ul id='outview'>
								<li><a class='menuAnc' href='userAccount.php'>View your account</a></li>
								<li><a class='menuAnc' href='homepage.php'>Log out</a></li>
							</ul></div>";
					}
					else {
						echo "<a href='homepage.php' alt=''><img src='banner.png'></a>
								<ul id='inup'>
								<li><a class='menuAnc' href='signIn.php'>Sign in</a>
								<li><a class='menuAnc' href='signUp.php'>Sign up</a>
							</ul>";
					}
				?>
			</div>
			<div id="userAcc">
			
			<?php
			
				echo "<br><br>";
				echo "<b> Name: </b>".$firstName." ".$lastName."<br><br>";
				echo "<b> Username: </b>".$username."<br><br>";
				echo "<b> Email id: </b>".$email."<br><br>";
				echo "<b> Phone: </b>".$phone."<br><br>";
				
			?>
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