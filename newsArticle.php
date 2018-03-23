<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>
		The Ceryx
		</title>
		<link rel=stylesheet href="header.css" type="text/css">
		<link rel=stylesheet href="menu.css" type="text/css">
		<link rel=stylesheet href="content.css" type="text/css">
		<link rel=stylesheet href="footer.css" type="text/css">
		<link rel=stylesheet href="formatSlider.css" type="text/css">
	</head>
	<body>
		<!-- Head of the page -->
			<div id="header">
				
				<?php
				ini_set('session.cache_limiter','public');
				session_cache_limiter(false);
				session_start();
				
				$con=mysqli_connect('localhost','root','12345','ceryx');
				
				if(isset($_SESSION['user_status'])) {
					echo "<a href='check_user.php' alt=''><img src='banner.png'></a>";
					$username=$_SESSION['user_name'];
					$sql="SELECT fname FROM user WHERE username='$username'";
					$result=mysqli_query($con,$sql);
					
					while($row=mysqli_fetch_assoc($result))
					{
						$firstName=$row['fname'];
					}
					
					echo "<div id='userWelcome'>Welcome, ".$firstName."<br><br><br>"."
								<ul id='outview'>
								<li><a class='menuAnc' href='userAccount.php'>View your account</a></li>
								<li><a class='menuAnc' href='homepage.php'>Log out</a></li>
							</ul></div>";
					$username=$_SESSION['user_name'];
					$password=$_SESSION['password'];
				}
				else {
						echo "
								<a href='homepage.php' alt=''><img src='banner.png'></a>
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
		<li><?php if(isset($_SESSION['user_status'])){ echo "<a href='check_user.php?'.SID.'>Home</a>'"; } else { echo "<a href='homepage.php?'.SID.'>Home</a>'"; } ?>
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
		<div id="newsArt">
		<?php
			
		$id=$_GET['id'];
		$sql="SELECT * FROM slideshownews WHERE id='$id'";
		$result=mysqli_query($con,$sql);
		while($row=mysqli_fetch_assoc($result))
		{
				echo "<p align='center' style='font-size:60px;color:red'>".$row['headlines']."</p>";
				echo "<p><center><img src=".$row['image']." style='width:500px;height:300px'></img></center></p>";
				echo "<p>".$row['newstext']."</p>";
				//style='font-size:20px;margin:40px;text-align:justify'
		}
		?>
		</div>
		<form action="insertSlideshowComment.php" method="POST">
		<div id="commText">Comments:<br>

		<?php
			include("sql_helper.php");
		
			$_SESSION['postid']=$id;
			
			if(isset($_SESSION['user_status'])) {
			$res=$obj->select("fname,lname","user","username='$username'");
		
			if(count($res)>0)
			{
				foreach($res as $row)
				{
					echo $row['fname']." ".$row['lname']." :<br>";
				}
			}
	
			echo "<p>"."<textarea name='commentText' rows='5' cols='60'></textarea><br>
			<input type='submit' class='myButton' value='Post'><br><br>"."</p>";
			}
			
			$res=$obj->select("fname,lname,comment","comments,user","user.username=comments.username AND post_id=$id");
			if(count($res)>0)
			{
				foreach($res as $row)
				{
					echo "<div>"."<b>".$row['fname']." ".$row['lname']."</b><br>".$row['comment']."</div><br>";
				}
			}
		?>
		</div>
		</form>
		
		<!--About us and Contact us-->
		<div id="footer">
			<ul>
				<li><a class="menuAnc" href="aboutUs.php">About us</a>
				<li><a class="menuAnc" href="contactUs.php">Contact us</a>
			</ul>
		</div>
	</body>
</html>