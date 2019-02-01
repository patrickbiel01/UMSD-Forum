<?php

function no_data_entered(){
  $data_entered = isset($_POST['userText']);
  $empty_string = trim($_POST['userText']) === "";

  if (!$data_entered || $empty_string){
    return true;
  }

  return false;
}

function is_too_long($title, $text){
  $outPutError = '';
  if(strlen($title) > 255){
    $outPutError .= "<p>* Title must be less than 255 bytes</p>";
  }
  if (strlen($title) >  65535) {
    $outPutError .= "<p>* Feedback must be less than 65 535 bytes</p>";
  }
  return $outPutError;
}

function enterFeedback(){
  global $db;

  if (no_data_entered())  {
    return;
  }

  //Retrieve Title
  $title = $_POST['title'];
  //Prevent cross-site scripting
  $title = htmlspecialchars($title);
  //Prevent sql injection
  $title = db_escape($db, $title);

  $text = $_POST['userText'];
  //Prevent cross-site scripting
  $text = htmlspecialchars($text);
  //Prevent sql injection
  $text = db_escape($db, $text);

  //Retrieve subject
  $subject = $_POST['subject'];
  $subject = htmlspecialchars($subject);
  $subject = db_escape($db, $subject);

  //Retrieve date
  date_default_timezone_set('UTC');
  $date = date("m/d/Y H:i:s") . " UTC";

  //Check data size
  $errors = is_too_long($title, $text);
  if($errors !== '') {
    return $errors;
  }

  //Insert user data into db
  $query = "INSERT INTO messages (text, date, subject_id, title)
  VALUES ('" . $text . "', '" . $date . "', '" . $subject . "', '" . $title . "')";

  mysqli_query($db, $query);
  //Prevent form resubmission when page is refreshed
  header("Location: ../Forum/");
}

$_ERRORS = enterFeedback();
