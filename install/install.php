<?php

if (!empty($_POST['step'])) {
  switch($_POST['step']) {
    case '1':
      include_once("step1.php");
      break;
    case '2';
      include_once("step2.php");
      break;
    case '3';
      include_once("step3.php");
      break;
    default:
      include_once("step1.php");
      break;
  }
}
else {
  include_once("step1.php");
}
?>