<?php
// user_dashboard.php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 3) {
    header("Location: signin.php");
    exit();
}

include 'db.php';

// Fetch user-specific data
// Example: User profile details
$sql = "SELECT name, email FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($name, $email);
$stmt->fetch();
$stmt->close();

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h1>User Dashboard</h1>
    <p>Welcome, <?php echo htmlspecialchars($name); ?>!</p>
    <p>Email: <?php echo htmlspecialchars($email); ?></p>

    <!-- Add links to manage profile, view orders, etc. -->
    <a href="update_profile.php">Update Profile</a><br>
    <a href="view_orders.php">View Orders</a><br>
    <a href="logout.php">Log Out</a>
</body>
</html>
