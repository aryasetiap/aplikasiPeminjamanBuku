<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Peminjaman Buku</title>
    <link rel="stylesheet" href="/book_loan/css/style.css">
</head>
<body>
    <header>
        <h1>Aplikasi Peminjaman Buku</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
            <nav>
                <a href="/book_loan/dashboard.php">Beranda</a> | 
                <a href="/book_loan/loan.php">Pinjam Buku</a> | 
                <a href="/book_loan/return.php">Kembalikan Buku</a> | 
                <a href="/book_loan/logout.php">Keluar</a>
            </nav>
        <?php else: ?>
            <nav>
                <a href="/book_loan/index.php">Beranda</a> | 
                <a href="/book_loan/login.php">Masuk</a> | 
                <a href="/book_loan/register.php">Daftar</a>
            </nav>
        <?php endif; ?>
    </header>
    <main>
