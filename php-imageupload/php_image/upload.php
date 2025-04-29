<?php
// Database connection
include 'db.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload'])) {
    $fileName = basename($_FILES["image"]["name"]);
    $targetDir = "uploads/Images/";
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        // Create the directory if it doesn't exist
        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0777, true)) {
                die("Failed to create directory.");
            }
        }

        // Upload file to server
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $insertSql = "INSERT INTO images (filename) VALUES ('$fileName')";
            if (mysqli_query($conn, $insertSql)) {
                echo "The file $fileName has been uploaded successfully.";
            } else {
                echo "Error: " . $insertSql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
    }
}

// Display uploaded images
$query = "SELECT * FROM images";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $imagePath = $targetDir . $row['filename'];
        echo '<img src="' . $imagePath . '" alt="' . $row['filename'] . '" style="max-width: 300px; margin: 10px;">';
    }
} else {
    echo "No images uploaded yet.";
}
?>
