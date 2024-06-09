<?php
include('includes/db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: dashboard.php');
            exit();
        } else {
            echo "Pasword Salah!";
        }
    } else {
        echo "Pengguna tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Masuk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="container">
        <h1>Masuk</h1>
        <form action="login.php" method="POST">
            <label for="username">Nama Pengguna:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Kata Sandi:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Masuk">
        </form>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
