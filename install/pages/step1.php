<?php

$content .= '
<body>
  <div class="uk-grid uk-grid-condensed">
    <div class="uk-width-1-1 uk-align-center">
      <div class="uk-panel uk-panel-box">
        <h3 class="uk-panel-title">DSPWeb Installation - Initial Checks</h3>
        <div class="uk-progress uk-progress-striped uk-active">
          <div class="uk-progress-bar" style="width: 33%;"></div>
        </div>
      </div>
';
if (!empty($error)) {
  $content .= dump_errors($error);
}
else {
  $content .= '
      <div class="uk-alert uk-alert-success uk-align-center uk-width-1-2"><i class="uk-icon uk-icon-check"></i> Initial checks complete</div>
  ';
}
$content .= '
      <div class="uk-panel uk-panel-box">
        <h3 class="uk-panel-title">Initial Checks</h3>
        <form method="POST" action="install.php">
        '.(!defined('INSTALLED') ? '<div class="uk-text-success">Checking for existing installation <i class="uk-icon uk-icon-check"></i> '.lang('OK').'</div>' : '<div class="uk-text-danger"><i class="uk-icon uk-icon-times"></i> '.lang_error('error_dspweb_installed').'</div>').'
        '.(is_writeable('../config/') ? '<div class="uk-text-success">Checking for \'config\' <i class="uk-icon uk-icon-check"></i> '.lang('OK').'</div>' : '<div class="uk-text-danger">Checking write permissions for \'config\' <i class="uk-icon uk-icon-times"></i> '.lang_error('error_config_folder_not_writeable').'</div>').'
        '.(is_writeable('../config/config.php') ? '<div class="uk-text-success">Checking for \'config/config.php\' <i class="uk-icon uk-icon-check"></i> '.lang('OK').'</div>' : '<div class="uk-text-danger">Checking write permissions for \'config/config.php\' <i class="uk-icon uk-icon-times"></i> '.lang_error('error_config_file_not_writeable').'</div>') .'
        '.(!empty($error) ? '<a class="uk-button" href="install.php">Recheck</a>' : '') .'
        <br />
        <br />
        <input type="hidden" name="step" value="2" />
        '.(empty($error) ? '<button class="uk-button uk-button-secondary">Next</button>' : '') .'
        </form>
      </div>
    </div>
  </div>  
  </body>
';

?>