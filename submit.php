<?php
$title = "Submit";
require_once './includes/header.php';
require_once './db/conn.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['message'];

    // Prevent SQL injection
    $message = mysqli_real_escape_string($conn, $message);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO string_info (message) VALUES (?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("s", $message);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "New record created successfully";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<?php 
require_once "./includes/footer.php";
?>