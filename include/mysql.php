<?php
/* MySQL account */
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'sibers';

$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

if ($mysqli->connect_errno) {
	error_log('error connect mysql!');
}
