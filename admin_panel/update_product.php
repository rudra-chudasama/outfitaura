<?php
include("db_connection.php");
$select = "SELECT * FROM `product_category`";
$result = mysqli_query($cost, $select);

if (isset($_GET['id'])) {
    $edit_id = $_GET['id'];

}
$PRO_select = "SELECT * FROM `upload` WHERE `id` = '$edit_id'";
$PRO_result = mysqli_query($cost, $PRO_select);
$resultarray = mysqli_fetch_assoc($PRO_result);

if (isset($_POST['edit_submit'])) {
    $cate_name = $_POST['cate_name'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handling image upload
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "uploads/" . $image;  // Define your upload directory

        move_uploaded_file($image_tmp, $image_path);

        $update = "UPDATE `upload` SET `cate_id`='$cate_name', `name`='$name', `description`='$description', `price`='$price', `image`='$image_path' WHERE `id`='$edit_id'";
    } else {
        $update = "UPDATE `upload` SET `cate_id`='$cate_name', `name`='$name', `description`='$description', `price`='$price' WHERE `id`='$edit_id'";
    }

    $query_run = mysqli_query($cost, $update);

    if ($query_run) {
        echo "<script>alert('Product Updated Successfully');window.location.href='product_show.php';</script>";
    } else {
        echo "<script>alert('Failed to Update Product');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<?php include("sidebar.php"); ?>
<div class="content">
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Edit Product</h2>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label" id="cat_name">Selected Category</label>
                    <select name="cate_name" class="select-form form-control" id="cat_name" required>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Check if the current category matches the product's category
                            $selected = ($row['id'] == $resultarray['cate_id']) ? 'selected' : '';
                            echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['cate_name'] . '</option>';
                        }
                        ?>
                    </select>


                </div>
                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <?php
                    if (!empty($resultarray['image'])) { ?>
                        <img src="<?php echo $resultarray['image']; ?>" alt="" style="width:10%;">

                    <?php } ?>

                    <input type="file" name="image" class="form-control">

                </div>
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $resultarray['name']; ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="2"
                        required><?php echo $resultarray['description']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Product Price</label>
                    <input type="number" class="form-control" id="price" name="price"
                        value="<?php echo $resultarray['price']; ?>" required>
                </div>
                <button type="submit" name="edit_submit" class="btn text-light btn-info w-100">Update</button>

            </form>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>