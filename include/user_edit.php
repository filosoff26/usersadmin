<?php
/* user edit */
require_once('include/mysql.php');

if (isset($_GET['login'])) {
	$login = $mysqli->real_escape_string(filter_input(INPUT_GET, login, FILTER_SANITIZE_STRING));
	$q = "SELECT * FROM users WHERE login='$login'";
	$res = $mysqli->query($q);
	if ($res->num_rows > 0) {
		//input data for form 
		$data = $res->fetch_assoc();
		$id = $login;
		$data['password'] = '';
		$allow_delete = true;
		include 'templates/editform.tpl.php';
	} else {
		$errors[] = "user login incorrect";
	} 
} else {
	$errors[] = "user login missing";
}