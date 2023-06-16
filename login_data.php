<?php

require("login_database.php");

if (isset($_POST['username'])) {

    $username = $_POST['username'];

    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = 'SELECT * FROM login
                  WHERE user = ?';
    $loginStatement = $db->prepare($query);

    $loginStatement->bindParam(1, $username);

    $loginStatement->execute();
    $user = $loginStatement->fetch();

    $loginStatement->closeCursor();
    $level = $user[3];

    if(password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['authorized'] = TRUE;
        $_SESSION['level'] = $level;
        header('Location: admin/select_editor.php');
    } else {
        echo " You Have Entered An Incorrect Password or Username";
        exit();
    }
}

