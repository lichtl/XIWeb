<?php
session_start();

include_once('lang/'.$language.'.inc.php');
$_SESSION['errors'] = '';

$db = new PDO('mysql:host=localhost;dbname=dspweb_dspdb;charset=utf8', 'dspweb', '123qaz'); // Change this to match the config file
$xi = new PDO('mysql:host=localhost;dbname=dspweb_xiweb;charset=utf8', 'dspweb', '123qaz'); // Change this to match the config file
?>
