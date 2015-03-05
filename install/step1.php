<?php
session_start();

$error = array();

// Let's include all of the global stuff we need

include('../config/config.php');
include('../lang/'.$lang.'.inc.php');
include('../includes/functions.inc.php');

// This is step 1, let's handle checking all of the files and other stuff.

if (defined('INSTALLED')) {
  $error[] = lang_error('error_dspweb_installed');
}
if (!is_writeable('../config/')) {
  $error[] = lang_error('error_config_folder_not_writeable');
}
if (!is_writeable('../config/config.php')) {
  $error[] = lang_error('error_config_file_not_writeable');
}

include_once("pages/header.php");
include_once("pages/step1.php");
include_once("pages/footer.php");

echo $content;

?>