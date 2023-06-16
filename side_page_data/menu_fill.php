<?php
// data for side pages

require_once('database.php');

// Title of page
$query = 'SELECT * FROM web_content_side
                  WHERE page_id = 16';
$pageStatement = $db->prepare($query);
$pageStatement->execute();
$pageInfo = $pageStatement->fetch();
$pageStatement->closeCursor();

$head_title = $pageInfo[1];
