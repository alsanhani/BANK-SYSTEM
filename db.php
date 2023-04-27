<?php
$dsn = 'mysql:host=localhost;dbname=signup';
$username = 'root';
$password = '';
try {
$connection = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    $error_message= $e->getMessage();
    echo ($error_message);
}