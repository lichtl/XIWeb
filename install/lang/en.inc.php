<?php

/* ENGLISH LANGUAGE FILE FOR DSPWEB
*
*/

function lang_error($message) {
  $msg = array(
    'error_config_file_missing' => 'Configuration file in \'config/config.php\' is missing. Cannot continue.',
    'errors_exist' => 'There were errors:',
    'error_dspweb_installed' => 'DSPWeb has already been installed. Please use index.php to view your website.',
    'error_config_folder_not_writeable' => 'The config folder located at \'config\' is not writeable.',
    'error_db_address_blank' => 'The database server address cannot be blank.',
    'error_db_user_blank' => 'The database username cannot be blank.',
    'error_db_password_blank' => 'The database password cannot be blank.',
    'error_db_blank' => 'The database name cannot be blank.',
    'error_config_file_not_writeable' => 'The config file located at \'config/config.php\' is not writeable.',
    'install_dir_exist' => 'DSPWeb has located an install directory. Please remove this directory.',
  );
  
  return $msg[$message];
}

function lang($message) {

  $msg = array(
    'OK' => 'Ok',
  );

  return $msg[$message];
}

?>