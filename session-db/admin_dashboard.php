<?php
// admin_dashboard.php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: signin.php");
    exit();
}

include 'db.php';

// Fetch system statistics
// Example: Number of users
$sql = "SELECT COUNT(*) FROM users";
$result = $conn->query($sql);
$num_users = $result->fetch_row()[0];

// Fetch admin profile picture
$sql = "SELECT profile_picture FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($profile_picture);
$stmt->fetch();
$stmt->close();

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['name']; ?>!</p>
    <p>Total Users: <?php echo $num_users; ?></p>

    <!-- Display the profile picture -->
    <?php if (!empty($profile_picture)) { ?>
        <img src="uploads-images/<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%;">
    <?php } else { ?>
        <p>No profile picture available.</p>
    <?php } ?>

    <!-- Add links to manage users, view reports, etc. -->
    <a href="manage_users.php">Manage Users</a><br>
    <a href="view_reports.php">View Reports</a><br>
    <a href="logout.php">Log Out</a>
</body>
</html>
