<?php
	require 'Constants.php';
	require 'functions.php';
	require 'includes/FeedbackInsertion.php';
	require 'includes/FeedbackRetrieval.php';
	require 'admin/database_errors.php';
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Product Review | Ultimate Monster Siege Defence</title>
		<link rel="shortcut icon" type="image/x-icon" href="images/app_icon.png">
		<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<!-- Import JQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Init <select> -->
		<script type="text/javascript">
			$(document).ready(function(){
 				$('select').formSelect();
			});
		</script>
		<!-- Styles	-->
		<link rel="stylesheet" href="css/styles.css">
	</head>

<body>
  <!-- Title -->
  <header>
    <h1>Ultimate Monster Siege Defence</h1>
    <h2>Forum</h2>
  </header>

	<div id="error"><?= $_ERRORS ?></div>

  <!-- Form Submission -->
  <form class="feedback-form" action="../Forum/" method="post" id="form">
		<!-- Subject Input -->
		<div class="input-field col s12">
    	<select name="subject">
				<option value="2">Game Review</option>
				<option value="1">Bug Report</option>
				<option value="3">Q&A</option>
    	</select>
    	<label>Category</label>
  	</div>
		 <br>
		<!-- Title Input -->
		<div class="input-field col s6">
        <input placeholder="Enter Title" name="title" id="title" type="text" class="validate">
        <label for="title">Title</label>
    </div>
		 <!-- Feedback Input -->
		 <div class="input-field col s12">
        <textarea name="userText" id="user-text-area" class="materialize-textarea"></textarea>
        <label for="user-text-area">Enter Feedback</label>
     </div>
		 <br>
  </form>

	<button class="btn waves-effect waves-light" type="submit" form="form" value="Submit">Submit<i class="material-icons right"></i></button>
	<br>
	<a class="edit-btn" href="admin/">Edit Responses</a>

  <!-- User Feedback -->
  <div id="feedback-container">
		<?= $_FEEDBACK ?>
  </div>

<?php require 'includes/footer.php'; ?>

<!-- JS Functionality -->
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
