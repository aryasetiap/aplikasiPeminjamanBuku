<?php
include('includes/db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loan_id = $_POST['loan_id'];
    $return_date = date('Y-m-d');

    $sql = "UPDATE loans SET return_date='$return_date' WHERE id='$loan_id'";
    if ($conn->query($sql) === TRUE) {
        $loan = $conn->query("SELECT book_id FROM loans WHERE id='$loan_id'")->fetch_assoc();
        $book_id = $loan['book_id'];
        $conn->query("UPDATE books SET available=1 WHERE id='$book_id'");
        echo "Buku Berhasil dikembalikan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT loans.id, books.title, books.author FROM loans JOIN books ON loans.book_id=books.id WHERE loans.user_id='$user_id' AND loans.return_date IS NULL";
$result = $conn->query($sql);

include('includes/header.php');
?>

<div class="container">
    <h2></h2>
    <form action="return.php" method="POST">
        <label for="loan_id">Buku yang dipinjam:</label>
        <select id="loan_id" name="loan_id">
            <?php while($loan = $result->fetch_assoc()): ?>
                <option value="<?php echo $loan['id']; ?>"><?php echo $loan['title']; ?> oleh <?php echo $loan['author']; ?></option>
            <?php endwhile; ?>
        </select><br>
        <input type="submit" value="Kembalikan">
    </form>
</div>

<?php include('includes/footer.php'); ?>