<?php
require_once 'include/functions.php';

/* routing */
session_start();
if ($_SESSION['admin'] == true) {
	header('Location: users.php');
	exit();
} else {
	require 'templates/login.tpl.php';
}

/* Show all warnings and errors */
if ($warnings) {
	foreach ($warnings as $msg) {
		echo $msg;
	}
}
if ($errors) {
	foreach ($errors as $msg) {
		echo $msg;
	}
}
