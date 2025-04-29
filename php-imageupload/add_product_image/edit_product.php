<?php
include 'db.php';
$id = "";
$name = "";

if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "select * from products where product_id = $id";
    $result = mysqli_query($conn , $sql);

    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);
        $name = $row['product_name'];
        $image = $row['product_image'];

    }
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <form>
        <lable>Product Name</lable>
        <br>
        <input type="text" name="product_name">
        <br>
        <label>Product Image</label>
        
    </form>
 </body>
 </html>