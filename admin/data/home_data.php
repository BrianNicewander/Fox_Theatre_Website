<?php
// data for the home page

require_once('../database.php');

// Title of page
$query = 'SELECT * FROM web_content_home
                  WHERE page_id = 1';
$pageStatement = $db->prepare($query);
$pageStatement->execute();
$pageInfo = $pageStatement->fetch();
$pageStatement->closeCursor();

$head_title = $pageInfo[1];

//----------------------------------------------

$box_one = $pageInfo[3];

//----------------------------------------------


$box_sponsor = $pageInfo[4];

//----------------------------------------------


$box_side = $pageInfo[6];

//----------------------------------------------

$status = $pageInfo[9];

$statusOn = "";
$statusOff = "";

if ($status == 1) {
    $statusOn = "checked";
}
if ($status == 0) {
    $statusOff = "checked";
};

$query = 'SELECT * FROM events';
$eventsFilmsStatement = $db->prepare($query);
$eventsFilmsStatement->execute();
$slideInfo = $eventsFilmsStatement->fetch();
$eventsFilmsStatement->closeCursor();

$slideStatusOff = "";

$slideStatus = $slideInfo[12];

if ($slideStatus == 0) {
    $slideStatusOff = "checked";
};
