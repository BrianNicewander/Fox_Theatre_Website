<?php
require_once('../../database.php');

if (isset($_POST['action'])) {
    $box_one = filter_input(INPUT_POST, 'editor');
    $box_sponsor = filter_input(INPUT_POST, 'editor2');
    $box_side = filter_input(INPUT_POST, 'editor3');
    $online_status = filter_input(INPUT_POST, 'online_offline');
}
// query to run the update and set the new values

$update_query = 'UPDATE web_content_home
                    SET box_one = :box_one,
                        box_sponsor = :box_sponsor,
                        box_side = :box_side,
                        online_status = :online_status
                    WHERE page_id = 1';
$updateHome = $db->prepare($update_query);

// bind all the values to the variables
$updateHome->bindValue(':box_one', $box_one);
$updateHome->bindValue(':box_sponsor', $box_sponsor);
$updateHome->bindValue(':box_side', $box_side);
$updateHome->bindValue(':online_status', $online_status);

// execute statement and close
$updateHome->execute();
$updateHome->closeCursor();

header('Location: ../home_editor.php');
die();
