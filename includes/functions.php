<?php
#ini_set("display_errors","Off");

function doLogin($username,$password) {
  global $db;

  $strSQL = "SELECT * FROM accounts WHERE (login = :username OR email = :username) AND password = PASSWORD(:password)";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':username',$_POST['username']);
  $statement->bindValue(':password',$_POST['password']);

  if (!$statement->execute()) { 
    var_dump( $statement->errorInfo() ); 
  }
  else {
    $arrReturn = $statement->fetchAll(); 
  }

  if (!empty($arrReturn)) {
    return TRUE;
  }
  else {
    return FALSE;
  }
}

// Character related functions

function isProfilePublic() {
  return true;
}

function getCharacterOwner($charid) {
  global $db,$skill_ids;
  
  $strSQL = "SELECT `accid` FROM chars WHERE charid = :charID";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':charID',$charid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    return $arrReturn[0]['accid'];  }
  else {
    return '0';
  }
}

function getCharacterSkill($charid,$skill) {
  global $db,$skill_ids;
  
  $strSQL = "SELECT `value` FROM char_skills WHERE charid = :charID AND skillid = :skillID";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':charID',$charid);
  $statement->bindValue(':skillID',$skill_ids[$skill]);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    return $arrReturn[0]['value'];  }
  else {
    return '0';
  }
}

function getCharacterRank($charid,$rank) {
  global $db;
  
  $strSQL = "SELECT `rank_$rank` FROM char_profile WHERE charid = :charID";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':charID',$charid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    return $arrReturn[0]['rank_'.$rank];  }
  else {
    return '0';
  }
}

function getCharacterFame($charid,$fame) {
  global $db;
  
  $strSQL = "SELECT `fame_$fame` FROM char_profile WHERE charid = :charID";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':charID',$charid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    return $arrReturn[0]['fame_'.$fame];  }
  else {
    return '0';
  }
}

function getCharacterInventory($charid,$slot) {
  global $db;
  
  $strSQL = "SELECT `$slot` FROM char_storage WHERE charid = :charID";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':charID',$charid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    return $arrReturn[0][$slot];  }
  else {
    return '0';
  }
}

function getCharacterHP($charid) {
  global $db;
  
  $strSQL = "SELECT hp FROM char_stats WHERE charid = :charID";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':charID',$charid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    return $arrReturn[0]['hp'];  }
  else {
    return '';
  }
}

function getCharacterMP($charid) {
  global $db;
  
  $strSQL = "SELECT mp FROM char_stats WHERE charid = :charID";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':charID',$charid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    return $arrReturn[0]['mp'];  }
  else {
    return '';
  }
}

function getCharacterExp($charid,$job) {
  global $db;
  
  $strSQL = "SELECT $job FROM char_exp WHERE charid = :charID";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':charID',$charid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    return $arrReturn[0][$job];  }
  else {
    return '';
  }
}

function getCharacterMaxExp($charid) {
  global $db;
  
  $strSQL = "SELECT exp FROM exp_base WHERE level = :level";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':level',getJobLevel($charid,getCharMJob($charid)));

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    return $arrReturn[0]['exp'];  }
  else {
    return '';
  }
}

function getTitle($charid) {
  global $db;
  
  $strSQL = "SELECT title FROM char_stats WHERE charid = :charID";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':charID',$charid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    return $arrReturn[0]['title'];  }
  else {
    return '';
  }
}

function getCharMJob($charid) {
  global $db,$jobs;
  
  $strSQL = "SELECT mjob FROM char_stats WHERE charid = :charID";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':charID',$charid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll();
  }

  if (!empty($arrReturn)) {
    return $jobs[$arrReturn[0]['mjob']];  }
  else {
    return '';
  }
}

function getCharSJob($charid) {
  global $db,$jobs;
  
  $strSQL = "SELECT sjob FROM char_stats WHERE charid = :charID";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':charID',$charid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll();
  }

  if (!empty($arrReturn)) {
    return $jobs[$arrReturn[0]['sjob']];
  }
  else {
    return '';
  }
}

