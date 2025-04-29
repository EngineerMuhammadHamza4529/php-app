<?php
include 'db.php';
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>
    <h2>Welcome to the Admin Panel</h2>
    <p>Hello, <?php echo htmlspecialchars($_SESSION['email']); ?>!</p>
    <a href="logout.php">Logout</a>
    <!-- Your admin panel content goes here -->
</body>
</html>



