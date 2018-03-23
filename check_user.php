
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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="sliders.js"></script>
	</head>
	<body>
		<!-- Head of the page -->
			<div id="header">
				<a href="#" alt=""><img src="banner.png"></a>
				
				<?php
				ini_set('session.cache_limiter','public');
				session_cache_limiter(false);
				session_start();
				
				$con=mysqli_connect('localhost','root','12345','ceryx');
				
				if(isset($_SESSION['user_status'])) {
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
				$username=$_REQUEST['uname'];
				$password=$_REQUEST['password'];
				$sql="SELECT * FROM user where username='$username' and password='$password'";
				$result=mysqli_query($con,$sql) or die(mysqli_error());	
				
				if(mysqli_num_rows($result)>0) {
					$row=mysqli_fetch_assoc($result);		//THIS is where the session starts.
					$_SESSION['user_status']='logged_in';
					$_SESSION['user_name']=$username;
					$_SESSION['password']=$password;
					
					$firstName=$row['fname'];
					echo "<div id='userWelcome'>Welcome, ".$firstName."<br><br><br>"."
						  <ul id='outview'>
							<li><a class='menuAnc' href='userAccount.php'>View your account</a></li>
							<li><a class='menuAnc' href='homepage.php'>Log out</a></li>
				  		  </ul></div>";
				}
				else {
				die(header("Location: signIn.php?loginFailed=true&reason=password"));
				//echo "<h2>User not found</h2> You might have entered invalid user information.";
				}
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
		<span id="prev">&#171;</span>
			<div id="myNewsTicker">
				<div class="newsTicker active">
						<?php
							$sql="SELECT interests FROM user where username='$username'";
							$resultInter=mysqli_query($con,$sql);
							$currentInter=mysqli_fetch_assoc($resultInter);
							$currentInterest=explode(',',$currentInter["interests"]);
							$n=sizeof($currentInterest);
							--$n;
						
							$sql="SELECT headlines,image,id FROM slideshownews where category='$currentInterest[0]'";
							--$n;
		
							$result=mysqli_query($con,$sql);
							$newsHeadline0String="";
							$newsImage0String="";
							$newsId0String="";
							while($row=mysqli_fetch_assoc($result))
							{
								$newsHeadline0String=$newsHeadline0String.$row["headlines"].",";
								$newsImage0String=$newsImage0String.$row["image"].",";
								$newsId0String=$newsId0String.$row["id"].",";
							}
							
							$newsHeadline0=explode(',',$newsHeadline0String);
							$newsImage0=explode(',',$newsImage0String);
							$newsId0=explode(',',$newsId0String);
							$m=sizeof($newsHeadline0);
							--$m;
							
							$newsHeadline = $newsHeadline0[0];
							$bgPicture=$newsImage0[0];
							$newsId=$newsId0[0];
						?>
					<a href="newsArticle.php?id=<?php echo $newsId; ?>"><img src="<?php echo "$bgPicture"; ?>" alt="" id="1"></img>
					<span class="tag"><?php echo "$newsHeadline"; ?></span></a>
				</div>
				
				<div class="newsTicker">
						<?php
							if($n>0) {
								$sql="SELECT headlines,image,id FROM slideshownews where category='$currentInterest[1]'";
								--$n;

							$result=mysqli_query($con,$sql);
							$newsHeadline1String="";
							$newsImage1String="";
							$newsId1String="";
							
							while($row=mysqli_fetch_assoc($result))
							{
								$newsHeadline1String=$newsHeadline1String.$row["headlines"].",";
								$newsImage1String=$newsImage1String.$row["image"].",";
								$newsId1String=$newsId1String.$row["id"].",";
							}
								
							$newsHeadline1=explode(',',$newsHeadline1String);
							$newsImage1=explode(',',$newsImage1String);
							$newsId1=explode(',',$newsId1String);
							$p=sizeof($newsHeadline1);
							--$p;
							$newsHeadline = $newsHeadline1[0];
							$bgPicture=$newsImage1[0];							
							$newsId=$newsId1[0];
							}
							else if($m>0) {
								$newsHeadline = $newsHeadline0[1];
							    $bgPicture=$newsImage0[1];
								$newsId=$newsId0[1];
								--$m;
							}								
							
						?>
					<a href="newsArticle.php?id=<?php echo $newsId; ?>"><img src="<?php echo "$bgPicture"; ?>" alt="" id="2"></img>
					<span class="tag"><?php echo $newsHeadline; ?></span></a>
				</div>
				
				<div class="newsTicker">
						<?php
							if($n>0) {
								$sql="SELECT headlines,image,id FROM slideshownews where category='$currentInterest[2]'";
								--$n;

							$result=mysqli_query($con,$sql);
							$newsHeadline2String="";
							$newsImage2String="";
							$newsId2String="";
							while($row=mysqli_fetch_assoc($result))
							{
								$newsHeadline2String=$newsHeadline2String.$row["headlines"].",";
								$newsImage2String=$newsImage2String.$row["image"].",";
								$newsId2String=$newsId2String.$row["id"].",";
							}
							
							$newsHeadline2=explode(',',$newsHeadline2String);
							$newsImage2=explode(',',$newsImage2String);
							$newsId2=explode(',',$newsId2String);
							
							$newsHeadline = $newsHeadline2[0];
							$bgPicture=$newsImage2[0];							
							$newsId=$newsId2[0];
							}
							else if($m>0) {
								$newsHeadline = $newsHeadline0[2];
							    $bgPicture=$newsImage0[2];
								$newsId=$newsId0[2];
								--$m;
							}
							
							else if($p>0) {
								$newsHeadline = $newsHeadline1[1];
								$bgPicture=$newsImage1[1];
								$newsId=$newsId1[1];
								--$p;
							}
							
						?>
					<a href="newsArticle.php?id=<?php echo $newsId; ?>"><img src="<?php echo "$bgPicture"; ?>" alt="" id="3"></img>
					<span class="tag"><?php echo $newsHeadline; ?></span></a>
				</div>
				
				<div class="newsTicker">
						<?php
							if($n>0) {
								$sql="SELECT headlines,image,id FROM slideshownews where category='$currentInterest[3]'";
								--$n;

							$result=mysqli_query($con,$sql);
							$newsHeadline3String="";
							$newsImage3String="";
							$newsId3String="";
							
							while($row=mysqli_fetch_assoc($result))
							{
								$newsHeadline3String=$newsHeadline3String.$row["headlines"].",";
								$newsImage3String=$newsImage3String.$row["image"].",";
								$newsId3String=$newsId3String.$row["id"].",";
							}
							
							$newsHeadline3=explode(',',$newsHeadline3String);
							$newsImage3=explode(',',$newsImage3String);
							$newsId3=explode(',',$newsId3String);
							
							$newsHeadline = $newsHeadline3[0];
							$bgPicture=$newsImage3[0];							
							$newsId=$newsId3[0];
							}
							else if($m>0) {
								$newsHeadline = $newsHeadline0[3];
							    $bgPicture=$newsImage0[3];
								$newsId=$newsId0[3];
								--$m;
							}
							
							else if($p>0) {
								$newsHeadline = $newsHeadline1[2];
								$bgPicture=$newsImage1[2];
								$newsId=$newsId1[2];
								--$p;
							}				
							else {
								echo $newsHeadline2[1];
								$bgPicture=$newsImage2[1];
								$newsId=$newsId2[1];
							}
							
						?>
					<a href="newsArticle.php?id=<?php echo $newsId; ?>"><img src="<?php echo "$bgPicture"; ?>" alt="" id="4"></img>
					<span class="tag"><?php echo $newsHeadline; ?></span></a>
				</div>
				
				<div class="newsTicker">
						<?php
							
							if($n>0) {
								$sql="SELECT headlines,image,id FROM slideshownews where category='$currentInterest[4]'";
								--$n;

							$result=mysqli_query($con,$sql);
							$newsHeadline4String="";
							$newsImage4String="";
							$newsId4String="";
							
							while($row=mysqli_fetch_assoc($result))
							{
								$newsHeadline4String=$newsHeadline4String.$row["headlines"].",";
								$newsImage4String=$newsImage4String.$row["image"].",";
								$newsId4String=$newsId4String.$row["id"].",";
							}
							
							$newsHeadline4=explode(',',$newsHeadline4String);
							$newsImage4=explode(',',$newsImage4String);
							$newsId4=explode(',',$newsId4String);
							
							$newsHeadline = $newsHeadline4[0];
							$bgPicture=$newsImage4[0];							
							$newsId = $newsId4[0];
							}
							else if($m>0) {
								$newsHeadline=$newsHeadline0[4];
							    $bgPicture=$newsImage0[4];
								$newsId = $newsId0[4];
								--$m;
							}	
							else if($p>0) {
								$newsHeadline = $newsHeadline1[3];
								$bgPicture=$newsImage1[3];
								$newsId = $newsId1[3];
								--$p;
							}		
							else {
								echo $newsHeadline2[3];
								$bgPicture=$newsImage2[3];
								$newsId = $newsId2[3];
							}
						?>
					<a href="newsArticle.php?id=<?php echo $newsId; ?>"><img src="<?php echo "$bgPicture"; ?>" alt="" id="5"></img>
					<span class="tag"><?php echo $newsHeadline; ?></span></a>
				</div>
			</div>
			<span id="next">&#187;</span>
			
			<div id="latestBox" style="width:350px;height:400px;float:right"">
			<!-- rss-feed code --> 
<script type="text/javascript"> 
//<!-- 
rssfeed_url = new Array(); 
/*
var numOfInt = "<?php echo sizeof($currentInterest); ?>";
var i=0;
while (i<5)
{
	var interest = "<?php echo $currentInterest[i]; ?>";
	switch(interest) {
		case "automobiles" : rssfeed_url[i]="https://news.google.com/news/rss/search/section/q/automobiles%20news/automobiles%20news?hl=en-IN&ned=in";break;
		case "books" : rssfeed_url[i]="https://news.google.com/news/rss/search/section/q/books/books?hl=en-IN&ned=in";break;
		case "business" : rssfeed_url[i]="https://news.google.com/news/rss/headlines/section/topic/BUSINESS.en_in/Business?ned=in&hl=en-IN";break;
		case "education" : rssfeed_url[i]="https://news.google.com/news/rss/search/section/q/education/education?hl=en-IN&ned=in";break;
		case "fitness" : rssfeed_url[i]="https://news.google.com/news/rss/headlines/section/topic/HEALTH.en_in/Health?ned=in&hl=en-IN";break;
		case "food" : rssfeed_url[i]="https://news.google.com/news/rss/search/section/q/food%20recipes/food%20recipes?hl=en-IN&ned=in";break;
		case "gaming" : rssfeed_url[i]="https://news.google.com/news/rss/search/section/q/video%20games/video%20games?hl=en-IN&ned=in";break;
		case "movies" : rssfeed_url[i]="https://news.google.com/news/rss/search/section/q/movies/movies?hl=en-IN&ned=in"; break;
		case "music" : rssfeed_url[i]="https://news.google.com/news/rss/search/section/q/music/music?hl=en-IN&ned=in";break;
		case "politics" : rssfeed_url[i]="https://news.google.com/news/rss/headlines/section/topic/NATION.en_in/India?ned=in&hl=en-IN";break;
		case "science" : rssfeed_url[i]="https://news.google.com/news/rss/headlines/section/topic/SCIENCE.en_in/Science?ned=in&hl=en-IN";break;
		case "sports" : rssfeed_url[i]="https://news.google.com/news/rss/headlines/section/topic/SPORTS.en_in/Sports?ned=in&hl=en-IN";break;
		case "style" : rssfeed_url[i]="https://news.google.com/news/rss/search/section/q/fashion/fashion?hl=en-IN&ned=in";break;
		case "technology" : rssfeed_url[i]="https://news.google.com/news/rss/headlines/section/topic/TECHNOLOGY.en_in/Technology?ned=in&hl=en-IN";break;
		case "travel" : rssfeed_url[i]="https://news.google.com/news/rss/search/section/q/travel/travel?hl=en-IN&ned=in";break;		
	}
	++i;
}
*/

rssfeed_url[0]="https://news.google.com/news/rss/headlines/section/topic/WORLD.en_in/World?ned=in&hl=en-IN"; 
rssfeed_url[1]="https://news.google.com/news/rss/headlines/section/topic/NATION.en_in/India?ned=in&hl=en-IN"; 
rssfeed_url[2]="https://news.google.com/news/rss/headlines/section/topic/BUSINESS.en_in/Business?ned=in&hl=en-IN"; 
rssfeed_url[3]="https://news.google.com/news/rss/headlines/section/topic/TECHNOLOGY.en_in/Technology?ned=in&hl=en-IN"; 
rssfeed_url[4]="https://news.google.com/news/rss/headlines/section/topic/SPORTS.en_in/Sports?ned=in&hl=en-IN";  
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
rssfeed_cache = "5bad57ef73514756c1ef8c74561257a6"; 
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
							$n=sizeof($currentInterest);
							--$n;
							
							$temp=$n-1;
							
							$sql="SELECT headlines,image,id FROM news where category='$currentInterest[$temp]'";
							--$n;
							
							$newsHeadline0String="";
							$newsImage0String="";
							$newsId0String="";
							
							$result=mysqli_query($con,$sql);
							while($row=mysqli_fetch_assoc($result))
							{
								$newsHeadline0String=$newsHeadline0String.$row["headlines"].",";
								$newsImage0String=$newsImage0String.$row["image"].",";
								$newsId0String=$newsId0String.$row["id"].",";
							}
							$newsHeadline0=explode(',',$newsHeadline0String);
							$newsImage0=explode(',',$newsImage0String);
							$newsId0=explode(',',$newsId0String);
							
							$m=sizeof($newsHeadline0);
							--$m;
							$newsHeadline=$newsHeadline0[0];
							echo $newsHeadline;
							$bgPicture=$newsImage0[0];							
							$newsId=$newsId0[0];
						?>				
					</p></div>
					<a href="newsArticleSlider.php?id=<?php echo $newsId; ?>"><img src="<?php echo "$bgPicture"; ?>"></a>
				</div>
				<li class="sliders">
				<div id="three">
					<div id="innerThree"><p>
						<?php
							if($n>0)
							{
								$temp=$n-1;
								$sql="SELECT headlines,image,id FROM news where category='$currentInterest[$temp]'";
								--$n;
							$newsHeadline1String="";
							$newsImage1String="";
							$newsId1String="";
							
							$result=mysqli_query($con,$sql);
							while($row=mysqli_fetch_assoc($result))
							{
								$newsHeadline1String=$newsHeadline1String.$row["headlines"].",";
								$newsImage1String=$newsImage1String.$row["image"].",";
								$newsId1String=$newsId1String.$row["id"].",";
							}
							$newsHeadline1=explode(',',$newsHeadline1String);
							$newsImage1=explode(',',$newsImage1String);
							$newsId1=explode(',',$newsId1String);
							
							$p=sizeof($newsHeadline1);
							--$p;
	
							$newsHeadline=$newsHeadline1[0];
							echo $newsHeadline;
							$bgPicture=$newsImage1[0];							
							$newsId=$newsId1[0];
							}
							else if($m>0) {
								$newsHeadline=$newsHeadline0[1];
							    echo $newsHeadline;
								$bgPicture=$newsImage0[1];
								$newsId=$newsId1[0];
								--$m;
							}
						?>	
					</p></div>
					<a href="newsArticleSlider.php?id=<?php echo $newsId; ?>"><img src="<?php echo "$bgPicture"; ?>"></a>
				</div>
			</ul>
			<ul>
				<li class="sliders">
				<div id="four">
					<div id="innerFour"><p>
						<?php
							if($n>0)
							{
								$temp=$n-1;
								$sql="SELECT headlines,image,id FROM news where category='$currentInterest[$temp]'";
								--$n;
							
							$newsHeadline2String="";
							$newsImage2String="";
							$newsId2String="";
							
							$result=mysqli_query($con,$sql);
							while($row=mysqli_fetch_assoc($result))
							{
								$newsHeadline2String=$newsHeadline2String.$row["headlines"].",";
								$newsImage2String=$newsImage2String.$row["image"].",";
								$newsId2String=$newsId2String.$row["id"].",";
							}
							
							$newsHeadline2=explode(',',$newsHeadline2String);
							$newsImage2=explode(',',$newsImage2String);
							$newsId2=explode(',',$newsId2String);
							
							$newsHeadline=$newsHeadline2[0];
							echo $newsHeadline;
							$bgPicture=$newsImage2[0];							
							$newsId=$newsId2[0];							
							}
							else if($m>0) {
								$newsHeadline=$newsHeadline0[2];
							    echo $newsHeadline;
								$bgPicture=$newsImage0[2];
								$newsId=$newsId0[2];
								--$m;
							}
							else if($p>0) {
								$newsHeadline=$newsHeadline1[1];
								echo $newsHeadline;
								$bgPicture=$newsImage1[1];
								$newsId=$newsId1[1];
								--$p;
							}
						?>	
					</p></div>
					<a href="newsArticleSlider.php?id=<?php echo $newsId; ?>"><img src="<?php echo "$bgPicture"; ?>"></a>
				</div>
				<li class="sliders">
				<div id="five">
					<div id="innerFive"><p>
							<?php
							if($n>0)
							{
								$temp=$n-1;
								$sql="SELECT headlines,image,id FROM news where category='$currentInterest[$temp]'";
								--$n;

							$newsHeadline3String="";
							$newsImage3String="";
							$newsId3String="";
							
							$result=mysqli_query($con,$sql);
							while($row=mysqli_fetch_assoc($result))
							{
								$newsHeadline3String=$newsHeadline3String.$row["headlines"].",";
								$newsImage3String=$newsImage3String.$row["image"].",";
								$newsId3String=$newsId3String.$row["id"].",";
							}
							
							$newsHeadline3=explode(',',$newsHeadline3String);
							$newsImage3=explode(',',$newsImage3String);
							$newsId3=explode(',',$newsId3String);
							
							$newsHeadline=$newsHeadline3[0];
							echo $newsHeadline;
							$bgPicture=$newsImage3[0];							
							$newsId=$newsId3[0];
							}
							else if($m>0) {
								$newsHeadline=$newsHeadline0[3];
							    echo $newsHeadline;
								$bgPicture=$newsImage0[3];
								$newsId=$newsId0[3];
								--$m;
							}
							else if($p>0) {
								$newsHeadline=$newsHeadline1[2];
								echo $newsHeadline;
								$bgPicture=$newsImage1[2];
								$newsId=$newsId1[2];
								--$p;
							}
						?>						
					</p></div>
					<a href="newsArticleSlider.php?id=<?php echo $newsId; ?>"><img src="<?php echo $bgPicture; ?>"></a>
				</div></a>
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