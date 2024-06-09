<?php
include('includes/db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM books";
$result = $conn->query($sql);

include('includes/header.php');
?>

<div class="container">
    <h2>Beranda</h2>
    <ul>
        <?php while($book = $result->fetch_assoc()): ?>
            <li><?php echo $book['title']; ?> oleh <?php echo $book['author']; ?> - <?php echo $book['available'] ? 'Tersedia' : 'Tidak Tersedia'; ?></li>
        <?php endwhile; ?>
    </ul>
</div>

<?php include('includes/footer.php'); ?>
