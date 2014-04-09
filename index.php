<?php
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>")
?>
<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript" src="js/jquery-1.11.0.min.js" ></script>
		<script type="text/javascript" src="js/index.js" ></script>
		
		<link rel="stylesheet" type="text/css" href="css/index.css" />
	</head>
	<body>
		<div id="indexMain" class="maincontainer">
			<div id="topContainer">
				<!-- loginPicture is a div that has an image/slideshow of images for desktop only -->
				<div id="loginPicture">
				<!-- image content goes here -->
				</div>

				<!-- loginField with form elements named username and pass that triggers login.php -->
				<div id="loginField">
					<h3>CMS Login</h3>
					<form action="doLogin.php" method="post">
						<input type="text" name="username" id="username" class="formField" placeholder="Username"/><br/>
						<input type="password" name="pass" id="pass" class="formField" placeholder="Password"/><br/>
						<input type="submit" value="Login" /><br/>
						<a href="#" id="recoverPassLink">Forgot Password?</a><br/>
						<button type="button" id="registerButton">Register</button><br/>
					</form>
				</div> 
				<!-- end of login field div -->
			</div>

			<!-- aboutListHolder is a div that contains a series of lists that briefly describe the site and its function -->
			<div id="aboutListHolder">
				<div id="aboutListOne" class="aboutList">
					<h4>What is COGENT?</h4>
					<p>The Computer Graphics Enterprise (COGENT) is used in Purdue University's Department of Computer Graphics Technology as an artificial currency. To earn Cogent, students place requests through a departmental e-banking system called the Cogent Management System (CMS).</p>
				</div>
				<div id="aboutListTwo" class="aboutList">
					<h4>Engagement</h4>
					<p>Students are encouraged to engage in activities inside and outside of the classroom as well as with alumni and high school students.</p>
				</div>
				<div id="aboutListThree" class="aboutList">
					<h4>Play the Game</h4>
					<p>See where you stack up against other students in CGT. View leaderboards and track your rank as you progress through the CGT program. Use your earned Cogent to invest in CGT 411/450 student projects. Play the stock market and reap the benefits of your investments.</p>
				</div>
			</div>


			<!-- registerField with form elementds for user-driven registration triggers doRegister.php -->
			<div id="registerField" class="popup">
				<h3>Register</h3>
				<form action="doRegister.php" method="post">
					<div class="popupLeft">
						<input type="email" name="email" id="email" class="formField" placeholder="Purdue Email"/>
						<input type="password" name="passWord" id="passWord" class="formField" placeholder="Password"/>
						<input type="password" name="conPass" id="conPass" class="formField" placeholder="Confirm Password"/>
					</div>
					<div class="popupRight">
						<input type="number" name="puid" id="puid" class="formField" placeholder="PUID"/>
						<input type="text" name="fName" id="fName" class="formField" placeholder="First name" />
						<input type="text" name="lName" id="lName" class="formField" placeholder="Last name" />
					</div>
					<input type="submit" value="Register" />

				</form>
			</div>

			<!-- recoverField with form elements for user-driven password recover triggers recoverPassword.php -->
			<div id="recoverField" class="popup">
				<h3>Recover Password</h3>
				<form action="recoverPassword.php" method="post">
					<div class="popupLeft">
						<input type="email" name="username" id="username" class="formField" placeholder="Purdue Email"/>
						<input type="number" name="puidPass" id="puidPass" class="formField" placeholder="PUID"/>
					</div>
					<div class="popupRight">
						<input type="text" name="fNamePass" id="fNamePass" class="formField" placeholder="First name" />
						<input type="text" name="lNamePass" id="lNamePass" class="formField" placeholder="Last name" />
					</div>
					<!-- captcha will go here -->
					<input type="submit" value="Recover" />
				</form>
			</div>
			<div id="blanket"></div>
		</div>
	</body>
</html>
