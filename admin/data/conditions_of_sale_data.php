<?php
// data for side pages

require_once('../database.php');

$file_value = basename(__FILE__, '.php');

$file_value = str_replace("_data", "", $file_value);

// Title of page
$query = 'SELECT * FROM web_content_side
                  WHERE file_value = :file_value';
$pageStatement = $db->prepare($query);

$pageStatement->bindValue(':file_value', $file_value);

$pageStatement->execute();
$pageInfo = $pageStatement->fetch();
$pageStatement->closeCursor();

$head_title = $pageInfo[1];

//----------------------------------------------


$page_content = $pageInfo[2];

//----------------------------------------------


$Page_name = $pageInfo[3];

//----------------------------------------------

$page_id = $pageInfo[0];

//----------------------------------------------

$status = $pageInfo[7];

$statusOn = "";
$statusOff = "";

if ($status == 1) {
    $statusOn = "checked";
}
if ($status == 0) {
    $statusOff = "checked";
};

//----------------------------------------------

$menuStatus = $pageInfo[8];

$menuStatusOn = "";
$menuStatusOff = "";

if ($menuStatus == 1) {
    $menuStatusOn = "checked";
}
if ($menuStatus == 0) {
    $menuStatusOff = "checked";
};
