<?php
require_once('../../database.php');
$file_value = filter_input(INPUT_POST, 'editor_selector');

// query to run the update and set the new values
$delete_query = 'DELETE FROM events
                WHERE file_value = :file_value;';
$deletePageRow = $db->prepare($delete_query);

// bind all the values to the variables
$deletePageRow->bindValue(':file_value', $file_value);

// execute statement and close
$deletePageRow->execute();
$deletePageRow->closeCursor();

//Delete the associated files
//get path
$editorPath = '../' . $file_value . '_editor.php';
$dataPath = '../data/' . $file_value . '_data.php';
$dataPathMain = '../../side_page_data/' . $file_value . '_data.php';
$updatePath = '../updates/' . $file_value . '_update.php';
$page_path = '../../' . $file_value . '.php';

//delete
unlink($editorPath);
unlink($dataPath);
unlink($updatePath);
unlink($dataPathMain);
unlink($page_path);

//redirect page
header("Location: redirect_page_success.php");
