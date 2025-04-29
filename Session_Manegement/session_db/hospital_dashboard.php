<?php
// hospital_dashboard.php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: signin.php");
    exit();
}

include 'db.php';

// Fetch hospital data
// Example: Number of hospital rooms
$sql = "SELECT COUNT(*) FROM hospital_rooms";
$result = $conn->query($sql);
$num_rooms = $result->fetch_row()[0];

// Add more data as needed

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Dashboard</title>
</head>
<body>
    <h1>Hospital Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['name']; ?>!</p>
    <p>Total Rooms: <?php echo $num_rooms; ?></p>

    <!-- Add links to manage hospital data, view reports, etc. -->
    <a href="manage_rooms.php">Manage Rooms</a><br>
    <a href="view_reports.php">View Reports</a><br>
    <a href="logout.php">Log Out</a>
</body>
</html>
