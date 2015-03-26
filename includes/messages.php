<?php

// Let's get the list of messages that we have here.

$strSQL = "SELECT * FROM messages GROUP BY cid";
$statement = $xi->prepare($strSQL);

if (!$statement->execute()) {
  watchdog($statement->errorInfo(),'SQL');
}
else {
  $conversations = $statement->fetchAll(PDO::FETCH_ASSOC);
}

$page = 'messages';
?>
