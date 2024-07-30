<?php include 'header.php'; ?>

<h2>All Records</h2>

<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'final');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all records
$sql = "SELECT string_id, message FROM string_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["string_id"]. " - Message: " . $row["message"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<form action="delete.php" method="post">
    <input type="number" name="string_id" required>
    <button type="submit" name="delete">Delete</button>
</form>

</body>
</html>

