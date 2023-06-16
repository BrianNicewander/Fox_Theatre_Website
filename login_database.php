<?php
// connection to database.ini into a variable
$config = parse_ini_file('config/login.ini');

// sets up the database in a variable
$dsn = 'mysql:host=localhost;dbname=' . $config['db'];

// creates the database object, gives error if it cannot connect
try {
    $db = new PDO($dsn, $config['username'], $config['password']);
} catch (PDOException $e) {
    // the error message
    die("Failed to connect to Database");
}
