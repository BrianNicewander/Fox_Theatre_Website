<?php
// data for side menus

require_once('database.php');

// Title of menu
$query = 'SELECT * FROM web_content_side
                  WHERE category = "events_films" AND online_status = 1';
$menuStatement = $db->prepare($query);
$menuStatement->execute();
$menuInfo = $menuStatement->fetch();
$menuStatement->closeCursor();


echo $menuInfo["page_name"];
