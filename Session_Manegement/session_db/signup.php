<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_id = 1; 

   
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
    $sql = "INSERT INTO users (name, email, password, profile_picture, role_id) VALUES ('$name' , '$email' , '$hashed_password' , '$profile_picture' , '$role_id')";
   
    if (mysqli_query($conn , $sql)) {
        echo "<script>alert('Successfully signed up'); window.location.href='signin.php';</script>";
    } else {
        echo "Error:";
    

    
}
}
?>



                            <h3>Sign Up</h3>
          
<form action="#" method="post" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="profile_picture">Profile Picture:</label>
    <input type="file" id="profile_picture" name="profile_picture"><br>

    <input type="submit" value="Sign Up">
</form>

