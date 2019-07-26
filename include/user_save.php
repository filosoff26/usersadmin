<?php
/* save user data */
require_once ('include/mysql.php');

if ($_GET['action'] == 'save' && isset($_POST)) {

	// check data
	$data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	if (isset($data['password'])) {
		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
	}
	$data['birthdate'] = date_create_from_format('Y-m-d',$data['birthdate']) ? $data['birthdate'] : '1970-01-01';

	// prepare sql statement
	$set = "password='$data[password]',name='$data[name]',surname='$data[surname]',gender='$data[gender]',birthdate='$data[birthdate]'";
	$q = "SELECT login FROM users WHERE login='$data[login]'";
	$found = $mysqli->query($q)->fetch_assoc()['login'];
	if ($mysqli->query($q)->fetch_assoc()['login'] == $data['login']) { // update user
		$q = "UPDATE users SET $set WHERE login='$data[login]'";
	} else { // new user
		$set = "login='$data[login]',".$set;
		$q = "INSERT INTO users SET $set";
	}
	
	// execute statement
	if (!$mysqli->query($q)) {
		$errors[] = $mysqli->error;
	}
	header("Location: users.php");
}