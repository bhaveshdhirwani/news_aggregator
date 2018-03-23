<html>
	<head>
	<title>
		The Ceryx
		</title>
		<link rel=stylesheet href="header.css" type="text/css">
		<link rel=stylesheet href="menu.css" type="text/css">
		<link rel=stylesheet href="content.css" type="text/css">
		<link rel=stylesheet href="footer.css" type="text/css">
	
	</head>
	
	<body>
		<!-- Head of the page -->
			<div id="header">
				<?php
					session_start();
					
					if(isset($_SESSION['user_status'])) {
						echo "<a href='check_user.php' alt=''><img src='banner.png'></a>
								<div id='userWelcome'>Welcome, ".$_SESSION['user_name']."<br><br><br>"."
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
			<!-- Navigation menu bar -->
	<div id="menu">
		<ul>
		<li><?php echo '<a class="menuAnc" href="check_user.php?'.SID.'">Home</a>'; ?>
		<li><?php echo '<a class="menuAnc" href="nation.php?'.SID.'">Nation</a>'; ?>
		<li><?php echo '<a class="menuAnc" href="world.php?'.SID.'">World</a>'; ?>
		<li><?php echo '<a class="menuAnc" href="business.php?'.SID.'">Business</a>'; ?>
		<li><?php echo '<a class="menuAnc" href="sports.php?'.SID.'">Sports</a>'; ?>
		<li><?php echo '<a class="menuAnc" href="science.php?'.SID.'">Science</a>'; ?>
		<li><?php echo '<a class="menuAnc" href="technology.php?'.SID.'">Technology</a>'; ?>
		<li><?php echo '<a class="menuAnc" href="automobiles.php?'.SID.'">Automobiles</a>'; ?>
		<li class="dropdown">
			<a href="javascript:void(0)">Entertainment</a>
			<div class="dropdownContent">
			<?php echo '<a class="menuAnc" href="gaming.php?'.SID.'">Gaming</a>'; ?>
			<?php echo '<a class="menuAnc" href="music.php?'.SID.'">Music</a>'; ?>
			<?php echo '<a class="menuAnc" href="movies.php?'.SID.'">Movies</a>'; ?>
			</div>
		<li class="dropdown">
			<a href="javascript:void(0)">More</a>
			<div class="dropdownContent">
			<?php echo '<a class="menuAnc" href="books.php?'.SID.'">Books</a>'; ?>
			<?php echo '<a class="menuAnc" href="education.php?'.SID.'">Education</a>'; ?>
			<?php echo '<a class="menuAnc" href="fitness.php?'.SID.'">Fitness</a>'; ?>
			<?php echo '<a class="menuAnc" href="food.php?'.SID.'">Food</a>'; ?>
			<?php echo '<a class="menuAnc" href="style.php?'.SID.'">Style</a>'; ?>
			<?php echo '<a class="menuAnc" href="travel.php?'.SID.'">Travel</a>'; ?>
			</div>
		</ul>
		</div>
		<div>
		<p style="color:white; font-family:Georgia; font-size:20; padding:30px; margin:80px">"The Ceryx", started in 2017, aims at providing the richest user experience to its readers. Started by 2 friends Shivani Hanji and Bhavesh Dhirwani
		as a College Web Technology Project, it now has become one of the best news website in a short span of time. Under the guidance of Mrs Ruhi Bajaj,
		the site has now crossed 1 million subscribers and has been crowned the Best Debut news blogging site.</p>
		</div>
		<!--About us and Contact us-->
		<div id="footer">
			<ul>
				<li><a class="menuAnc" href="contactUs.php">Contact us</a>
			</ul>
		</div>
	</body>
</html>