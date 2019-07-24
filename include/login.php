<?php
require_once 'includes/functions.php';
/* sanitize */
$login = filter_input(INPUT_POST, login, FILTER_SANITIZE_STRING );
echo $login;

//if ($_POST['login'] == $adm_login)