<?php
/* delete user */

require_once ('include/mysql.php');
if (isset($_GET['login'])) {
	$login = filter_input(INPUT_GET, login, FILTER_SANITIZE_STRING);
	$q = "DELETE FROM users WHERE login='$login'";
	if ($mysqli->query($q)) {
		$info[] = "Deleted user $login";
	} else {
		$error[] = "User $login not found";
	}
}