<?php
// hapus_peserta.php

include 'db_config.php'; // Menghubungkan ke database

// Mendapatkan ID peserta dari URL
$id = $_GET['id'];

// Query untuk menghapus peserta berdasarkan ID
$deleteQuery = "DELETE FROM users
 WHERE id = $id";
mysqli_query($conn, $deleteQuery);

// Redirect ke halaman kelola_data.php setelah menghapus
header('Location: kelola_data.php');
exit();


?>