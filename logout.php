<?php
require_once 'include/config.php';
session_start();
$_SESSION['admin'] = false;
header("Location: index.php");
