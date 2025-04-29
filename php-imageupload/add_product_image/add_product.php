<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
 

  
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_size = $_FILES['image']['size'];

    
    $upload_dir = "uploads-images/";

   
    if (!empty($file_name)) {

        if($file_type == "image/png"  || $file_type == "image/jpg" || $file_type == "image/jpeg" )
        {
                  
        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
    
            $sql = "INSERT INTO products (product_name,  product_image) 
                    VALUES ('$name',  '$file_name')";

            if (mysqli_query($conn, $sql))
            {
                header("Location: view_product.php");
                exit();
            } 
            else 
            {
                echo "Error: " . $sql  . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
        }
        else
        {
            echo "<script> alert('Image format error'); window.location.href='index.php';</script>";
        }
         
    }
}
?>