<?php
require_once('../../database.php');

$file_value = basename(__FILE__, '.php');

$file_value = str_replace("_update", "", $file_value);

if (isset($_POST['action'])) {
    $page_content = filter_input(INPUT_POST, 'editor');
    $online_status = filter_input(INPUT_POST, 'online_offline');

    if ($online_status == 'offline') {
        $online_status = 0;
    } else {
        $online_status = 1;
    }
}

// query to run the update and set the new values
$update_query = 'UPDATE web_content_side
                    SET page_content = :page_content,
                    online_status = :online_status
                    WHERE file_value = :file_value';
$updateStatement = $db->prepare($update_query);

// bind all the values to the variables
$updateStatement->bindValue(':page_content', $page_content);
$updateStatement->bindValue(':online_status', $online_status);
$updateStatement->bindValue(':file_value', $file_value);

// execute statement and close
$updateStatement->execute();
$updateStatement->closeCursor();
header('Location: ../' . $file_value . '_editor.php');
die();
