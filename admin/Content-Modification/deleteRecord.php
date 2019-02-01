<?php

//Check for post
if (isset($_POST['delete'])) {
  //Reinstate auth token
  if ($token === true) {
    session_start();
    $_SESSION["login"] = true;
  }

if (intval($_POST['id'])) {
    $recordID = $_POST['id'];
    $recordID = htmlspecialchars($recordID);
    $recordID = db_escape($db, $recordID);
    $query = "DELETE FROM messages WHERE id='" . $recordID . "'";
    mysqli_query($db, $query);
    //Prevent form resubmission when page is refreshed
    header("Location: ../Content-Modification/");
  }
}
