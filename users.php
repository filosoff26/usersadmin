<?php
/* users administration main page */

/* check access */
session_start();
if ($_SESSION['admin'] != true) {
	header('Location: index.php');
	exit();
}

switch ($_GET['action']) {
 	case 'view':
 		$page_title = 'user info';
 		break;
 	case 'edit':
 		$page_title = 'edit user';
 		break;
 	case 'delete':
 		$page_title = 'del user';
 		break;
 	
 	default:
 		$page_title = 'users administration';
 		if (file_exists('include/users_view.php'))
 			include 'include/users_view.php';
 		else
 			$errors[] = '"view" template missing';
 		break;
} 

include 'templates/main.tpl.php';
