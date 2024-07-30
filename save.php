<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final";

if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO string_info (message) VALUES (?)");
    $stmt->bind_param("s", $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<a href="index.php">Back to index</a>
