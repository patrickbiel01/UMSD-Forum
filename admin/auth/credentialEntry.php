<?php

function admin_auth() {
  if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
    return false;
  }

  session_start();

  $username = $_POST['username'] ?? "";
  $password = $_POST['password'] ?? "";

  $username_correct = $username === USERNAME;
  $password_correct = $password === PASSWORD;

  if ($username_correct && $password_correct) {
    $_SESSION["login"] = true;
    header("Location: Content-Modification/");
    return false;
  }

  $_SESSION["login"] = false;
  return true;

}
