<?php

if (!empty($_SESSION['errors'])) {
  $output .= '
   <div class="uk-alert uk-alert-danger uk-width-1-2 uk-align-center">
      <i class="uk-icon uk-icon-times"></i> '.$lang['error']['general']['error_message'].'
      <ul>
  ';
  foreach ($_SESSION['errors'] as $error) {
    $output .= '
        <li>'.$error.'</li>
    ';
  }
  $output .= '
      </ul>
    </div>
';
}
else {
  $output .= '    <br />';
}

if ($page == 'messages') {
  $output .= '
  <div class="uk-panel uk-panel-box uk-align-center uk-width-1-2">
      <h3 class="uk-panel-title"><i class="uk-icon uk-icon-envelope"></i> Messages</h3>
      <hr class="uk-panel-divider" />
      <span class="uk-text-small"><i class="uk-icon uk-icon-plus"></i> <a href="messages.php?a=compose">Compose</a></span>
      <hr class="uk-panel-divider" />
      <div class="uk-panel uk-panel-box uk-panel-box-secondary">
        <table class="uk-table uk-table-hover uk-table-condensed uk-text-small">
          <tbody>
            <tr>
              <td><a href="messages.php?cid=12" style="display: block;"><strong>Lotus</strong><br />
              <i class="uk-icon uk-icon-reply"></i> This is only a test ...<br />
              <em class="uk-text-muted uk-align-right">6:35PM</em></a></td>
            </tr>
            <tr>
              <td><a href="messages.php?cid=11" style="display: block;"><strong>Exor</strong><br />
              <i class="uk-icon uk-icon-check"></i> This is another message<br />
              <em class="uk-text-muted uk-align-right">3/10/2015 4:00AM</em></a></td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
    
    <!-- This is the modal -->
    <div id="my-modal" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <div class="uk-panel">
              <div class="uk-panel-title">Friend 1</div>
              <hr class="uk-panel-divider" />
              <h3 class="uk-panel-title uk-text-right">You</h3>
              <div class="uk-panel uk-panel-box uk-panel-box-primary uk-text-right">
                Hey there!
              </div>
              <br />
              <h3 class="uk-panel-title">Friend 1</h3>
              <div class="uk-panel uk-panel-box uk-panel-box-secondary uk-text-left">
                Hi! Thanks for contacting me!
                
                What is up with you ?
              </div>
              <br />
              <div class="uk-panel uk-width-1-1 uk-align-left">
                <form class="uk-form-horizontal">
                  <div class="uk-form-row">
                    <div style="width: 100%;"><input type="text" placeholder="username or email" style="width: 90%;" /><button style="width: 10%;">Send</button></div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
    
    <!-- This is the off-canvas sidebar -->
    <div id="my-id" class="uk-offcanvas">
      <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">
      <div class="uk-panel">
        <h3 class="uk-panel-title">Online Friends (1)</h3>
        <span><a href="#" class="uk-text-primary"><i class="uk-icon uk-icon-user-plus"></i> Add friend</a></span>
        <hr class="uk-panel-divider" />
        <i class="uk-icon uk-icon-toggle-on uk-text-success"></i> <a href="#my-modal"  data-uk-modal>Friend 1</a> <i class="uk-icon uk-icon-times uk-text-danger"></i>
        <hr class="uk-panel-divider" />
        <h3 class="uk-panel-title">Offline Friends (4)</h3>
        <hr class="uk-panel-divider" />
        <em class="uk-text-muted"><i class="uk-icon uk-icon-toggle-off"></i> Friend 2 <i class="uk-icon uk-icon-times uk-text-danger"></i></em><br />
        <em class="uk-text-muted"><i class="uk-icon uk-icon-toggle-off"></i> Friend 3 <i class="uk-icon uk-icon-times uk-text-danger"></i></em><br />
        <em class="uk-text-muted"><i class="uk-icon uk-icon-toggle-off"></i> Friend 4 <i class="uk-icon uk-icon-times uk-text-danger"></i></em><br />
        <em class="uk-text-muted"><i class="uk-icon uk-icon-toggle-off"></i> Friend 5 <i class="uk-icon uk-icon-times uk-text-danger"></i></em><br />
        <hr class="uk-panel-divider" />
      </div>
    </div>
  ';
}
else {
  // We are trying to view a conversation, so let's display the HTML code to do so.
}
$output .= '
    
    <!-- This is the modal -->
    <div id="my-modal" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <div class="uk-panel">
              <div class="uk-panel-title">Friend 1</div>
              <hr class="uk-panel-divider" />
              <h3 class="uk-panel-title uk-text-right">You</h3>
              <div class="uk-panel uk-panel-box uk-panel-box-primary uk-text-right">
                Hey there!
              </div>
              <br />
              <h3 class="uk-panel-title">Friend 1</h3>
              <div class="uk-panel uk-panel-box uk-panel-box-secondary uk-text-left">
                Hi! Thanks for contacting me!
                
                What is up with you ?
              </div>
              <br />
              <div class="uk-panel uk-width-1-1 uk-align-left">
                <form class="uk-form-horizontal">
                  <div class="uk-form-row">
                    <div style="width: 100%;"><input type="text" placeholder="username or email" style="width: 90%;" /><button style="width: 10%;">Send</button></div>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
    
    <!-- This is the off-canvas sidebar -->
    <div id="my-id" class="uk-offcanvas">
      <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">
      <div class="uk-panel">
        <h3 class="uk-panel-title">Online Friends (1)</h3>
        <span><a href="#" class="uk-text-primary"><i class="uk-icon uk-icon-user-plus"></i> Add friend</a></span>
        <hr class="uk-panel-divider" />
        <i class="uk-icon uk-icon-toggle-on uk-text-success"></i> <a href="#my-modal"  data-uk-modal>Friend 1</a> <i class="uk-icon uk-icon-times uk-text-danger"></i>
        <hr class="uk-panel-divider" />
        <h3 class="uk-panel-title">Offline Friends (4)</h3>
        <hr class="uk-panel-divider" />
        <em class="uk-text-muted"><i class="uk-icon uk-icon-toggle-off"></i> Friend 2 <i class="uk-icon uk-icon-times uk-text-danger"></i></em><br />
        <em class="uk-text-muted"><i class="uk-icon uk-icon-toggle-off"></i> Friend 3 <i class="uk-icon uk-icon-times uk-text-danger"></i></em><br />
        <em class="uk-text-muted"><i class="uk-icon uk-icon-toggle-off"></i> Friend 4 <i class="uk-icon uk-icon-times uk-text-danger"></i></em><br />
        <em class="uk-text-muted"><i class="uk-icon uk-icon-toggle-off"></i> Friend 5 <i class="uk-icon uk-icon-times uk-text-danger"></i></em><br />
        <hr class="uk-panel-divider" />
      </div>
    </div>
';
?>
