<?php
$dsn = 'mysql:host=localhost;dbname=company';
$username = 'root';
$password = '';
$options = [];
try {
    $con = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
}