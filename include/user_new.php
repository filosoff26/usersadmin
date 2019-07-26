<?php
/* New user */

require_once('include/mysql.php');

$data = [
	'login' => '',
	'password' => '',
	'name' => '',
	'surname' => '',
	'gender' => '',
	'birthdate' => '',
];
$allow_delete = false;
include 'templates/editform.tpl.php';