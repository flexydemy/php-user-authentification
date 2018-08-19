<html>
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link href="public/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="public/css/mycss.css">


</head>
<body id="LoginForm">
	<div class="container">
		<h1 class="form-heading">Register Form</h1>
		<div class="login-form">
			<div class="main-div">
				<div class="panel">
					<p>Please fill this case correctly</p>
				</div>
				<form id="Login" method="POST" cible="#">
					<div class="form-group">
						<input type="username" class="form-control" id="inputEmail" placeholder="Username" name="username">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" id="inputEmail" placeholder="Input Email" name="email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="verif_password">
					</div>
					<div class="forgot">
						<a href="?action=connexion">Connectez-vous</a>
					</div>
					<button type="submit" class="btn btn-primary" name="submit">Register</button><br><br>
					<div class="form-group btn-info">
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