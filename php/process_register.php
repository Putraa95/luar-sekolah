<?php
// Koneksi ke database
include 'db_config.php';

// Ambil data dari form
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password']; // Password langsung dari form
$role = 'peserta'; // Default role

// Validasi input
if (strlen($fullname) > 30 || strlen($email) > 30 || strlen($phone) > 15 || strlen($password) > 10) {
    echo "Data melebihi batas panjang kolom.";
    exit;
}

// Query untuk menyimpan data ke tabel `users`
$sql = "INSERT INTO users (fullname, email, phone, password, role) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sssss", $fullname, $email, $phone, $password, $role);

// Eksekusi query
if ($stmt->execute()) {
    // Redirect ke halaman login
    header("Location: ../html/login.html");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
