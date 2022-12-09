<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['docname'], $_POST['adate'], $_POST['atime'], $_POST['symptoms'])) {
	// Could not get the data that should have been sent.
	exit('a');
}




if ($stmt = $con->prepare('SELECT username, password FROM patient_accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.

	if ($stmt = $con->prepare('INSERT INTO appointments (patient_username, docname, date, time, symptoms) VALUES (?, ?, ?, ?, ?)')) {

		$stmt->bind_param('sssss', $_POST['username'], $_POST['docname'], $_POST['adate'], $_POST['atime'], $_POST['symptoms']);
		$stmt->execute();
		header('Location: doctor_booking - success.php');
	} else {
		// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
		echo 'Could not prepare statement!';
	}

	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>
