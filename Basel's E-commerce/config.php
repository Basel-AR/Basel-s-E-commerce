<?php 

$host = 'localhost';
$username = 'root';
$password = '';
$databse = 'ecommerce_db';

try {
    $conn = new mysqli($host, $username, $password, $databse);
} catch (mysqli_sql_exception $e) {
    die("Connection failed: " . $e->getMessage());
}

if(!$conn->set_charset("utf8mb4")){
    die("Error loading character set utf8mb4: ". $conn->error);
}

?>