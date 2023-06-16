<?php

     session_start();

    // Get the user's data
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $user = filter_input(INPUT_POST, 'user');
    $password = filter_input(INPUT_POST, 'password');
    $level = filter_input(INPUT_POST, 'level');

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    //Validate inputs
    if ( $id == null || $user == null || $password == null || $level == null ) {
        $error = "Invalid product data. Check all fields and try again.";
        include('error.php');
    } else {
         require_once('database.php');

    // update the users on the database
    $query = 'UPDATE login
               SET user = :user, password = :password, level = :level
               Where id = :id;';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':user', $user);
    $statement->bindValue(':password', $hashed_password);
    $statement->bindValue(':level', $level);
    $statement->execute();
    $statement->closeCursor();

    // Display the users page
   include('index.php');
}
?>