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

 	case 'new':
 		$page_title = 'New user';
 		if (file_exists('include/user_new.php')) {
 			include 'include/user_new.php';
 			$info[] = 'Enter new password for change, or leave this field empty';
 		} else {
 			$errors[] = '"new" template missing'; 		
 		} 		
 		break;

 	case 'edit':
 		$page_title = 'edit user';
 		if (file_exists('include/user_edit.php')) {
 			include 'include/user_edit.php';
 			$info[] = 'Enter new password for change, or leave this field empty';
 		} else {
 			$errors[] = '"edit" template missing'; 		
 		}
 		break;

 	case 'save':
 		if (file_exists('include/user_save.php')) {
 			include 'include/user_save.php';
 		} else {
 			$errors[] = '"save" module missing'; 		
 		}
 		break;

 	case 'delete':
 		if (file_exists('include/user_del.php')) {
 			include 'include/user_del.php';
 		} else {
 			$errors[] = '"delete" module missing'; 		
 		}
 		header("Location: users.php");
 		break;
 	
 	default:
 		$page_title = 'users administration';
 		if (file_exists('include/users_view.php')) {
 			include 'include/users_view.php';
 		} else {
 			$errors[] = '"view" template missing';
 		}
 		break;
} 

include 'templates/main.tpl.php';
