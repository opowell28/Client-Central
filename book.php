<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['docname'], $_POST['date'], $_POST['time'], $_POST['symptoms'] )) {
	exit('Please complete the registration form!');
}

if ($stmt = $con->prepare('INSERT INTO appointments (username, docname, adate, atime, symptoms) VALUES (?, ?, ?, ?, ?)')) {
	$stmt->bind_param($_POST['username'], $_POST['docname'], $_POST['adate'], $_POST['atime'], $_POST['symptoms']);
	$stmt->execute();
	header('Location: index - user.html');
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not book appointment!';
}

$con->close();
?>
