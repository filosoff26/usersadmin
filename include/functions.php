<?php
/* TODO: Class */

$warnings = [];
$errors = [];

function sanitize($input)
{
	return mysqli_escape_string();
}

/* configuration */
function configure()
{
	if (file_exists('include/config.php')) {
		include 'include/config.php';
	} else {
		$adm_login = 'admin';
		$adm_pass  = 'secret';
		$warnings[] = 'Default password! Please set a new password.<br>';
	}
	return count($warnings);
}
