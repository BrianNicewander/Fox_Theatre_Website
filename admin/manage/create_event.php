<?php
require_once('../../database.php');

if (isset($_POST['action'])) {
    $event_name = filter_input(INPUT_POST, 'event_name');
    $event_date = filter_input(INPUT_POST, 'event_date');
    $event_time = filter_input(INPUT_POST, 'event_time');
    $event_img_path = filter_input(INPUT_POST, 'event_img_path');
}

//preset info
$head_title = "The Historic Hutchinson Fox Theatre - Hutchinson, Kansas";
$season_id = 1;
$online_status = 0;
$slideshow_status = 0;
$page_content = "";
$side_content = "";
$file_value = 'event_' . preg_replace('/\s+/', '_', $event_name);
$file_name = $file_value . ".php";

//create the update, data (two places), editors, main page, 

// query to run the update and set the new values
$insert_query = 'INSERT INTO events (season_id, event_name, event_date, event_time, event_img_path, head_title, page_content, side_content, file_value, file_name, online_status, slideshow_status)
                    VALUES (:season_id, :event_name, :event_date, :event_time, :event_img_path, :head_title, :page_content, :side_content, :file_value, :file_name, :online_status, :slideshow_status);';
$createEventRow = $db->prepare($insert_query);

// bind all the values to the variables
$createEventRow->bindValue(':season_id', $season_id);
$createEventRow->bindValue(':event_name', $event_name);
$createEventRow->bindValue(':event_date', $event_date);
$createEventRow->bindValue(':event_time', $event_time);
$createEventRow->bindValue(':event_img_path', $event_img_path);
$createEventRow->bindValue(':head_title', $head_title);
$createEventRow->bindValue(':page_content', $page_content);
$createEventRow->bindValue(':side_content', $side_content);
$createEventRow->bindValue(':file_value', $file_value);
$createEventRow->bindValue(':file_name', $file_name);
$createEventRow->bindValue(':online_status', $online_status);
$createEventRow->bindValue(':slideshow_status', $slideshow_status);


// execute statement and close
$createEventRow->execute();
$createEventRow->closeCursor();

// copy from templates
copy("../templates/ev_data.php", "../data/" . $file_value . "_data.php");
copy("../templates/ev_side_data.php", "../../side_page_data/" . $file_value . "_data.php");
copy("../templates/ev_editor.php", "../" . $file_value . "_editor.php");
copy("../templates/ev_update.php", "../updates/" . $file_value . "_update.php");
copy("../templates/ev_page.php", "../../" . $file_value . ".php");

//redirect page
header("Location: redirect_page_success.php");
