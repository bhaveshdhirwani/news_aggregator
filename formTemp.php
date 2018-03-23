<html>
	<head>
		<title>
		Sign up
        </title>
        <link rel=stylesheet href="signUp.css" type="text/css">
		<link rel=stylesheet href="header.css" type="text/css">
		<link rel=stylesheet href="content.css" type="text/css">
		<link rel=stylesheet href="footer.css" type="text/css">
    </head>
    <body>
			<div id="header">
				<a href="homepage.html" alt=""><img src="banner.png"></a>
			</div>
    <p>Create an account</p>
    <form name="registration" action="test.php" method="post" onsubmit="return validateform(this);">
    <table border="0">
	
	<tr>
	<th>First name : </th>
	<td><input type="text" name="fname" id="fname" value="" onblur="charValidateFN(this.value)"><br> </td>
    <td><p id="valFN"></p></td>
	</tr>
	
	<tr>
	<th>Last name : </th>
	<td><input type="text" name="lname" id="lname" value="" onblur="charValidateLN(this.value)"><br> </td>
    <td><p id="valLN"></p></td>
	</tr>
	
	<tr>
	<th>Username : </th>
	<td><input type="text" name="uname" id="uname" value="" onblur="usernameValidate(this.value)"><br> </td>
    <td><p id="valUN"></p></td>
	</tr>
	
	<tr>
	<th>Password : </th>
	<td><input type="password" name="pwd" id="pwd" value="" onblur="passwordValidate(this.value)"><br></td>
    <td><p id="valPW"></p></td>
	</tr>
	
	<tr>
	<th>Gender : </th>
	<td><input type="radio" name="gender" id="gender" value="m">Male<br></td>
    <td><p id="genderPar"></p></td>
    <tr>
	
	<tr>
	<th></th>
	<td><input type="radio" name="gender" value="f">Female<br></td>
    </tr>
	
	<tr>
	<th>Phone number : </th>
	<td><input type="text" name="phone" id="phone" value="" onblur="phoneValidate(this.value)" maxlength="11"><br></td>
	<td><p id="phoneVal"></p></td>
	</tr>
	
	<tr>
    <th>Email address : </th>
	<td><input type="text" name="email" id="email" value="" onblur="emailValidateFn(this.value)"><br></td>
	<td><p id="emailVal"></p></td>
	</tr>
	
	<tr>
    <th>Interests : </th>
	<td><input class="interestItem" type="checkbox" name="interests[]" value="automobiles"> Automobiles <br></td>
	<td><p id="interestPar"></p></td>
	</tr>
	
	<tr> <th></th>
	<td><input class="interestItem" type="checkbox" name="interests[]" value="books"> Books <br></td></tr>
	
	<tr> <th></th>
	<td><input class="interestItem" type="checkbox" name="interests[]" value="business"> Business <br></td></tr>
				
	<tr> <th></th>
	<td><input class="interestItem" type="checkbox" name="interests[]" value="education"> Education <br></td></tr>
	
	<tr> <th></th>
	<td><input class="interestItem" type="checkbox" name="interests[]" value="fitness"> Fitness <br></td></tr>
	
	<tr> <th></th>
	<td><input class="interestItem" type="checkbox" name="interests[]" value="food"> Food <br></td></tr>
				
	<tr> <th></th>
	<td><input class="interestItem" type="checkbox" name="interests[]" value="gaming"> Gaming <br></td></tr>
				
	<tr> <th></th>
	<td><input class="interestItem" type="checkbox" name="interests[]" value="movies"> Movies <br></td></tr>
	
	<tr> <th></th>
	<td><input class="interestItem" type="checkbox" name="interests[]" value="music"> Music <br></td></tr>
	
	<tr> <th></th>
	<td><input class="interestItem" type="checkbox" name="interests[]" value="politics"> Politics <br></td></tr>
	
	<tr> <th></th>
	<td><input class="interestItem" type="checkbox" name="interests[]" value="science"> Science <br></td></tr>
	
	<tr> <th></th>
    <td><input class="interestItem" type="checkbox" name="interests[]" value="sports"> Sports <br></td></tr>
	
	<tr> <th></th>
    <td><input class="interestItem" type="checkbox" name="interests[]" value="fashion"> Style <br></td></tr>
	
	<tr> <th></th>
    <td><input class="interestItem" type="checkbox" name="interests[]" value="technology"> Technology <br></td></tr>
	
	<tr> <th></th>
	<td><input class="interestItem" type="checkbox" name="interests[]" value="travel"> Travel <br></td></tr>
	
	</table>
	
	<input class="endB" type="reset" value="Clear all fields"></th>
	<td><input class="endB" type="submit" value="Submit"></td>
	
    </form>
	<!--About us and Contact us-->
		<div id="footer">
			<ul>
				<li><a href="aboutUs.html">About us</a>
				<li><a href="contactUs.html">Contact us</a>
			</ul>
		</div>
		
    <script>    
    	function validateform(form) {
    		var validInput=true;
    		var radioButtonChecker=false;
    		var checkboxChecker=false;
    		
    		if(!charValidateFN(document.getElementById("fname").value))
    		{
    			validInput=false;
			}
    		
    		if(!charValidateLN(document.getElementById("lname").value))
    		{
    			validInput=false;
			}
			
			if(document.getElementById("valUN").innerHTML==="Username exists. Please select new username")
			{
				validInput=false;
			}
			else if(document.getElementById("valUN").innerHTML==="")
			{
				validInput=false;
			}
			else if(document.getElementById("valUN").innerHTML==="Please enter a username")
			{
				validInput=false;
			}
    		
    		if(!passwordValidate(document.getElementById("pwd").value))
    		{
    			validInput=false;
			}
    		
    		if(!phoneValidate(document.getElementById("phone").value))
    		{
    			validInput=false;
			}
    		
    		if(!emailValidateFn(document.getElementById("email").value))
    		{
    			validInput=false;
			}
    		
    		var radios=document.getElementsByName("gender");
    		
    		for (var i = 0; i < radios.length; i++) 
    		{
          		if (radios[i].checked) 
          		{
              		radioButtonChecker=true;
              		document.getElementById("genderPar").innerHTML="";
					break;
          		}
          	}
			
			if(!radioButtonChecker)
          	{
 				document.getElementById("genderPar").style.color="red";
 				document.getElementById("genderPar").innerHTML="Please select gender";        			
			}

    		var checkboxes=document.getElementsByName('interests[]');
			
			for(var i=0; i<checkboxes.length; i++)
    		{
    			if(checkboxes[i].checked)
    		 	{
    		 		checkboxChecker=true;
              		document.getElementById("interestPar").innerHTML="";
					break;
          		}
          	}	
			
			if(!checkboxChecker)
			{
 				document.getElementById("interestPar").style.color="red";
 				document.getElementById("interestPar").innerHTML="Please select at least one interest";        			
			}
   
			validInput = validInput && checkboxChecker && radioButtonChecker;
			if(validInput==true) alert("Thank you for registering!");
			return validInput;
    	}
    	
    function charValidateFN(option) {
		var checkOnlyChars=/^[A-Za-z]+$/;
		
		if(option.length==0)
		{
			document.getElementById("valFN").style.color="red";
			document.getElementById("valFN").innerHTML="Please enter your first name";
			return false;
		}
		if(!option.match(checkOnlyChars)) {
			document.getElementById("valFN").style.color="red";
			document.getElementById("valFN").innerHTML="Only Characters allowed!";
			return false;
		}
		else {
			document.getElementById("valFN").innerHTML="";
			return true;
		}
	}
	
	function charValidateLN(option) {
		var checkOnlyChars=/^[A-Za-z]+$/;
		
		if(option.length==0)
		{
			document.getElementById("valLN").style.color="red";
			document.getElementById("valLN").innerHTML="Please enter your last name";
			return false;
		}
		if(!option.match(checkOnlyChars)) {
			document.getElementById("valLN").style.color="red";
			document.getElementById("valLN").innerHTML="Only Characters allowed!";
			return false;
		}
		else {
			document.getElementById("valLN").innerHTML="";
			return true;
		}
	}
	
	function usernameValidate(option) {
		
		var flag=false;
		
		if(option.length==0)
		{
			document.getElementById("valUN").style.color="red";
			document.getElementById("valUN").innerHTML="Please enter a username";
			return false;
		}
		else 
		{	
			document.getElementById("valUN").innerHTML="";
			
			var http = new XMLHttpRequest();
			http.abort(); // to remove any old AJAX object
  
			http.open("GET","usernameValidate.php?username=" + option, true);
			http.send();
			
			http.onreadystatechange= function()
			{
				if(http.readyState == 4)
				{
					if (http.responseText==="Username exists. Please select new username")  
					{
						document.getElementById("valUN").style.color="red";
						document.getElementById("valUN").innerHTML = http.responseText;
						flag=false;
					}
					else
					{
						document.getElementById("valUN").style.color="blue";
						document.getElementById("valUN").innerHTML = http.responseText;
						flag=true;
					}
				}
			}
			return flag;
		}	
	}
	
	function passwordValidate(option) {
		
		if(option.length==0)
		{
			document.getElementById("valPW").style.color="red";
			document.getElementById("valPW").innerHTML="Please enter a password";
			return false;
		}
		
		if(option.length>=8)
		{
			var charPresent=false;
			var digitPresent=false;
			var spclPresent=false;
			
			for(var i=0;i<option.length;i++)
			{	
				var check=option.charCodeAt(i);
				
				if((check>64 && check<91) || (check>96 && check<123))
				{
					charPresent=true;
				}
				else if(check>47 && check<58)
				{
					digitPresent=true;
				}
				else if((check>31 && check<48) || (check>57 && check<65) || (check>90 && check<97) || (check>122 && check<127))
				{
					spclPresent=true;
				}
			}
			
			if(!charPresent)
			{
				document.getElementById("valPW").style.color="red";
				document.getElementById("valPW").innerHTML="Atleast one character needed!";
				return false;
			}
			
			if(charPresent && digitPresent && spclPresent)
			{
				document.getElementById("valPW").style.color="red";
				document.getElementById("valPW").innerHTML="Strong!";
			}
			else if((charPresent && digitPresent) || (charPresent && spclPresent))
			{
				document.getElementById("valPW").style.color="red";
				document.getElementById("valPW").innerHTML="Medium!";
			}
			else if(charPresent)
			{
				document.getElementById("valPW").style.color="red";
				document.getElementById("valPW").innerHTML="Weak!";
			}
			
			return true;
		}
		else
		{
			document.getElementById("valPW").style.color="red";
			document.getElementById("valPW").innerHTML="Minimum 8 characters!";
			return false;
		}
	}
	
	function phoneValidate(option) {
		var checkOnlyDigits=/^[0-9]+$/;
		if(!option.match(checkOnlyDigits)) {
			document.getElementById("phoneVal").style.color="red";
			document.getElementById("phoneVal").innerHTML="Please enter a valid phone number";
			return false;
		}
		else {
			document.getElementById("phoneVal").innerHTML="";
		}
		
		return true;
	}
	
	function emailValidateFn(option) {
		var at=option.indexOf("@");
		var dot=option.lastIndexOf(".");
		
		if(at<1 || dot<=at+2 || dot+2>=option.length)
		{
			document.getElementById("emailVal").style.color="red";
			document.getElementById("emailVal").innerHTML="Please enter a valid email id";
			return false;
		}
		else
		{
			document.getElementById("emailVal").innerHTML="";
		}
		return true;
	}
    </script>
    </body>
</html>

<?php
?>