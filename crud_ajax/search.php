<?php
include 'db.php';
if (isset($_POST['query'])) {
    $search = $conn->real_escape_string($_POST['query']);
    $query = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>".$row['product_name']." - ".$row['product_description']." - $".$row['product_price']."</div>";
        }
    } else {
        echo "No products found";
    }
}
?>