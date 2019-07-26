<?php
require_once 'include/config.php';

/* sanitize */
$login = filter_input(INPUT_POST, login, FILTER_SANITIZE_STRING );
$password = filter_input(INPUT_POST, password, FILTER_SANITIZE_STRING );

if ($login == $adm_login && password_verify($password, $adm_hash)) {
	session_start();
	$_SESSION['admin'] = true;
}
// redirect in all cases
header("Location: index.php");