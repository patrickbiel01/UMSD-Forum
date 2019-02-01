<?php

/* Private Root Project URL */
define('PRIVATE_ROOT', dirname(SHARED_ROOT) . '/Private');

/* Public Root Project URL */
define('PUBLIC_ROOT', dirname(SHARED_ROOT) . '/Public');

/* Root Path */
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/Private') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

/* Credential Info */
define("USERNAME", "INSERT_DB_USERNAME_HERE");
define("PASSWORD", "INSERT_DB_PASSWORD_HERE");

/* Database Constants */
define("DB_SERVER", 'localhost');
define("DB_USER", 'INSERT_DB_USERNAME_HERE');
define("DB_PASSWORD", PASSWORD);
define("DB_NAME", 'INSERT_DB_NAME_HERE');

//Start db connection
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
