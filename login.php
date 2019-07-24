<?php
require_once 'include/config.php';

/* sanitize */
$login = filter_input(INPUT_POST, login, FILTER_SANITIZE_STRING );
$password = filter_input(INPUT_POST, password, FILTER_SANITIZE_STRING );



if ($login == $adm_login && $password == $adm_password) {
	session_start();
	$_SESSION['admin'] = true;
	header("Location: index.php");
	exit();
}

echo "$login $password <br>";
echo "$adm_login $adm_password <br>";