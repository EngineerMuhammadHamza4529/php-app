<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h2>Add Product</h2>
    <form action="add_product.php" method="post" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" name="name" required><br>

        <label for="image">Product Image:</label>
        <input type="file" name="image" required><br>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>
