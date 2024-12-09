<?php
// Koneksi ke database
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        echo "Silakan isi email dan password.";
        exit;
    }

    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Query untuk mencocokkan email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $password === $user['password']) { // Cek password plain text
        // Password valid, buat session
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['fullname'] = $user['fullname'];

        // Redirect ke dashboard setelah login berhasil
        header("Location: ../html/Dashboard.html");
        exit;
    } else {
        echo "Login gagal. Email atau password salah.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Metode tidak diizinkan.";
}
?>
