<?php
require_once('../../database.php');

$file_value = basename(__FILE__, '.php');

$file_value = str_replace("_update", "", $file_value);

if (isset($_POST['action'])) {
    $page_content = filter_input(INPUT_POST, 'editor');
    $side_content = filter_input(INPUT_POST, 'editor2');
    $online_status = filter_input(INPUT_POST, 'online_offline');
    $event_name = filter_input(INPUT_POST, 'edit_name');
    $event_date = filter_input(INPUT_POST, 'edit_date');
    $event_time = filter_input(INPUT_POST, 'edit_time');
    $event_img_path = filter_input(INPUT_POST, 'event_img_path');
    $slideshow_status = filter_input(INPUT_POST, 'slideshow_status');

    if ($online_status == 'offline') {
        $online_status = 0;
    } else {
        $online_status = 1;
    }

    if ($slideshow_status == 'off') {
        $slideshow_status = 0;
    } else {
        $slideshow_status = 1;
    }
}

// query to run the update and set the new values
$update_query = 'UPDATE events
                    SET page_content = :page_content,
                        side_content = :side_content,
                        online_status = :online_status,
                        event_name = :event_name,
                        event_date = :event_date,
                        event_time = :event_time,
                        event_img_path = :event_img_path,
                        slideshow_status = :slideshow_status
                    WHERE file_value = :file_value';
$updateEvent = $db->prepare($update_query);

// bind all the values to the variables
$updateEvent->bindValue(':page_content', $page_content);
$updateEvent->bindValue(':side_content', $side_content);
$updateEvent->bindValue(':online_status', $online_status);
$updateEvent->bindValue(':event_name', $event_name);
$updateEvent->bindValue(':event_date', $event_date);
$updateEvent->bindValue(':event_time', $event_time);
$updateEvent->bindValue(':event_img_path', $event_img_path);
$updateEvent->bindValue(':file_value', $file_value);
$updateEvent->bindValue(':slideshow_status', $slideshow_status);

// execute statement and close
$updateEvent->execute();
$updateEvent->closeCursor();
header('Location: ../' . $file_value . '_editor.php');
die();
