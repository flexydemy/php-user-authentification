<!Doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
	<link href="public/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="public/css/mycss.css">


</head>
<body id="LoginForm">
	<div class="container connexion_container">
		<h1 class="form-heading">login Form</h1>
		<div class="login-form">
			<div class="main-div">
				<div class="panel">
					<p>Please enter your email and password</p>
				</div>
				<form id="Login" method="POST" action="#">
					<div class="form-group">
						<input type="username" class="form-control" id="inputEmail" placeholder="Username" name="username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
					</div>
					<div class="forgot">
						<a href="reset.html">Forgot password?</a>
					</div>
					<div class="forgot">
						<a href="?action=inscription">Rejoingnez-nous</a>
					</div>
					<button type="submit" class="btn btn-primary" name="connect">Login</button><br><br>

					<div class="form-group btn-danger">
						<?php
						if (isset($errors)) {
							echo $errors;
						}
						?>
					</div>
				</form>
			</div>
			<p class="botto-text"> Designed by Sunil Rajput</p>
		</div></div></div>



    <script src="public/css/bootstrap.js"></script>
    <script src="public/css/popper.min.js"></script>
    <script src="public/css/jquery.js"></script>
	</body>
	</html>