function getJobLevel($charid,$job) {
  global $db;
  
  if ($job != '') {
    
    $strSQL = "SELECT $job FROM char_jobs WHERE charid = :charID";
    $statement = $db->prepare($strSQL);
    
    $statement->bindValue(':charID',$charid);

    if (!$statement->execute()) {
      var_dump( $statement->errorInfo() );
    }
    else {
      $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    if (!empty($arrReturn)) {
      #var_dump($arrReturn);
      return $arrReturn[0][$job];
    }
    else {
      return '0';
    }
  }
  else {
    return '';
  }
}

function getCharacterZone($charid) {
global $db;

  $strSQL = "SELECT pos_zone FROM chars WHERE charid = :charID";
  $statement = $db->prepare($strSQL);
  
  $statement->bindValue(':charID',$charid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    #var_dump($arrReturn);
    return $arrReturn[0]['pos_zone'];
  }
  else {
    return '';
  }
}

// Account related functions

function getAccountName($accid) {
  global $db;

  $strSQL = "SELECT login FROM accounts WHERE id = :id";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':id',$accid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll();
  }

  if (!empty($arrReturn)) {
    return $arrReturn[0]['login'];
  }
  else {
    return 0;
  }
}

function getAccountID($account) {
  global $db;

  $strSQL = "SELECT id FROM accounts WHERE login = :username OR email = :username";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':username',$_SESSION['auth']['username']);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll();
  }

  if (!empty($arrReturn)) {
    return $arrReturn[0]['id'];
  }
  else {
    return 0;
  }

}

// MISC functions
function serverstatus() {
  global $server_address;
  
  if (fsockopen($server_address,54230))
  {
    return 1;
  }
  else
  {
    return 0;
  }
}

function getZoneName($zoneid) {
  global $db, $lang;
  
  $strSQL = "SELECT name FROM zone_settings WHERE zoneid = :zoneID";
  $statement = $db->prepare($strSQL);

  $statement->bindValue(':zoneID',$zoneid);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    $zone = str_replace("_"," ",$arrReturn[0]['name']);
    $zone = str_replace("-"," - ",$zone);
    return $zone;
  }
  else {
    return $lang['text']['general']['unavailable'];
  }
}

function getServerUptime() {
  global $db;

  $strSQL = "SELECT value FROM server_variables WHERE `name` = 'server_start_time' LIMIT 1";
  $statement = $db->prepare($strSQL);

  if (!$statement->execute()) {
    var_dump( $statement->errorInfo() );
  }
  else {
    $arrReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  if (!empty($arrReturn)) {
    return dateDiff(date('Y-m-d',time()),date('Y-m-d',$arrReturn[0]['value']));

  }
  else {
    return '0 seconds';
  }
}

function dateDiff($time1, $time2, $precision = 6) {
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
      $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
      $time2 = strtotime($time2);
    }
 
    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
      $ttime = $time1;
      $time1 = $time2;
      $time2 = $ttime;
    }
 
    // Set up intervals and diffs arrays
    $intervals = array('year','month','day','hour','minute','second');
    $diffs = array();
 
    // Loop thru all intervals
    foreach ($intervals as $interval) {
      // Create temp time from time1 and interval
      $ttime = strtotime('+1 ' . $interval, $time1);
      // Set initial values
      $add = 1;
      $looped = 0;
      // Loop until temp time is smaller than time2
      while ($time2 >= $ttime) {
        // Create new temp time from time1 and interval
        $add++;
        $ttime = strtotime("+" . $add . " " . $interval, $time1);
        $looped++;
      }
 
      $time1 = strtotime("+" . $looped . " " . $interval, $time1);
      $diffs[$interval] = $looped;
    }
    
    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
      // Break if we have needed precission
      if ($count >= $precision) {
 break;
      }
      // Add value and interval 
      // if value is bigger than 0
      if ($value > 0) {
 // Add s if value is not 1
 if ($value != 1) {
   $interval .= "s";
 }
 // Add value and interval to times array
 $times[] = $value . " " . $interval;
 $count++;
      }
    }
 
    // Return string with times
    return implode(", ", $times);
 }
?>
