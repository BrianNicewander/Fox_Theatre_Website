<?php
// data for events

require_once('../database.php');

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

$head_title = $eventInfo[6];

$event_name = $eventInfo[2];

//----------------------------------------------

$event_date = $eventInfo[3];

//----------------------------------------------

$event_time = $eventInfo[4];

//----------------------------------------------

$head_title = $eventInfo[6];

//----------------------------------------------


$page_content = $eventInfo[7];

//----------------------------------------------

$side_content = $eventInfo[8];

//----------------------------------------------
$status = $eventInfo[11];

$statusOn = "";
$statusOff = "";

if ($status == 1) {
    $statusOn = "checked";
}
if ($status == 0) {
    $statusOff = "checked";
};

$slideStatus = $pageInfo[12];

$slideStatusOn = "";
$slideStatusOff = "";

if ($slideStatus == 1) {
    $slideStatusOn = "checked";
};
if ($slideStatus == 0) {
    $slideStatusOff = "checked";
};
