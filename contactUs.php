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
		<div id="left">
			<ul id="contact-list">
				<li style="margin-left:27px" class="contact">Contact information:
				<li style="margin-left:25px" class="contact">+91 7666824529
				<li class="contact"><a class="menuAnc" href="mailto:theceryxteam@gmail.com">theceryxteam@gmail.com</a>
				<li class="contact"><a class="menuAnc" href="http://www.twitter.com/TheCeryx">@TheCeryx</a>
				<li class="contact"><a class="menuAnc" href="http://www.facebook.com/TheCeryx">Facebook.com/<br/>The Ceryx news agency</a>
			</ul>
		</div>
		<div id="right">
			<p style="color:white; padding:30px; margin:10px 10px 10px 35px; font-family:Georgia; font-size:24">Send us a message</p>
			<form id="sendMessage" name="sendMessage" action="sentMessage.php" method="post" onsubmit="return validateform(this);">
				Name : <input type="text" name="senderName" id="senderName" onblur="charValidateFN(this.value)"><br><p id="senderNameP"></p>
				Email : <input type="text" name="senderMail" id="senderMail" onblur="emailValidateFn(this.value)"><br><p id="senderMailP"></p>
				<p>Message : </p><textarea name="message" id="message"></textarea><br>
				<input type="submit" id="contactSub" class="myButton" value="Send message">
			</form>
		</div>
		<!--About us and Contact us-->
		<div id="footer">
			<ul>
				<li><a class="menuAnc" href="aboutUs.php">About us</a>
			</ul>
		</div>
	</body>
	<script>    
    	function validateform(form) {
    		var validInput=true;
    		
    		if(!charValidateFN(document.getElementById("senderName").value))
    		{
    			validInput=false;
			}
    		
    		if(!emailValidateFn(document.getElementById("senderMail").value))
    		{
    			validInput=false;
			}
    
			return validInput;
    	}
		
	function charValidateFN(option) {
		var checkOnlyChars=/^[A-Za-z]+\s[A-Za-z]+$/;
		
		if(option.length==0)
		{
			document.getElementById("senderNameP").style.color="red";
			document.getElementById("senderNameP").innerHTML="Please enter your name";
			return false;
		}
		if(!option.match(checkOnlyChars)) {
			document.getElementById("senderNameP").style.color="red";
			document.getElementById("senderNameP").innerHTML="Only characters and space allowed!";
			return false;
		}
		else {
			document.getElementById("senderNameP").innerHTML="";
			return true;
		}
	}
	
	
	function emailValidateFn(option) {
		var at=option.indexOf("@");
		var dot=option.lastIndexOf(".");
		
		if(at<1 || dot<=at+2 || dot+2>=option.length)
		{
			document.getElementById("senderMailP").style.color="red";
			document.getElementById("senderMailP").innerHTML="Please enter a valid email id";
			return false;
		}
		else
		{
			document.getElementById("senderMailP").innerHTML="";
		}
		return true;
	}
		</script>
</html>