<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Peminjaman Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="container">
        <h1>Selamat Datang di Aplikasi Peminjaman Buku</h1>
        <p>Silahkan <a href="login.php">Masuk</a> atau <a href="register.php">Daftar</a> untuk melanjutkan.</p>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
