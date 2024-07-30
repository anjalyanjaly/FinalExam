
<?php
include 'header.php'; 

if (isset($_POST['delete'])) {
    $string_id = $_POST['string_id'];

   
    $conn = new mysqli('localhost', 'root', '', 'final');

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM string_info WHERE string_id = ?");
    $stmt->bind_param("i", $string_id);

   
    if ($stmt->execute()) {
        echo "<p>Record deleted successfully</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p>No record specified for deletion.</p>";
}
?>

<a href="index.php">Back to Home</a>

</body>
</html>
