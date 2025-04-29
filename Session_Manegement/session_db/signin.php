<?php
session_start();
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * from users where email = '$email'";
    $result = mysqli_query($conn , $sql);

    // Check if a user with the provided email was found
    if ($row = mysqli_fetch_assoc($result)) {
        // Extract user details from the result
        $hashed_password = $row['password'];
        $user_id = $row['user_id'];
        $name = $row['name'];
        $role_id = $row['role_id'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['role_id'] = $role_id;

            // Redirect based on role
            if ($role_id == 1) 
            {
                header("Location: admin_dashboard.php"); // Admin dashboard
            } 
            elseif ($role_id == 2) 
            {
                header("Location: hospital_dashboard.php"); // Hospital dashboard
            }
            elseif ($role_id == 3) 
            {
                header("Location: user_dashboard.php"); // Hospital dashboard
            }
            else 
            {
                header("Location: user_dashboard.php"); // User dashboard
            }
            exit();
        } else {
            echo "<script>alert('Invalid password'); window.location.href='signin.php';</script>";
        }
    } else {
        echo "<script>alert('No account found with that email'); window.location.href='signin.php';</script>";
    }

    // Close statement and connection
  
}
?>

<h3>Sign In</h3>
<form action="#" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Sign In">
</form>
