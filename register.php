<?php
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Pendaftaran berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="container">
        <h1>Daftar</h1>
        <form action="register.php" method="POST">
            <label for="username">Nama Pengguna:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Kata Sandi:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Daftar">
        </form>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
