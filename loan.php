<?php
include('includes/db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id'];
    $loan_date = date('Y-m-d');

    $sql = "INSERT INTO loans (user_id, book_id, loan_date) VALUES ('$user_id', '$book_id', '$loan_date')";
    if ($conn->query($sql) === TRUE) {
        $conn->query("UPDATE books SET available=0 WHERE id='$book_id'");
        echo "Buku Berhasil dipinjam!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM books WHERE available=1";
$result = $conn->query($sql);

include('includes/header.php');
?>

<div class="container">
    <h2>Pinjam Buku</h2>
    <form action="loan.php" method="POST">
        <label for="book_id">Pilih Buku:</label>
        <select id="book_id" name="book_id">
            <?php while($book = $result->fetch_assoc()): ?>
                <option value="<?php echo $book['id']; ?>"><?php echo $book['title']; ?> oleh <?php echo $book['author']; ?></option>
            <?php endwhile; ?>
        </select><br>
        <input type="submit" value="Pinjam">
    </form>
</div>

<?php include('includes/footer.php'); ?>
