<?php
include('db.php'); // Include your database connection

session_start();
// Admin details
 $_SESSION['email'] = 'admin@admin.com';
 $_SESSION['password'] = 'admin123';

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL query to insert admin user
$sql = "INSERT INTO admin (email, password) VALUES ('$email', '$hashed_password')";

if (mysqli_query($conn, $sql)) {
    echo "Admin user created successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>



