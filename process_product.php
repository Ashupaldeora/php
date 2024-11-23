<?php
require_once 'config.php';

$db = new Database();
$conn = $db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $price = floatval($_POST['price']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO products (title, price, description) VALUES ('$title', $price, '$description')";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_products.php?success=1");
    } else {
        header("Location: insert_product.php?error=" . urlencode($conn->error));
    }
}

$db->closeConnection();
?>