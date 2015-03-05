<?php
session_start();

$error = array();

// Let's include all of the global stuff we need

include('../config/config.php');
include('../lang/'.$lang.'.inc.php');
include('../includes/functions.inc.php');

// This is step 2, so we need to check and see if $_SESSION['step2']['errors'] is empty (If not, we have validation errors)

if (!empty($_SESSION['step2']['errors'])) {
  if (!empty($_SESSION['step2']['errors']['address'])) {
    $error[] = lang_error('error_db_address_blank');
  }
  if (!empty($_SESSION['step2']['errors']['user'])) {
    $error[] = lang_error('error_db_user_blank');
  }
  if (!empty($_SESSION['step2']['errors']['password'])) {
    $error[] = lang_error('error_db_password_blank');
  }
  if (!empty($_SESSION['step2']['errors']['database'])) {
    $error[] = lang_error('error_db_blank');
  }
}
include_once("pages/header.php");
include_once("pages/step2.php");
include_once("pages/footer.php");

echo $content;

?>