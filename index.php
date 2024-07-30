
<?php
// Check if header.php file exists
if (file_exists('header.php')) {
    include 'header.php';
} else {
    echo "Error: header.php file not found.";
}
?>

<form action="submit.php" method="post">
    <input type="text" name="message" maxlength="50" required>
    <button type="submit" name="submit">Submit</button>
</form>

<a href="showAll.php">Show all records</a>

</body>
</html>
