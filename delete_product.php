<?php
require_once 'config.php';

$db = new Database();
$conn = $db->connect();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM products WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_products.php?success=1");
    } else {
        header("Location: view_products.php?error=" . urlencode($conn->error));
    }
}

$db->closeConnection();
?>