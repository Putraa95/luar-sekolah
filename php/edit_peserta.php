<?php
// edit_peserta.php

include 'db_config.php'; // Menghubungkan ke database

// Mendapatkan ID peserta dari URL
$id = $_GET['id'] ?? null;

// Pastikan ID ada
if (!$id) {
    echo "ID peserta tidak ditemukan!";
    exit();
}

// Query untuk mengambil data peserta dari tabel users
$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);

// Pastikan data ditemukan
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Data tidak ditemukan!";
    exit();
}

// Menangani pengeditan data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'] ?? '';

    // Query untuk memperbarui fullname peserta di tabel users
    $updateQuery = "UPDATE users SET fullname = '$fullname' WHERE id = $id";
    $updateResult = mysqli_query($conn, $updateQuery);

    // Cek apakah update berhasil
    if ($updateResult) {
        // Redirect ke halaman kelola_data.php setelah edit
        header('Location: kelola_data.php');
        exit();
    } else {
        echo "Gagal memperbarui data!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peserta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css"> <!-- Custom Styles -->
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4>Edit Data Peserta</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Nama Peserta</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo htmlspecialchars($row['fullname'] ?? ''); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
