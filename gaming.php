<html>
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
						$sql="SELECT fname FROM user WHERE username='$username'";
						$res=mysqli_query($con,$sql);
					
						while($row=mysqli_fetch_assoc($res))
						{
							$firstName=$row["fname"];
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
		<!--Sliders go here-->
		<div id="content">
			
			<div id="latestBox" style="width:400px;height:400px;margin-left:270px">
			<!-- rss-feed code --> 
<script type="text/javascript"> 
<!-- 
rssfeed_url = new Array(); 
rssfeed_url[0]="https://news.google.com/news/rss/search/section/q/video%20games/video%20games?hl=en-IN&ned=in";  
rssfeed_frame_width="800"; 
rssfeed_frame_height="400"; 
rssfeed_scroll="on"; 
rssfeed_scroll_step="4"; 
rssfeed_scroll_bar="off"; 
rssfeed_target="_blank"; 
rssfeed_font_size="12"; 
rssfeed_font_face="Georgia"; 
rssfeed_border="on"; 
rssfeed_css_url=""; 
rssfeed_title="off"; 
rssfeed_title_name=""; 
rssfeed_title_bgcolor="#3366ff"; 
rssfeed_title_color="#fff"; 
rssfeed_title_bgimage=""; 
rssfeed_footer="off"; 
rssfeed_footer_name="rss feed"; 
rssfeed_footer_bgcolor="#fff"; 
rssfeed_footer_color="#333"; 
rssfeed_footer_bgimage=""; 
rssfeed_item_title_length="50"; 
rssfeed_item_title_color="#30415d"; 
rssfeed_item_bgcolor="#9fbbc7"; 
rssfeed_item_bgimage=""; 
rssfeed_item_border_bottom="on"; 
rssfeed_item_source_icon="off"; 
rssfeed_item_date="off"; 
rssfeed_item_description="on"; 
rssfeed_item_description_length="120"; 
rssfeed_item_description_color="#666"; 
rssfeed_item_description_link_color="#333"; 
rssfeed_item_description_tag="on"; 
rssfeed_no_items="0"; 
rssfeed_cache = "6d5a48ac6a02c888d15af46fc96540ab";  
//--> 
</script> 
<script type="text/javascript" src="//feed.surfing-waves.com/js/rss-feed.js"></script> 

<!-- end rss-feed code -->
				
			</div>
			<ul>
				<li class="sliders">
				<div id="two">
					<div id="innerTwo"><p>
					<?php
							$sql="SELECT * FROM news where category='gaming'";

							$result=mysqli_query($con,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$headline[] = $row["headlines"];
									$bgPicture[] = $row["image"];
									$newsId[]= $row["id"];
								}
							}
						echo $headline[0];
					?>
					</p></div>
					<a href="newsArticleSlider.php?id=<?php echo $newsId[0]; ?>"><img src="<?php echo "$bgPicture[0]"; ?>"></a>
				</div>
				<li class="sliders">
				<div id="three">
					<div id="innerThree"><p>
					<?php
						echo $headline[1];
					?></p></div>
					<a href="newsArticleSlider.php?id=<?php echo $newsId[1]; ?>"><img src="<?php echo "$bgPicture[1]"; ?>"></a>

				</div>
			</ul>
			<ul>
				<li class="sliders">
				<div id="four">
					<div id="innerFour"><p>
					<?php
						echo $headline[2];
					?></p></div>
					<a href="newsArticleSlider.php?id=<?php echo $newsId[2]; ?>"><img src="<?php echo "$bgPicture[2]"; ?>"></a>					
				</div>
				<li class="sliders">
				<div id="five">
					<div id="innerFive"><p><?php
						echo $headline[3];
					?></p></div>
					<a href="newsArticleSlider.php?id=<?php echo $newsId[3]; ?>"><img src="<?php echo "$bgPicture[3]"; ?>"></a>
				</div>
			</ul>
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