<?php
session_start();

$error = array();

// Let's include all of the global stuff we need

include('../config/config.php');
include('../lang/'.$lang.'.inc.php');
include('../includes/functions.inc.php');

// This is step 2, so we need to check and see if $_SESSION['step2']['errors'] is empty (If not, we have validation errors)

if (empty($_POST['address'])) {
  $_SESSION['step2']['errors']['address'] = 1;
}
if (empty($_POST['user'])) {
  $_SESSION['step2']['errors']['user'] = 1;
}
if (empty($_POST['password'])) {
  $_SESSION['step2']['errors']['password'] = 1;
}
if (empty($_POST['database'])) {
  $_SESSION['step2']['errors']['database'] = 1;
}
if (!empty($_SESSION['step2']['errors'])) {
  $_POST['step'] = 2;
  header("Location: install.php");
}


if (!empty($_SESSION['step3']['errors'])) {

}
include_once("pages/header.php");
include_once("pages/step3.php");
include_once("pages/footer.php");

echo $content;

?>