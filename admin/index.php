<?php
ob_start();

require '../Constants.php';
require '../functions.php';
require "auth/credentialEntry.php";
require 'database_errors.php';

$is_failed_auth = admin_auth();

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin Login | Ultimate Monster Siege Defence</title>
		<link rel="shortcut icon" type="image/x-icon" href="../images/app_icon.png">
		<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
		<!-- Styles	-->
		<link rel="stylesheet" href="../css/styles.css">
	</head>

<body>
  <!-- Title -->
  <header>
    <h1>Admin Access</h1>
		<a class="nav" href="../">Go back to Forum</a>
  </header>

  <!-- Credential Form -->
  <form class="credentialInfo" action="../admin/" method="post">
		<?php if ($is_failed_auth) { echo "<p>Incorrect Data</p>"; } ?>
    <input type="text" name="username" placeholder="Enter admin username">
		<br>
    <input type="password" name="password" placeholder="Enter admin password">
		<br>
		<input type="submit" name="submitCred" value="Submit">
	</form>

<?php require '../includes/footer.php'; ?>

</body>

</html>
