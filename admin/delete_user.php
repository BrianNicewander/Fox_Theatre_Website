<?php
require_once('../database.php');

// Get IDs
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);


// Delete the users from the database
if ($id != false) {
    $query = 'DELETE FROM login
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the user page
include('index.php');