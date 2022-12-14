<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ClientCentral - Home</title>
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
		<a class="navbar-brand" href="doctor_index - user.html"><img src="img/logo light.png" height="80rem"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="nav navbar-nav ml-auto">
				<li class="nav-item active">
					<a href="#" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="doctor_account.php" class="nav-link"></i>Account</a>
				</li>
				<li class="nav-item">
					<a href="doctor_booking.php" class="nav-link"></i>Booking</a>
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
		<div class="col-12">
      <h2 class="display-4">Home Page</h2>
      <p class="lead">Welcome back, <?=$_SESSION['name']?>!</p>
			<hr>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title display-4">Account</h5>
						<p class="card-text">Your account page allows you to see your account information, register a coworker, view your next appointment, view the registered patients, and view the next three scheduled appointments for any doctor.</p>
					</div>
				</div>
			</div>
      <div class="col-lg-6 col-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title display-4">Scheduling</h5>
						<p class="card-text">Your booking page allows you to schedule appointments for you or any other doctor and cancel appointments if necessary.</p>
					</div>
				</div>
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

</body>
</html>
