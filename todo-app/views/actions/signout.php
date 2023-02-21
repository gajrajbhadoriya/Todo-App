<?php
session_start();

include dirname(__DIR__, 1) . '/includes/header.php';


$_SESSION = array();

session_destroy();

header('Location: ../login.php');




?>