<?php

    session_start();

    // Get the product data
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $user = filter_input(INPUT_POST, 'user');
    $password = filter_input(INPUT_POST, 'password');
    $level = filter_input(INPUT_POST, 'level', FILTER_VALIDATE_INT);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Validate inputs
    if ($id == null || $user == null || $password == null || $level == null) {
        $error = "Invalid product data. Check all fields and try again.";
        include('error.php');
    } else {
        require_once('database.php');

    // Add the users to the database  
    $query = 'INSERT INTO login
                 (id, user, password, level)
              VALUES
                 (:id, :user, :password, :level)';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':user', $user);
    $statement->bindValue(':password', $hashed_password);
    $statement->bindValue(':level', $level);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>