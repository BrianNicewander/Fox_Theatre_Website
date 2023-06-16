<?php

require_once('../../database.php');

if (isset($_POST['action'])) {
    $page_content = filter_input(INPUT_POST, 'editor');
}

// query to run the update and set the new values

$update_query = 'UPDATE web_content_side
                    SET page_content = :page_content
                    WHERE page_id = 25';
$updateHome = $db->prepare($update_query);

// bind all the values to the variables
$updateHome->bindValue(':page_content', $page_content);

// execute statement and close
$updateHome->execute();
$updateHome->closeCursor();

header('Location: ../live_season_lineup_editor.php');
