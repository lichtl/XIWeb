<?php
session_start();

$_SESSION['errors']['install'] = '';

include_once('../lang/en.inc.php');

// We are on step 1, which is checking to see if installation can continue.

// Let's see if the config file has been located first, and if it has, let's include it to see if XIWeb has been installed
// already

if (file_exists('../config.php')) {
  include_once('../config.php');
}

// If XIWeb is already installed, throw an error
if (defined('INSTALLED')) {
  $_SESSION['errors']['install'][] = $lang['error']['install']['installed'];
} 

// If the config file is not writeable, throw an error
if (!is_writeable('../config.php')) {
  $_SESSION['errors']['install'][] = $lang['error']['install']['error_config_file_not_writeable'];
}
else { // If everything is good, let's allow step2 to be completed.
  $_SESSION['step'] = 2;
}

include_once('views/header.php');
include_once('views/step1.php');
include_once('views/footer.php');

echo $content;
?>