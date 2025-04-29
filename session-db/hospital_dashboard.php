<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: signin.php");
    exit();
}

// Fetch hospital data
$sql = "SELECT COUNT(*) AS num_rooms FROM hospital_rooms";
$result = mysqli_query($conn, $sql);
$num_rooms = mysqli_fetch_assoc($result)['num_rooms'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Hospital Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</p>
        <p>Total Rooms: <?php echo $num_rooms; ?></p>

        <!-- Add links to manage hospital data, view reports, etc. -->
        <a href="manage_rooms.php" class="btn btn-info">Manage Rooms</a><br><br>
        <a href="view_reports.php" class="btn btn-info">View Reports</a><br><br>
        <a href="logout.php" class="btn btn-danger">Log Out</a>
    </div>
</body>
</html>
