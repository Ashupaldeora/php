<?php
require_once 'config.php';

$db = new Database();
$conn = $db->connect();

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">Product added successfully!</div>
        <?php endif; ?>

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="text-center">Product List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <a href="edit_product.php?id=<?php echo $row['id']; ?>"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="insert_product.php" class="btn btn-primary">Add New Product</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
$db->closeConnection();
?>