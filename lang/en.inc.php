<?php

$lang = array();

// Authentication errors
$lang['error']['auth'] = array(
  'empty_username' => 'You must supply a username or email address',
  'empty_password' => 'You must supply a password',
  'invalid_login' => 'The username or password combination you supplied is incorrect'
);

// General page errors
$lang['error']['general'] = array(
  'error_message' => 'Please correct the following errors:',
  'field_required' => 'This is a required field',
);


// Configuration file errors
$lang['error']['config'] = array(
  'missing_config' => 'Your config.php is missing, or is not readable.'
);

// Installation errors
$lang['error']['install'] = array(
  'not_installed' => 'XIWeb does not appear to be installed. Please run setup.',
  'installed' => 'XIWeb appears to already be installed. Please remove the /install/ directory from your webroot.',
  'error_config_file_not_writeable' => 'The file \'config.php\' does not appear to be writeable.',
  'error_db_address_blank' => 'The database address was left blank.',
  'error_db_user_blank' => 'The database user was left blank.',
  'error_db_password_blank' => 'The database password was left blank.',
  'error_db_blank' => 'The database name was left blank.',
  'error_xidb_blank' => 'The XIWeb database name was left blank.'
);

$lang['text']['general'] = array(
  'unavailable' => 'Not Available',
    'ok' => 'OK',
);

$lang['error']['character'] = array(
  'no_access' => 'You do not have access to view this character, or the owner has not made this profile public.'
);