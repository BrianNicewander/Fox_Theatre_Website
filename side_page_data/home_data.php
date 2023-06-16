<?php
// data for the home page

require_once('database.php');

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