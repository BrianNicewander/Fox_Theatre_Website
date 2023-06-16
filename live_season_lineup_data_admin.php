<?php
// data for side pages

require_once('../database.php');

// Title of page
$query = 'SELECT * FROM web_content_side
                  WHERE page_id = 25';
$pageStatement = $db->prepare($query);
$pageStatement->execute();
$pageInfo = $pageStatement->fetch();
$pageStatement->closeCursor();

$head_title = $pageInfo[1];

//----------------------------------------------


$page_content = $pageInfo[2];

//----------------------------------------------


$Page_name = $pageInfo[3];

//----------------------------------------------