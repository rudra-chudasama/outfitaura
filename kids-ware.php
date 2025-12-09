<?php
include("db_connection.php");
$select = "SELECT * FROM `upload` WHERE `cate_id` = 3";
$result = mysqli_query($cost, $select);

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
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        /*Navber2*/

        .nav2 {
            background-color: #f5f5f5 !important;
        }

        .navbar-nav2 {
            display: flex;
            /* Set the display to flex */
            justify-content: space-evenly;
            /* Apply space-evenly to the flex container */
            width: 100%;
            /* Ensure it takes the full width */
        }

        .nav-item {
            list-style: none;
            /* Optional: Remove default list styling */
        }

        .navbar-expand-lg {
            position: sticky;
            top: 9%;
            z-index: 44;
        }

        /*Navber2*/

        .banner img {
            width: 100%;
            border-bottom: 1px solid #545454;
        }

        main {
            padding: 20px;
        }

        section {
            margin-bottom: 40px;
        }

        .product {
            background: #fff;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product .row {
            position: relative;
            margin-bottom: 30px;
            padding: 40px 0px 40px 0px;
            margin-top: 10px;
            margin-right: 0px;
        }

        .promore-col img {
            height: auto;
            width: 230px;
        }


        .product-details {
            margin-top: 50px;
            margin-left: 30px;
        }

        .product-details h6 {
            text-align: left;
        }

        .product-details h3 {
            text-align: left;
        }

        .product-details h4 {
            text-align: left;
        }

        .product-details p {
            text-align: justify;
        }

        .seemore {
            display: flex;
            justify-content: left;
        }

        .fa-star {
            --fa: "\f005";
            color: #ffd700;
        }

        .fa-star-half-stroke {
            --fa: "\f5c0";
            color: #ffd700;
        }

        a {
            text-decoration: none;
            color: black;
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
                Nevbar 2
        ==========================-->
    <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary nav2">
        <ul class="navbar-nav2 me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="#shirts">Shirts & T-shirts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#pants">Pants</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#shoes">Shoes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#assesories">Assesories</a>
            </li>
        </ul>
    </nav> -->
    <!--=========================
                Banner
        ==========================-->
    <section class="section1 ">
        <div class="banner ">
            <img src="img/banner/kidimg.jpg">
        </div>
        </div>
    </section>
    <!--=========================
                    PRODUCT
        ==========================-->
    <main>
        <section id="shirts">
            <div class="row">
                <!-- <h2>Shirts & T-shirts</h2> -->
                <?php
                while ($row = mysqli_fetch_assoc($result)) { ?>


                    <div class="col-lg-6">
                        <div class="product">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="promore-col">
                                            <a href="product-details.php?id=<?php echo $row['id']; ?>">

                                                <img src="admin_panel/<?php echo $row['image']; ?>" width="100%"
                                                    class="more" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="product-details">
                                            <a href="product-details.php?id=<?php echo $row['id']; ?>">
                                                <h4><?php echo $row['name']; ?></h4>
                                                <h3>₹<?php echo $row['price']; ?></h3>
                                                <p>4.5<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                        class="fa-solid fa-star-half-stroke"></i></p>
                                                <p><?php echo $row['description']; ?></p><br>
                                                <div class="seemore">
                                                    <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                            class="fa-solid fa-cart-shopping "></i>Buy Now</a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- <div class="col-lg-6">
                    <div class="product">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="promore-col">
                                        <img src="img/kids/tshirt/t1.jpg" width="100%" class="more" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="product-details">
                                        <h6>T-shirt</h6>
                                        <h4>Kid's Fashion T-shirt</h4>
                                        <h3>₹1100</h3>
                                        <p>4.5<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i></p>
                                        <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                        </p><br>
                                        <div class="seemore">
                                            <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Buy Now</a>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="promore-col">
                                        <img src="img/kids/tshirt/t2.jpg" width="100%" class="more" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="product-details">
                                        <h6>T-shirt</h6>
                                        <h4>Kid's Fashion T-shirt</h4>
                                        <h3>₹1100</h3>
                                        <p>3.0<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                                        <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                        </p><br>
                                        <div class="seemore">
                                            <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="promore-col">
                                        <img src="img/kids/tshirt/t3.jpg" width="100%" class="more" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="product-details">
                                        <h6>T-shirt</h6>
                                        <h4>Kid's Fashion T-shirt</h4>
                                        <h3>₹1100</h3>
                                        <p>4.0<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></p>
                                        <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                        </p><br>
                                        <div class="seemore">
                                            <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="promore-col">
                                        <img src="img/kids/tshirt/t4.jpg" width="100%" class="more" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="product-details">
                                        <h6>T-shirt</h6>
                                        <h4>Kid's Fashion T-shirt</h4>
                                        <h3>₹1100</h3>
                                        <p>3.5<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i></p>
                                        <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                        </p><br>
                                        <div class="seemore">
                                            <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="promore-col">
                                        <img src="img/kids/tshirt/t5.jpg" width="100%" class="more" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="product-details">
                                        <h6>T-shirt</h6>
                                        <h4>Kid's Fashion T-shirt</h4>
                                        <h3>₹1100</h3>
                                        <p>4.0<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></p>
                                        <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                        </p><br>
                                        <div class="seemore">
                                            <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="promore-col">
                                        <img src="img/kids/tshirt/t6.jpg" width="100%" class="more" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="product-details">
                                        <h6>T-shirt</h6>
                                        <h4>Kid's Fashion T-shirt</h4>
                                        <h3>₹1100</h3>
                                        <p>5.0<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                                        <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                        </p><br>
                                        <div class="seemore">
                                            <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            </div>
        </section>
    </main>
    <!--=========================
                    PRODUCT
        ==========================-->
    <!-- <section id="pants">
        <div class="row">
            <h2>Pants</h2>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/pants/p1.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/pants/p2.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/pants/p3.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/pants/p4.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/pants/p5.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/pants/p6.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section> -->
    <!--=========================
                    PRODUCT
        ==========================-->
    <!-- <section id="shoes">
        <div class="row">
            <h2>Shoes</h2>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col-1">
                                    <img src="img/kids/shoes/s1.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/shoes/s2.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/shoes/s3.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/shoes/s4.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/shoes/s5.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/shoes/s6.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section> -->
    <!--=========================
                    PRODUCT
        ==========================-->
    <!-- <section id="assesories">
        <div class="row">
            <h2>Assesories</h2>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col-1">
                                    <img src="img/kids/assesories/a1.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/assesories/a2.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/assesories/a3.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/assesories/a4.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/assesories/a5.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="promore-col">
                                    <img src="img/kids/assesories/a6.jpg" width="100%" class="more" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="product-details">
                                    <h6>T-shirt</h6>
                                    <h4>Man's Fashion T-shirt</h4>
                                    <h3>₹1100</h3>
                                    <p>Symbol Premium Men's Super Soft Classic Polo T-Shirt: Regular Fit
                                    </p><br>
                                    <div class="seemore">
                                        <a href="addtocart.php?id=<?php echo $row1['id']; ?> " class="mb-3 btn btn-warning text-center "><i
                                                class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section> -->
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
    </script>
</body>

</html>