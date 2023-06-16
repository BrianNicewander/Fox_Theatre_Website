<?php
// data for side pages

require_once('database.php');

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
