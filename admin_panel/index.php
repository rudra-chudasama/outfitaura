<?php
include("db_connection.php");
$select = "SELECT * FROM `product_category`";
$result = mysqli_query($cost, $select);

if (isset($_POST["submit"])) {
    $cate_name = $_POST["cate_name"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = ""; // Initialize image variable

    if (!empty($_FILES['image']['name'])) {
        $signature_filename = uniqid('signature_', time()) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image = 'uploads/' . $signature_filename;
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    $ssl = "INSERT INTO `upload`(`cate_id`, `image`, `name`, `description`, `price`) VALUES ('$cate_name','$image','$name','$description','$price')";
    $result_insert = mysqli_query($cost, $ssl);
    ?>
    <script>
        alert("Product Added Successfully");
        window.location.href = "index.php";
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include("sidebar.php"); ?>
    <div class="content">
        <div class="container mt-5">
            <div class="card shadow-lg p-4">
                <h2 class="text-center mb-4">Add Product</h2>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Select Category</label>
                        <select name="cate_name" class="select-form form-control" required>
                            <option value="" selected>Select Category</option>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?= $row['id']; ?>"><?= htmlspecialchars($row['cate_name']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Product Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <button type="submit" name="submit" class="btn text-light btn-info w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>