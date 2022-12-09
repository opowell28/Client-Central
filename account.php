<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ClientCentral - Account</title>
	<link rel="icon" type="image/png" href="img/favicon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

	<link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Navigation-->
<nav class="navbar navbar-expand-md navbar-dark bg-dark-register fixed-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="index - user.html"><img src="img/logo light.png" height="80rem"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="nav navbar-nav ml-auto">
				<li class="nav-item">
					<a href="home.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item active">
					<a href="#" class="nav-link"></i>Account</a>
				</li>
				<li class="nav-item">
					<a href="booking.php" class="nav-link"></i>Booking</a>
				</li>
				<li class="nav-item">
					<a href="logout.php" class="nav-link">Logout <i class="fas fa-sign-out-alt"></i></a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!--- Background Video -->
<div class="video-container" style="height: 40% !important">
	<div class="container-fluid video-caption" style="top: 60% !important">
		<div class="row justify-content-center">
			<div class="col-md-8 justify-content-center main-heading-home" id="slide">
				<h1 class="display-1">ClientCentral</h1>
				<hr>
			</div>
		</div>
	</div>
	<video preload="" autoplay muted playsinline loop width="100%">
		<source src="img/Final.mp4" type="video/mp4">
	</video>
</div>

<div class="page-content-full">

<!--- Welcome Section -->
<div class="container-fluid padding">
	<div class="row welcome text-center">
    <div class="col-12 justify-content-center">
      <h2>Profile Page</h2>
			<div class="mx-auto">
				<p>Your account details are below:</p>
				<table class="table table-bordered table-hover">
					<tbody>
						<tr class="table-primary">
							<td>Username:</td>
							<td><?=$_SESSION['name']?></td>
						</tr>
						<tr class="table-primary">
							<td>Password:</td>
							<td>********</td>
							<!--<td><?=$password?></td>-->
						</tr>
						<tr class="table-primary">
							<td>Email:</td>
							<td><?=$email?></td>
						</tr>
					</tbody>
				</table>
			</div>
    </div>
	</div>
</div>

</div>

<!--- Footer -->
<footer>
	<div class="container-fluid padding">
		<div class="row text-center">
				<div class="col-md-6">
					<hr class="light">
					<img src="img/logo light.png" height="40rem">
					<hr class="light">
					<p>Support: 555-555-5555</p>
					<p>info@clientcentral.com</p>
				</div>
				<div class="col-md-6">
					<hr class="light">
					<h5>Service Area</h5>
					<hr class="light">
					<p>We serve all of doctors in the U.S.</p>
				</div>
				<div class="col-12">
					<hr class="light-100">
					<h5>&copy; clientcentral.com</h5>
				</div>
		</div>
	</div>
</footer>

</div>

</body>
</html>