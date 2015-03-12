<?php

$content .= '
<body>
  <div class="uk-grid uk-grid-condensed">
    <div class="uk-width-1-1">
      <div class="uk-panel uk-panel-box">
        <h3 class="uk-panel-title">DSPWeb Installation - Database Configuration</h3>
        <div class="uk-progress uk-progress-striped uk-active">
          <div class="uk-progress-bar" style="width: 66%;"></div>
        </div>
      </div>
';

if (!empty($error)) {
  $content .= dump_errors($error);
}

$content .= '
      <div class="uk-panel uk-panel-box">
        <h3 class="uk-panel-title">Database Configuration</h3>
        <form class="uk-form uk-form-horizontal" method="POST" action="install.php">
          <div class="uk-form-row">
            <label class="uk-form-label">Database Server:</label>
            <div class="uk-form-controls"><input type="text" name="address" placeholder="server address" class="uk-form-danger" />
              <span class="uk-form-inline-help uk-text-danger">Required</span>
            </div>
          </div>
          <div class="uk-form-row">
            <label class="uk-form-label">Server Port:</label>
            <div class="uk-form-controls"><input type="text" name="port" placeholder="server port" class="uk-form-success" /></div>
          </div>
          <div class="uk-form-row">
            <label class="uk-form-label">Database User:</label>
            <div class="uk-form-controls"><input type="text" name="user" placeholder="database user" class="uk-form-success" /></div>
          </div>
          <div class="uk-form-row">
            <label class="uk-form-label">Database Password:</label>
            <div class="uk-form-controls"><input type="password" name="password" placeholder="database password" class="uk-form-success"  /></div>
          </div>
          <div class="uk-form-row">
            <label class="uk-form-label">Database Name:</label>
            <div class="uk-form-controls"><input type="text" name="database" placeholder="database name" class="uk-form-danger" />
              <span class="uk-form-inline-help uk-text-danger">Invalid database name</span>
            </div>
          </div>
          <input type="hidden" name="step" value="3" />
          <div class="uk-form-row">
            <button class="uk-button uk-button-secondary">Back</button>
            <button class="uk-button uk-button-secondary" type="submit">Next</button>
          </div>
        </form>
      </div>
    </div>
  </div>  
  </body>
';

?>