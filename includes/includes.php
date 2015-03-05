<?php
session_start();

include_once('lang/'.$language.'.inc.php');
$_SESSION['errors'] = '';

$db = new PDO('mysql:host=localhost;dbname=dspweb_dspdb;charset=utf8', 'dspweb', '123qaz'); // Change this to match the config file
$xi = new PDO('mysql:localhost;dbname=dspweb_xiweb;charset=utf8', 'dspweb', '123qaz'); // Change this to match the config file

$skill_ids = array(
  'non' => 2,
  'h2h' => 1,
  'dag' => 2,
  'swd' => 3,
  'gsd' => 4,
  'axe' => 5,
  'gax' => 6,
  'syh' => 7,
  'pol' => 8,
  'kat' => 9,
  'gkt' => 10,
  'clb' => 11,
  'stf' => 12,
  'ame' => 22,
  'ara' => 23,
  'ama' => 24,
  'arc' => 25,
  'mrk' => 26,
  'thr' => 27,
  'grd' => 28,
  'eva' => 29,
  'shl' => 30,
  'par' => 31,
  'div' => 32,
  'hea' => 33,
  'enh' => 34,
  'enf' => 35,
  'ele' => 36,
  'drk' => 37,
  'sum' => 38,
  'nin' => 39,
  'sng' => 40,
  'str' => 41,
  'wnd' => 42,
  'blu' => 43,
  'geo' => 44,
  'hnd' => 45,
  'fsh' => 48,
  'wdw' => 49,
  'smt' => 50,
  'gld' => 51,
  'clt' => 52,
  'lth' => 53,
  'bon' => 54,
  'alc' => 55,
  'cok' => 56,
  'syn' => 57,
  'rid' => 58,
);
?>
