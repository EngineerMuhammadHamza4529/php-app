<?php
include("db.php");
?>

    <h1>Product List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><img src="uploads-images/<?php echo $row['product_image']; ?>" alt="Product Image" width="100"></td>
                    <td>
                        <a href="edit_product.php?id=<?php echo $row['product_id']; ?>">Edit</a>
                        <a href="delete_product.php?id=<?php echo $row['product_id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "error not found products!";
        }

        mysqli_close($conn);
        ?>
        </tbody>
    </table>
