<?php
include("db_connection.php");

// Get Product ID from URL
IF($_GET['id']){
    $edit_id = $_GET['id'];

}
// Fetch Product Details
$PRO_select = "SELECT * FROM `upload` WHERE `id` = '$edit_id'";
$PRO_result = mysqli_query($cost, $PRO_select);
$resultarray = mysqli_fetch_assoc($PRO_result);


  function getcategoryname($cateid){
    global $cost;
    
$PRO_selectcate = "SELECT * FROM `product_category` WHERE `id` = '$cateid'";
$PRO_resultcate = mysqli_query($cost, $PRO_selectcate);
$resultarraycate = mysqli_fetch_assoc($PRO_resultcate);
return $resultarraycate['cate_name'];
}


session_start();
error_reporting(0);
if (isset($_SESSION["email"])) {
    
    $email_h = $_SESSION['email'];
    $select_hreader = "SELECT * FROM `users` WHERE `email` ='$email_h'";
    $result_header = mysqli_query($cost, $select_hreader);  

    if (mysqli_num_rows($result_header) > 0) {
        $userrow = mysqli_fetch_assoc($result_header);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="x-icon" href="IMG/OFA.jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

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
        /*single product start*/
        
        .product-image img {
            width: 70%;
            height: auto;
            margin-top: 40px;
            box-shadow: 0 0 50px 0 rgba(0, 0, 0, .1);
        }
        @media screen and (max-width: 768px) {
            .product-image img {
            margin-top: 0px;
            margin-right: 0px;
        }
        
        }
        .col-md-7 {
            box-shadow: 0 0 50px 0 rgba(0, 0, 0, .1);
            padding: 15px 15px 15px 15px;
        }
        
        .product-details {
            margin-left: 30px;
        }
        @media screen and (max-width: 768px) {
        .product-details {
            margin-top: 50px;
            margin-left: 0px;
        }
        }
        .product-details h3 {
            padding: 20px 0 20px 0;
            color: #545454;
        }
        
        .product-details h5 {
            padding-top: 10px;
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
        .qyt {
            width: 50px;
            height: 20%;
        }
        
        .product-details h4 {
            padding-top: 10px;
        }
        
        .product-details p {
            text-align: justify;
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
    <!--=========================
              HEADER & NAVBAR
    ==========================-->



    <?php include("header.php") ?>

    <!--=========================
            PRODUCT DETAILS       
        ==========================-->
    <section class="section2">
       
<div class="container">
    <div class="row product-container">
        <div class="col-md-5">
            <div class="product-image text-center">
            <?php
                    if (!empty($resultarray['image'])) { ?>
                        <img src="admin_panel/<?php echo $resultarray['image']; ?>" alt="" >

                    <?php } ?>
                </div>
        </div>

        <div class="col-md-7">
            <div class="product-details">
                <h4><?php echo $resultarray['name']; ?></h4>
                <h6>Category: <?php echo getcategoryname($resultarray['cate_id']); ?></h6>
                <h3>₹<?php echo $resultarray['price']; ?></h3>

                <label>Size:</label>
                <p>Any Size</p>

                <label class="mt-2">Quantity:</label>
<p class="mt-2">1</p>
                <h5 class="mt-3">Product Details:</h5>
                <p><?php echo $resultarray['description']; ?></p>

                <a href="addtocart.php?id=<?php echo $resultarray['id']; ?>" class="btn btn-warning mt-3">
                    <i class="fa-solid fa-cart-shopping"></i> Add To Cart
                </a>
            </div>
        </div>
    </div>
</div>
    </section>

    <!--=========================
              FOOTER       
    ==========================-->
    <?php include('footer.php');?>

    <!--=========================
              scripts       
    ==========================-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js " integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js " integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js "></script>
    <script>
        //loading animation
        // Hide Loader and Show Content
        window.onload = function() {
            setTimeout(function() {
                document.getElementById("loader-container").style.opacity = "0";
                setTimeout(() => {
                    document.getElementById("loader-container").style.display = "none";
                }, 1000);
            }, 1000);
        };
    </script>
</body>

</html>