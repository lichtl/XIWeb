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
if (!empty($_SESSION['errors']['install'])) {
  $content .= '
            <div class="uk-alert uk-alert-danger uk-align-center uk-width-1-2"><i class="uk-icon uk-icon-times-circle"></i> '.$lang['error']['general']['error_message'].'
              <ul>
  ';
  foreach ($_SESSION['errors']['install'] as $errors) {
    $content .= '
                <li>'.$errors.'</li>
    ';
  }
  $content .= '
              </ul>
            </div>
  ';
}
else {
  $content .= '
      <div class="uk-alert uk-alert-success uk-align-center uk-width-1-2"><i class="uk-icon uk-icon-check"></i> Initial checks complete</div>
  ';
}
$content .= '
      <div class="uk-panel uk-panel-box">
        <h3 class="uk-panel-title">Initial Checks</h3>
        <form method="POST" action="step2.php">
        '.(!defined('INSTALLED') ? '<div class="uk-text-success">Checking for existing installation <i class="uk-icon uk-icon-check"></i> '.$lang['text']['general']['ok'].'</div>' : '<div class="uk-text-danger"><i class="uk-icon uk-icon-times"></i> '.$lang['error']['install']['installed'].'</div>').'
        '.(is_writeable('../config.php') ? '<div class="uk-text-success">Checking for \'config.php\' <i class="uk-icon uk-icon-check"></i> '.$lang['text']['general']['ok'].'</div>' : '<div class="uk-text-danger">Checking write permissions for \'config.php\' <i class="uk-icon uk-icon-times"></i> '.$lang['error']['install']['error_config_file_not_writeable'].'</div>') .'
        <br />
        '.(!empty($_SESSION['errors']['install']) ? '<a class="uk-button" href="index.php">Recheck</a>' : '') .'
        <br />
        <br />
        '.(empty($_SESSION['errors']['install']) ? '<button class="uk-button uk-button-secondary">Next</button>' : '') .'
        </form>
      </div>
    </div>
  </div>  
  </body>
';

?>