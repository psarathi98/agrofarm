<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/login.css" />
	<link rel="icon" href="./docs/images/logo/logo_title.png" type="image/icon type">

	<title>Sign in form</title>
</head>

<body>
	<?php
		include("navbar.php");
	?>
	<div class="container">
		<div class="forms-container">
			<div class="signin-signup">
			
				
				<form action="php/signin.php" method="post" class="sign-in-form">
					<h2 class="title">Sign in</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" name="username" placeholder="Enter userid"/>
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" name="passwordfield" placeholder="Enter password" />
					</div>
					<input type="submit" name="login" id= "login" value="login" class="btn solid" />
					
				</form>
			</div>
		</div>

		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
					<h3>Welcome</h3>
					
					
				</div>
				<img  src="https://i.ibb.co/6HXL6q1/Privacy-policy-rafiki.png" class="image" alt="" />
			</div>
			</div>
		</div>
	</div>

    <script src="js/login.js"></script>
</body>

</html>