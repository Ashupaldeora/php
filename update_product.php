<?php
require_once 'config.php';

$db = new Database();
$conn = $db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $title = $conn->real_escape_string($_POST['title']);
    $price = floatval($_POST['price']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "UPDATE products SET title='$title', price=$price, description='$description' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_products.php?success=1");
    } else {
        header("Location: edit_product.php?id=$id&error=" . urlencode($conn->error));
    }
}

$db->closeConnection();
?>