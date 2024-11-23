<?php
require_once 'config.php';

$db = new Database();
$conn = $db->connect();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Edit Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="update_product.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <div class="mb-3">
                                <label for="title" class="form-label">Product Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="<?php echo $product['title']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price"
                                    value="<?php echo $product['price']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    required><?php echo $product['description']; ?></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                                <a href="view.php" class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
$db->closeConnection();
?>