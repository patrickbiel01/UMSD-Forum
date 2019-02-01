<?php

function fetchSubject($subject_id){
  global $db;
  $query = "SELECT * FROM subjects WHERE id=" . $subject_id;
  $set = mysqli_query($db, $query);
  $data = mysqli_fetch_assoc($set);
  return  $data['subject'];
}

//Tranform set into dictionary
function generateDataArray($set){
  $messages = [];

  while ($message = mysqli_fetch_assoc($set)) {
    $message['subject'] = fetchSubject($message['subject_id']);
    array_push($messages, $message);
  }

  //Free up data
  mysqli_free_result($message_set);

  return $messages;
}

//Form data into readable html
function formatUserReviews($set, $admin_style=false){
  $messages = generateDataArray($set);
  $html = "";

  foreach($messages as $message) {
    $html .= "<div class='feedback' id=" . $message['id'] . ">";
    if ($admin_style) {
      $html .= '<form action="../Content-Modification/" method="post">
                <select name="id" style="visibility: hidden;">
				           <option value="' . $message['id'] . '"></option>
    	          </select>
                <input class="delete-btn" type="submit" name="delete" value="Delete Record">
               </form>';
    }
     $html .=
      '<div class="subject">' . $message['subject'] . '</div>' . '<br>' .
      '<div class="title">' . $message['title'] . '</div>' . '<br>' .
      '<div class="text">' . $message['text'] . '</div>' . '<br>' .
      '<div class="date">' . $message['date'] . '</div>' . '<br>' .
    "</div><br>";
  }

  return $html;
}

//Retrieve query from database
function fetchQuery(){
  global $db;
  //Form a query
  $query = "SELECT * FROM messages";
  $query .= " ORDER BY date DESC;";
  //Retrieve set
  $set = mysqli_query($db, $query);
  //Check retrieval failure
  if (!$set){
    exit("Database Query failed.");
  }

  return $set;
}

//Retrieve and output data
function retrieveUserReviews($admin_style=false) {
  //Retrive query
  $message_set = fetchQuery();
  //Generate readable data
  $html = formatUserReviews($message_set,$admin_style);

  return $html;
}

//Create global instance of html output
$_FEEDBACK = retrieveUserReviews();
