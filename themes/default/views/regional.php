<?php

if (!empty($_SESSION['errors']['login'])) {
  $output .= '
   <div class="uk-alert uk-alert-danger uk-width-1-2 uk-align-center">
      <i class="uk-icon uk-icon-times"></i> '.$lang['error']['general']['error_message'].'
      <ul>
  ';
  foreach ($_SESSION['errors']['login'] as $error) {
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
  $output .= '
    <br />';
}

$output .= '
    <div class="uk-panel uk-panel-box uk-align-center uk-width-1-2">
      <h3 class="uk-panel-title"><i class="uk-icon uk-icon-globe"></i> Regional</h3>
      <hr class="uk-panel-divider" />
      <img id="Image-Maps-Com-image-maps-2015-03-09-214111" src="themes/default/images/Vanadiel_map.jpg" border="0" width="750" height="750" orgWidth="750" orgHeight="750" usemap="#image-maps-2015-03-09-214111" alt="" />
	<map name="image-maps-2015-03-09-214111" id="ImageMapsCom-image-maps-2015-03-09-214111">
	<area  alt="" title="" href="sandoria.html" shape="rect" coords="247,225,272,250" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="ronfaure.html" shape="rect" coords="246,253,271,278" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="zulkhelm.html" shape="rect" coords="254,335,279,360" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="taznavian_archipelago" shape="rect" coords="97,335,122,360" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="volbow.html" shape="rect" coords="127,370,152,395" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="kuzotz.html" shape="rect" coords="113,508,138,533" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="guestaberg.html" shape="rect" coords="235,453,260,478" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="bastok.html" shape="rect" coords="310,446,335,471" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="movalpolos.html" shape="rect" coords="347,422,372,447" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="derfland.html" shape="rect" coords="358,328,383,353" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="jeuno.html" shape="rect" coords="407,283,432,308" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="norvallen.html" shape="rect" coords="339,212,364,237" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="fauregandi.html" shape="rect" coords="358,177,383,202" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="valdeaunia" shape="rect" coords="226,154,251,179" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="qufim.html" shape="rect" coords="445,224,470,249" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="tu\'lia.html" shape="rect" coords="479,178,504,203" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="elshimo_lowlands.html" shape="rect" coords="574,561,599,586" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="elshimo_uplands.html" shape="rect" coords="635,561,660,586" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="windurst.html" shape="rect" coords="498,472,523,497" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="sarutabaruta.html" shape="rect" coords="504,420,529,445" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="kolshushu.html" shape="rect" coords="537,369,562,394" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="argoneu.html" shape="rect" coords="513,308,538,333" style="outline:none;" target="_self"     />
	<area  alt="" title="" href="li\'telor.html" shape="rect" coords="597,296,622,321" style="outline:none;" target="_self"     />
      </map>
      <br />
      <br />
      <div class="uk-panel uk-panel-box uk-panel-box-secondary">
        <h3 class="uk-panel-title"><i class="uk-icon uk-icon-binoculars"></i> Who\'s Online <em class="uk-text-small uk-text-muted">'.OnlineCount().' players online</em></h3>
        <hr class="uk-panel-divider" />
';
if (empty($onlineList)) {
  $output .= '
	<em class="uk-text-muted">Nobody online</em>
  ';
}
else {
  $output .= '
        <div class="uk-panel uk-panel-box">
          <table class="uk-table uk-table-striped uk-table-hover uk-table-condensed uk-text-small">
            <thead>
              <tr>
               <th>Character Name</th>
               <th>Main Job</th>
               <th>Location</th>
              </tr>
            </thead>
            <tbody>
  ';
  foreach ($onlineList as $ol) {
    $output .= '
              <tr>
                <td><a href="characters.php?id='.$ol['charid'].'">'.getCharacterName($ol['charid']).'</a></td>
                <td>'.getJobLevel($ol['charid'],getCharMJob($ol['charid'])) .' '.strtoupper(getCharMJob($ol['charid'])).'</td>
                <td>'.getZoneName(getCharacterZone($ol['charid'])).'</td>
              </tr>
    ';
  }
}
$output .= '
            </tbody>
          </table>
        </div>
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
?>
