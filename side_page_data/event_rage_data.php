<?php
// data for events

require_once('database.php');

$file_value = basename(__FILE__, '.php');

$file_value = str_replace("_data", "", $file_value);

// Title of page
$query = 'SELECT * FROM events
                  WHERE file_value = :file_value';
$pageStatement = $db->prepare($query);

$pageStatement->bindValue(':file_value', $file_value);

$pageStatement->execute();
$pageInfo = $pageStatement->fetch();
$pageStatement->closeCursor();

$event_name = $eventInfo[2];

//----------------------------------------------

$head_title = $eventInfo[6];

//----------------------------------------------


$page_content = $eventInfo[7];

//----------------------------------------------

$side_content = $eventInfo[8];

//----------------------------------------------
