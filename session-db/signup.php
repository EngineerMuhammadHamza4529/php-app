<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_id = 1; // Assuming default role is Admin

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $file_name = $_FILES['profile_picture']['name'];
    $file_tmp = $_FILES['profile_picture']['tmp_name'];
    $file_type = $_FILES['profile_picture']['type'];
    $file_size = $_FILES['profile_picture']['size'];
    $upload_dir = "uploads-images/";

    if (!empty($file_name)) {
        if ($file_type == "image/png" || $file_type == "image/jpg" || $file_type == "image/jpeg") {
            if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                $profile_picture = $file_name;
            } else {
                echo "<script>alert('Error uploading image'); window.location.href='signup.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Invalid image format'); window.location.href='signup.php';</script>";
            exit();
        }
    } else {
        $profile_picture = ""; 
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO users (name, email, password, profile_picture, role_id) VALUES ('$name', '$email', '$hashed_password', '$profile_picture', '$role_id')";
   
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Successfully signed up'); window.location.href='signin.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Sign Up</h3>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="profile_picture">Profile Picture:</label>
                <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
