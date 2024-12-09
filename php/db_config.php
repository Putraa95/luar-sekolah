<?php
// Koneksi ke database
$host = 'localhost';
$dbname = 'lembaga_pelatihan';
$dbuser = 'root';
$dbpass = '';

try {
    $conn = new mysqli($host, $dbuser, $dbpass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
