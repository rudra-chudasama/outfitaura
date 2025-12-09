<?php
include("db_connection.php");
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: login-page.php");
}
error_reporting(0);
if (isset($_SESSION["email"])) {
    
    $email_h = $_SESSION['email'];
    $select_hreader = "SELECT * FROM `users` WHERE `email` ='$email_h'";
    $result_header = mysqli_query($cost, $select_hreader);  

    if (mysqli_num_rows($result_header) > 0) {
        $userrow = mysqli_fetch_assoc($result_header);
    }
}
 
// Get Product ID from URL
IF($_GET['id']){
    $edit_id = $_GET['id'];

}
// Fetch Product Details
$PRO_select = "SELECT * FROM `upload` WHERE `id` = '$edit_id'";
$PRO_result = mysqli_query($cost, $PRO_select);
$resultarray = mysqli_fetch_assoc($PRO_result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="x-icon" href="IMG/OFA.jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        body {
            width: 100%;
            height: auto;
            font-family: Arial, sans-serif;
            z-index: 0;
        }

        .row {
            position: relative;
            margin-bottom: 30px;
            padding: 40px 40px 40px 40px;
            margin-top: 10px;
            margin-right: 0px;
        }

        /* Fullscreen Loader Background */

        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: #e9e7e2;
            /* Theme color */
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 15px;
            z-index: 9999;
            transition: opacity 1s ease-in-out, transform 1s ease-in-out;
        }

        .loader {
            position: relative;
            width: 250px;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: spin 3s linear infinite;
            /* Spins the entire loader (ring + logo) */
        }

        /* Spinning Ring */

        .loader::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 6px solid transparent;
            border-top: 6px solid #545454;
            border-bottom: 6px solid #545454;
        }

        /* Loading Text */

        @import url('https://fonts.cdnfonts.com/css/maharlika');

        .loading-text {
            font-family: 'Maharlika', sans-serif;
            font-size: 18px;
            color: #545454;
            font-weight: 900;
            /* Theme text color */
            letter-spacing: 2px;
            animation: fadeText 2s infinite alternate;
        }

        /* 🌀 Smooth, Continuous Spinning Animation */

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Fading effect for text */

        @keyframes fadeText {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0.5;
            }
        }

        /* Hide Content Initially */

        #content {
            display: none;
            text-align: center;
            color: #545454;
            font-size: 24px;
        }

        /* Fade-out effect */

        .loader-container.fade-out {
            opacity: 0;
            transform: translateY(-50px);
            pointer-events: none;
        }

        /*ADD TO CART START*/

        .content1 {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        input {
            padding: 8px;
            width: 60px;
            text-align: center;
            font-size: 16px;
            border: 2px solid #545454;
            border-radius: 5px;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #545454;
            box-shadow: 0px 0px 5px rgba(0, 91, 187, 0.5);
        }
        .form-control{
            padding: 8px;
            width: 60px;
            text-align: center;
            font-size: 16px;
            border: 2px solid #545454;
            border-radius: 5px;
            outline: none;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #545454;
            box-shadow: 0px 0px 5px rgba(0, 91, 187, 0.5);
        }
        .summary-box {
            border: 1px solid #ddd;
            padding: 20px;
            width: 300px;
            text-align: left;
            position: static;
            right: 20px;
            bottom: 100px;
            background: #fff;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .summary-box {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <!--=========================
    Loading animation   
==========================-->
    <!-- Loader Section -->
    <div id="loader-container" class="loader-container">
        <div>
            <img class="loader" src="img/ofaload.jpg" alt="Loading Image" class="spinning-logo">
        </div>

        <div class="loading-text">Loading...</div>
    </div>
    </div>
    <?php include("header.php"); ?>

    <div class="content1">
        <h2 class="text-center my-5">Shopping Cart</h2>
        <table>
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Product Size</th>
                    <th>Unit Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><img src="admin_panel/<?php echo $resultarray['image']; ?>" width="20%"></td>
                    <td><?php echo $resultarray['name']; ?></td>
                    <td><input type="number" value="1" min="1" class="quantity"></td>
                    <td> <select class="form-control" style="width: 110px;">
                    <!-- <option>Select Size</option> -->
                    <?php
                    $sizes = explode(",", $resultarray['sizes']); // Assuming sizes are stored as "L,XL,XXL"
                    foreach ($sizes as $size) {
                        echo "<option selected>M</option>";
                        echo "<option>L</option>";
                        echo "<option>XL</option>";
                        echo "<option>XXL</option>";
                    }
                    ?>
                </select></td>
                    <td class="unit-price">₹ <?php echo $resultarray['price']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-3"></div>
            <div class="col-lg-3"></div>
            <div class="col-lg-3">
                <div class="my-3 card">
                    <div class="px-3 px-2 card-title">Price: ₹ <span id="price"><?php echo $resultarray['price']; ?></span></div>
                    <div class=" px-3 px-2 card-title">GST (18%): ₹ <span id="gst"><?php echo $resultarray['price'] * 0.18; ?></span></div>
                    <div class=" card-footer"><strong>Total Price: ₹ <span id="total-price"><?php echo $resultarray['price'] + ($resultarray['price'] * 0.18); ?></span></strong></div>
                </div>
                <div class="my-3 text-center">
                <a href="process_billing.php" class="btn btn-warning">Order Now</a>
            </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
    <!--=========================
              FOOTER 
    ==========================-->
    <?php include('footer.php'); ?>
    <!--=========================
              scripts       
    ==========================-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js "
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r "
        crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js "
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy "
        crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js "></script>
    <script>
        //loading animation
        // Hide Loader and Show Content
        window.onload = function () {
            setTimeout(function () {
                document.getElementById("loader-container").style.opacity = "0";
                setTimeout(() => {
                    document.getElementById("loader-container").style.display = "none";
                }, 1000);
            }, 1000);
        };
        document.querySelector(".quantity").addEventListener("input", function() {
            let quantity = this.value;
            let unitPrice = parseFloat(document.querySelector(".unit-price").textContent.replace(/[^0-9]/g, ''));
            let price = quantity * unitPrice;
            let gst = price * 0.18;
            let totalPrice = price + gst;
            
            document.getElementById("price").textContent = price;
            document.getElementById("gst").textContent = gst.toFixed(2);
            document.getElementById("total-price").textContent = totalPrice.toFixed(2);
        });
    </script>
</body>

</html>

</html>