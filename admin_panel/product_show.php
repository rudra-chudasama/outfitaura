<?php
include("db_connection.php");
$select = "SELECT * FROM `upload` ORDER BY id ASC";
$result = mysqli_query($cost, $select);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Product Detail</title>
</head>

<body class="bg-light">
    <?php include("sidebar.php"); ?>
<div class="content">
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Product Detail</h2>
            <form action="#" method="POST" enctype="multipart/form-data">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark table-striped table-hovered">
                        <tr>
                            <th>id</th>
                            <th>cate_id</th>
                            <th>image</th>
                            <th>name</th>
                            <th>description</th>
                            <th>price</th>
                            <th colspan="2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['cate_id']; ?></td>
                                <td> <img src="<?php echo $row['image']; ?>" width="20%" class="more" alt=""></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>₹<?php echo $row['price']; ?></td>
                                <td>
                                    <a href="update_product.php?id=<?php echo $row['id']; ?>"
                                        class="btn btn-info btn-sm">Edit</a>

                                </td>
                                <td>
                                    <a href="delete_product.php?id=<?php echo $row['id']; ?>"
                                        class="btn btn-danger btn-sm" onclick="return confirm('are you sure want to delete this record')" >Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>