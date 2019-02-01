<?php
	ob_start();

	session_start();

	$token = $_SESSION['login'];

	if (!($token === true)) {
		header("Location: ../index.php");
		echo "<a href='../../admin/'>Login Page</a>";
	}

	session_destroy();
	ob_end_flush();

	require '../../Constants.php';
	require '../../functions.php';
	require '../../includes/FeedbackRetrieval.php';
	require 'deleteRecord.php';
	require '../database_errors.php';
 ?>

<?php if($token === true) { ?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin Access | Ultimate Monster Siege Defence Forum</title>
		<link rel="shortcut icon" type="image/x-icon" href="../../images/app_icon.png">
		<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
		<!-- Styles	-->
		<link rel="stylesheet" href="../../css/styles.css">
	</head>

<body>
  <h1>Admin Editing</h1>

	<a class="nav" href="../../">Go back to Forum</a>

  <!-- User Feedback -->
  <div id="userFeedbackResponse">
		 <?= retrieveUserReviews(true); ?>
  </div>

<?php require '../../includes/footer.php'; ?>

</body>

</html>
<?php } ?>
