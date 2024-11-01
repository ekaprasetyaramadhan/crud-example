<?php
$host = "localhost";
$dbname = "crud_example";
$user = "postgres"; // Ganti dengan username PostgreSQL Anda
$password = "root"; // Ganti dengan password PostgreSQL Anda

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
