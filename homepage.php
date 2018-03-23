<?php
	session_start();
	unset($_SESSION['user_status']);
	unset($_SESSION['user_name']);
	
	session_destroy();
?>
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
		<script src="sliders.js"></script>
	</head>
	<body>
		<!-- Head of the page -->
			<div id="header">
				<a href="homepage.php" alt=""><img src="banner.png"></a>
				<ul id="inup">
				<li><a class="menuAnc" href="signIn.php">Sign in</a>
				<li><a class="menuAnc" href="signUp.php">Sign up</a>
				</ul>
			</div>
		<!-- Navigation menu bar -->
		<div id="menu">
		<ul>
		<li><a class="menuAnc" href="homepage.php">Home</a>
		<li><a class="menuAnc" href="nation.php">Nation</a>
		<li><a class="menuAnc" href="world.php">World</a>
		<li><a class="menuAnc" href="business.php">Business</a>
		<li><a class="menuAnc" href="sports.php">Sports</a>
		<li><a class="menuAnc" href="science.php">Science</a>
		<li><a class="menuAnc" href="technology.php">Technology</a>
		<li><a class="menuAnc" href="automobiles.php">Automobiles</a>
		<li class="dropdown">
			<a class="menuAnc" href="javascript:void(0)">Entertainment</a>
			<div class="dropdownContent">
			<a class="menuAnc" href="gaming.php">Gaming</a>
			<a class="menuAnc" href="music.php">Music</a>
			<a class="menuAnc" href="movies.php">Movies</a>
			</div>
		<li class="dropdown">
			<a class="menuAnc" href="javascript:void(0)">More</a>
			<div class="dropdownContent">
			<a class="menuAnc" href="books.php">Books</a>
			<a class="menuAnc" href="education.php">Education</a>
			<a class="menuAnc" href="fitness.php">Fitness</a>
			<a class="menuAnc" href="food.php">Food</a>
			<a class="menuAnc" href="style.php">Style</a>
			<a class="menuAnc" href="travel.php">Travel</a>
			</div>
		</ul>
		</div>
		<!--Sliders go here-->
		<div id="content">
			<span id="prev">&#171;</span>
			<div id="myNewsTicker">
						<?php
							$servername="localhost";
							$username="root";
							$password="12345";
							$dbname="ceryx";

							/*Create connection*/
							$conn=mysqli_connect($servername,$username,$password,$dbname);

							if(!$conn) {
								die("Connection failed: ".mysqli_connect_error());
							}
						?>
				<div class="newsTicker active">
					<?php
							$sql="SELECT * FROM slideshownews where id=51";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$newsHeadline = $row["headlines"];
									$bgPicture=$row["image"];
									$newsId=$row["id"];
								}	
							}
					?>
					<a href="newsArticle.php?id=<?php echo $newsId ?>"><img src="<?php echo "$bgPicture"; ?>" alt="" id="1"></img>
					<span class="tag"><?php echo $newsHeadline; ?></span></a>
				</div>
				
				<div class="newsTicker">
					<?php
							$sql="SELECT * FROM slideshownews where id=48";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$newsHeadline = $row["headlines"];
									$bgPicture=$row["image"];
									$newsId=$row["id"];
								}	
							}
					?>
					<a href="newsArticle.php?id=<?php echo $newsId ?>"><img src="<?php echo "$bgPicture"; ?>" alt="" id="2"></img>
					<span class="tag"><?php echo $newsHeadline; ?></span></a>
				</div>
				
				<div class="newsTicker">
					<?php
							$sql="SELECT * FROM slideshownews where id=3";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$newsHeadline = $row["headlines"];
									$bgPicture=$row["image"];
									$newsId=$row["id"];
								}
							}
					?>
					<a href="newsArticle.php?id=<?php echo $newsId ?>"><img src="<?php echo "$bgPicture"; ?>" alt="" id="3"></img>
					<span class="tag"><?php echo $newsHeadline; ?></span></a>
				</div>
				
				<div class="newsTicker">
					<?php
							$sql="SELECT * FROM slideshownews where id=9";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) 
								{	$newsHeadline = $row["headlines"];
									$bgPicture=$row["image"];
									$newsId=$row["id"];
								}
							}
					?>
					<a href="newsArticle.php?id=<?php echo $newsId ?>"><img src="<?php echo "$bgPicture"; ?>" alt="" id="4"></img>
					<span class="tag"><?php echo $newsHeadline; ?></span></a>
				</div>
				
				<div class="newsTicker">
					<?php
							$sql="SELECT * FROM slideshownews where id=12";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$newsHeadline = $row["headlines"];
									$bgPicture=$row["image"];
									$newsId=$row["id"];
								}
							}
					?>
					<a href="newsArticle.php?id=<?php echo $newsId ?>"><img src="<?php echo "$bgPicture"; ?>" alt="" id="5"></img>
					<span class="tag"><?php echo $newsHeadline; ?></span></a>
				</div>
			</div>
			<span id="next">&#187;</span>
			
			<div id="latestBox" style="width:360px;height:400px;float:right">
			<!-- rss-feed code --> 
<script type="text/javascript"> 
<!-- 
rssfeed_url = new Array(); 
rssfeed_url[0]="https://news.google.com/news/rss/headlines/section/topic/NATION.en_in/India?ned=in&hl=en-IN";  
rssfeed_frame_width="360"; 
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
rssfeed_cache = "d571a6938a1cb404087af7ebe227556f"; 
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
							$sql="SELECT * FROM news where id=1";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									echo $row["headlines"];
									$bgPicture = $row["image"];
									$newsId=$row["id"];
								}
							}
					?>
					</p></div>
					<a href="newsArticleSlider.php?id=<?php echo $newsId ?>"><img src="<?php echo "$bgPicture"; ?>"></a>
				</div>
				<li class="sliders">
				<div id="three">
					<div id="innerThree"><p>
					<?php
							$sql="SELECT * FROM news where id=8";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									echo $row['headlines'];
									$bgPicture = $row["image"];
									$newsId=$row["id"];
								}
							}
					?></p></div>
					<a href="newsArticleSlider.php?id=<?php echo $newsId; ?>"><img src="<?php echo "$bgPicture"; ?>"></a>

				</div>
			</ul>
			<ul>
				<li class="sliders">
				<div id="four">
					<div id="innerFour"><p>
					<?php
							$sql="SELECT * FROM news where id=60";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									echo $row['headlines'];
									$bgPicture = $row["image"];
									$newsId=$row["id"];
								}
							}
					?></p></div>
					<a href="newsArticleSlider.php?id=<?php echo $newsId; ?>"><img src="<?php echo "$bgPicture"; ?>"></a>					
				</div>
				<li class="sliders">
				<div id="five">
					<div id="innerFive"><p><?php
							$sql="SELECT * FROM news where id=40";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									echo $row['headlines'];
									$bgPicture = $row["image"];
									$newsId=$row["id"];
								}
							}
					?></p></div>
					<a href="newsArticleSlider.php?id=<?php echo $newsId ?>"><img src="<?php echo "$bgPicture"; ?>"></a>
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