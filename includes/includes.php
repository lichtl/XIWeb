<?php
session_start();

include_once('lang/'.$language.'.inc.php');
$_SESSION['errors'] = '';

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8', ''.$db_user.'', ''.$db_pass.''); 
$xi = new PDO('mysql:host='.$db_host.';dbname='.$xi_name.';charset=utf8', ''.$db_user.'', ''.$db_pass.'');

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

$jobs = array(
  0 => '',     // None
  1 => 'war',  // Warrior
  2 => 'mnk',  // Monk
  3 => 'whm',  // White Mage
  4 => 'blm',  // Black Mage
  5 => 'rdm',  // Red mage
  6 => 'thf',  // Thief
  7 => 'pld',  // Paladin
  8 => 'drk',  // Dark Knight
  9 => 'bst',  // Beastmaster
  10 => 'brd', // Bard
  11 => 'rng', // Ranger
  12 => 'sam', // Samurai
  13 => 'nin', // Ninja
  14 => 'drg', // Dragoon
  15 => 'smn', // Summoner
  16 => 'blu', // Blue Mage
  17 => 'cor', // Corsair
  18 => 'pup', // Puppetmaster
  19 => 'dnc', // Dancer
  20 => 'sch', // Scholar
  21 => 'geo', // Geomancer
  22 => 'run', // Rune fencer
);
?>
