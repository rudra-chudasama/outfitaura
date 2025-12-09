<?php
include("db_connection.php");
$select = "SELECT * FROM `upload` WHERE `cate_id` = 0";
$result = mysqli_query($cost, $select);
?><!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="x-icon" href="img/OFA.jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
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
        .navbar-expand-lg{
            position: sticky;
            top: 9%;
            z-index: 44;
        }
        /*Navber2*/
        
        .banner img {
            width: 100%;
            border-bottom: 1px solid #545454;
        }
        
        .nav2 li {
            position: relative;
        }
        /*Product Sliider Start*/
        
        .card-wrapper {
            max-width: 1100px;
            margin: 0 60px 35px;
            padding: 20px 15px;
            overflow: hidden!important;
        }
        /*.card-list .card-item {
            list-style: none;
        }*/
        
        .about p {
            text-align: justify;
        }
        
        .card-list .card-item .card-link {
            position: relative;
            display: block;
            background: #fff;
            padding: 10px 16px;
            border-radius: 10px;
            text-decoration: none;
            border: 2px solid transparent;
            cursor: pointer;
            box-shadow: 20px 20px 20px rgba(0, 0, 0, 0.02);
            transition: 0.2s ease;
            margin-top: 100px;
        }
        
        .card-item {
            border-radius: 5px;
            background-color: #F5F5F5;
        }
        
        .card-list .card-item .card-link:active {
            cursor: grabbing;
        }
        
        .card-list .card-item .card-link {
            background-color: #F5F5F5;
            margin-top: -10px;
        }
        
        .card-list .card-link .card-image {
            width: 100%;
            height: 40%;
            aspect-ratio: 14 /22;
            object-fit: cover;
        }
        
        .card-list .card-link .badge {
            color: rgb(0, 0, 0);
            margin: 16px 0 18px;
            padding: 8px 16px;
            font-weight: 500;
            font-size: 0.95rem;
            background: #F5F5F5;
            width: fit-content;
            border-radius: 50px;
        }
        
        .card-list .card-link .card-title {
            font-size: 16px;
            color: #000;
            font-weight: 100;
        }
        
        .card-list .card-link .card-button .card-item {
            height: 35px;
            width: 35px;
            color: #000000;
            border-radius: 50%;
            margin: 30px 0 5px;
            background: none;
            cursor: pointer;
            transform: rotate(-45deg);
            border: 3px solid #000000;
            transition: 0.4s ease;
        }
        
        .card-list .card-link .card-button {
            color: #F5F5F5;
            background: #F5F5F5;
        }
        
        .card-wrapper .swiper-pagination-bullet {
            height: 13px;
            width: 13px;
            opacity: 0.5;
            background: #000000;
        }
        
        .card-wrapper .swiper-pagination-bullet-active {
            opacity: 1;
        }
        
        .card-wrapper .swiper-slide-button {
            color: #000000;
            margin-top: -35px;
        }
        
        .card-wrapper .swiper-slide-button {
            color: #000;
            margin-top: 15px;
        }
        
        .fa-star {
            --fa: "\f005";
            color: #ffd700;
        }
        
        .fa-star-half-stroke {
            --fa: "\f5c0";
            color: #ffd700;
        }
        
        @media screen and (max-width: 768px) {
            .card-wrapper {
                margin: 0 10px 25px;
            }
            .card-wrapper .swiper-slide-button {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .card-item {
                width: 100%;
                /* Full-width cards for small screens */
            }
        }
        
        li.card-item.swiper-slide.text-center {
            margin-right: 12px !important;
        }
        
        .card-wrapper {
            padding: 0px !important;
        }
        
        .product a {
            color: #000000;
        }
        
        .seemore {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-left: 80px;
        }
        
        .button {
            width: 180px;
            font-size: 20px;
            margin-right: 80px;
        }
        
        .button:active {
            transform: translate(2px, 0px);
            box-shadow: 0px 1px 0px rgb(139, 113, 255);
            padding-bottom: 1px;
        }
        
        .btn-outline-warning {
            --bs-btn-color: #000;
            --bs-btn-border-color: #545454;
            --bs-btn-hover-color: #e9e7e2;
            --bs-btn-hover-bg: #545454;
            --bs-btn-hover-border-color: #545454;
            --bs-btn-focus-shadow-rgb: 255, 193, 7;
            --bs-btn-active-color: #e9e7e2;
            --bs-btn-active-bg: #545454;
        }
        /*Product Sliider End*/
       
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
        <nav class="navbar navbar-expand-lg bg-body-tertiary nav2">
            <ul class="navbar-nav2 me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#mans_id">Man's Ware</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#womans_id">Woman's Ware</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kids_id">Kids's Ware</a>
                </li>
            </ul>
        </nav>

        <!--=========================
                Banner
        ==========================-->
        <section class="section1 ">
            <div class="banner ">
                <img src="img/banner/pimg1.jpg">
            </div>
    </div>
    </section>
 <!--=========================
             demo
        ==========================-->


    <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-lg-6">
                    <div class="product">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="promore-col">
                                        <a href="product-details.php?id=<?php echo $row['id']; ?>">

                                            <img src="admin_panel/<?php echo $row['image']; ?>" width="100%" class="more"
                                                alt="">
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
                                                <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i
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
    <!--=========================
                    PRODUCT
        ==========================-->
    <!-- <section class="section2" id="mans_id">
        <div class="container-fluid">
            <div class="row">
                <div class="product">
                    <div class="col-lg-12">
                        <h1 class="product text-center">Men's Wear</h1>
                        <div class="container swiper">
                            <div class="card-wrapper">
                                <ul class="card-list swiper-wrapper">
                                    <li class="card-item swiper-slide text-center">
                                        <a href="#" class="card-link text-center">
                                            <img src="img/male/shirt/s1.jpg" class="card-image">
                                            <h2 class="card-title text-center">Light blue casual shirt with roll-up sleeves and chest pocket.</h2>
                                            <p class="text-center">4.5<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i></p>
                                            <strong><span class="price">₹1100</span></strong>
                                            <a href="addtocart.php" class="mb-3 btn btn-warning text-center"><i class="fa-solid fa-cart-shopping"></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center">
                                        <a href="#" class="card-link text-center">
                                            <img src="img/male/shirt/t2.jpg" class="card-image">
                                            <h2 class="card-title text-center">Plaid polo shirt with white collar and short sleeves.</h2>
                                            <p class="text-center">3.0<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                                            <strong><span class="price">₹1100</span></strong>
                                            <a href="addtocart.php" class="mb-3 btn btn-warning text-center"><i class="fa-solid fa-cart-shopping"></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center">
                                        <a href="#" class="card-link text-center">
                                            <img src="img/male/shirt/s3.jpg" class="card-image">
                                            <h2 class="card-title text-center">Navy blue checkered shirt with button-down design.</h2>
                                            <p class="text-center">4.0<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></p>
                                            <strong><span class="price">₹1100</span></strong>
                                            <a href="addtocart.php" class="mb-3 btn btn-warning text-center"><i class="fa-solid fa-cart-shopping"></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center">
                                        <a href="#" class="card-link text-center">
                                            <img src="img/male/shirt/t4.jpg" class="card-image">
                                            <h2 class="card-title text-center">Oversized royal blue t-shirt with bold graphic print.</h2>
                                            <p class="text-center">3.5<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i></p>
                                            <strong><span class="price">₹1100</span></strong>
                                            <a href="addtocart.php" class="mb-3 btn btn-warning text-center"><i class="fa-solid fa-cart-shopping"></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center">
                                        <a href="#" class="card-link text-center">
                                            <img src="img/male/shirt/s5.jpg" class="card-image">
                                            <h2 class="card-title text-center">Green textured shirt with short sleeves and lightweight fabric.</h2>
                                            <p class="text-center">4.0<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></p>
                                            <strong><span class="price">₹1100</span></strong>
                                            <a href="addtocart.php" class="mb-3 btn btn-warning text-center"><i class="fa-solid fa-cart-shopping"></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center">
                                        <a href="#" class="card-link text-center">
                                            <img src="img/male/shirt/t6.jpg" class="card-image">
                                            <h2 class="card-title text-center">Olive green polo shirt with monogram print and buttoned collar.</h2>
                                            <p class="text-center">5.0<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                                            <strong><span class="price">₹1100</span></strong>
                                            <a href="addtocart.php" class="mb-3 btn btn-warning text-center"><i class="fa-solid fa-cart-shopping"></i>Add To Cart</a>
                                        </a>
                                    </li>
                                </ul>

                                <div class="swiper-pagination"></div>
                                <div class="swiper-slide-button swiper-button-prev"></div>
                                <div class="swiper-slide-button swiper-button-next"></div>
                            </div>
                        </div>
                        <div class="seemore">
                            <a href="mans-Ware.php"><button class="button btn btn-outline-warning">View More</button></a>
                        </div>
                    </div>
                </div>
            </div>
    </section> -->
    <!-- <section class="section3" id="womans_id">
        <div class="container-fluid ">
            <div class="row ">
                <div class="product ">
                    <div class="col-lg-12 ">
                        <h1 class="product text-center ">Womans Ware</h1>
                        <div class="container swiper ">
                            <div class="card-wrapper ">
                                <ul class="card-list swiper-wrapper ">
                                    <li class="card-item swiper-slide text-center ">
                                        <a href="# " class="card-link text-center ">
                                            <img src="img/female/top/t1.jpg" class="card-image ">
                                            <h2 class="card-title text-center ">F&W Men's Round Neck Cotton Regular Fit T-Shirt with Short Sleeves </h2>
                                            
                                            <p class="text-center ">3.0<i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-regular fa-star "></i><i class="fa-regular fa-star "></i></p>
                                            <strong><span class="price ">₹1100</span></strong>
                                            <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center ">
                                        <a href="# " class="card-link text-center ">
                                            <img src="img/female/top/t2.jpg" class="card-image ">
                                           
                                            <h2 class="card-title text-center ">F&W Men's Round Neck Cotton Regular Fit T-Shirt with Short Sleeves </h2>
                                            <p class="text-center ">4.0<i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-regular fa-star "></i></p>
                                            <strong><span class="price ">₹1100</span></strong>
                                            <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center ">
                                        <a href="# " class="card-link text-center ">
                                            <img src="img/female/top/t3.jpg" class="card-image ">
                                            <h2 class="card-title text-center ">F&W Men's Round Neck Cotton Regular Fit T-Shirt with Short Sleeves </h2>
                                            
                                            <p class="text-center ">4.5<i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star-half-stroke "></i></p>
                                            <strong><span class="price ">₹1100</span></strong>
                                            <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center ">
                                        <a href="# " class="card-link text-center ">
                                            <img src="img/female/top/t4.jpg" class="card-image ">
                                            <h2 class="card-title text-center ">Men's Full Sleeve Regular Fit Tshirt, Round Neck Cottonblend T-Shirt </h2>
                                            
                                            <p class="text-center ">5.0<i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i></p>
                                            <strong><span class="price ">₹1100</span></strong>
                                            <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center ">
                                        <a href="# " class="card-link text-center ">
                                            <img src="img/female/top/t5.jpg" class="card-image ">
                                            <h2 class="card-title text-center ">F&W Men's Round Neck Cotton Regular Fit T-Shirt with Short Sleeves </h2>
                                            
                                            <p class="text-center ">4.5<i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star-half-stroke "></i></p>
                                            <strong><span class="price ">₹1100</span></strong>
                                            <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center ">
                                        <a href="# " class="card-link text-center ">
                                            <img src="img/female/top/t6.jpg" class="card-image ">
                                            <h2 class="card-title text-center ">F&W Men's Round Neck Cotton Regular Fit T-Shirt with Short Sleeves </h2>
                                            
                                            <p class="text-center ">3.5<i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star-half-stroke "></i><i class="fa-regular fa-star "></i></p>
                                            <strong><span class="price ">₹1100</span></strong>
                                            <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </li>
                                </ul>

                                <div class="swiper-pagination "></div>
                                <div class="swiper-slide-button swiper-button-prev "></div>
                                <div class="swiper-slide-button swiper-button-next "></div>
                            </div>
                        </div>
                        <div class="seemore">
                            <a href="womans-Ware.php"><button class="button btn btn-outline-warning">
                                        View More
                                       </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="section4 " id="kids_id">
        <div class="container-fluid ">
            <div class="row ">
                <div class="product ">
                    <div class="col-lg-12 ">
                        <h1 class="product text-center ">Kids Ware</h1>
                        <div class="container swiper ">
                            <div class="card-wrapper ">
                                <ul class="card-list swiper-wrapper ">
                                    <li class="card-item swiper-slide text-center ">
                                        <a href="# " class="card-link text-center ">
                                            <img src="img/kids/tshirt/t1.jpg" class="card-image ">
                                            <h2 class="card-title text-center ">F&W Men's Round Neck Cotton Regular Fit T-Shirt with Short Sleeves </h2>
                                            
                                            <p class="text-center ">4.5<i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star-half-stroke "></i></p>
                                            <strong><span class="price ">₹1100</span></strong>
                                            <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center ">
                                        <a href="# " class="card-link text-center ">
                                            <img src="img/kids/tshirt/t2.jpg" class="card-image ">
                                            
                                            <h2 class="card-title text-center ">F&W Men's Round Neck Cotton Regular Fit T-Shirt with Short Sleeves </h2>
                                            <p class="text-center ">5.0<i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i></p>
                                            <strong><span class="price ">₹1100</span></strong>
                                            <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center ">
                                        <a href="# " class="card-link text-center ">
                                            <img src="img/kids/tshirt/t3.jpg" class="card-image ">
                                            <h2 class="card-title text-center ">F&W Men's Round Neck Cotton Regular Fit T-Shirt with Short Sleeves </h2>
                                            
                                            <p class="text-center ">4.5<i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star-half-stroke "></i></p>
                                            <strong><span class="price ">₹1100</span></strong>
                                            <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center ">
                                        <a href="# " class="card-link text-center ">
                                            <img src="img/kids/tshirt/t4.jpg" class="card-image ">
                                            <h2 class="card-title text-center ">Men's Full Sleeve Regular Fit Tshirt, Round Neck Cottonblend T-Shirt </h2>
                                            
                                            <p class="text-center ">5.0<i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i></p>
                                            <strong><span class="price ">₹1100</span></strong>
                                            <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center ">
                                        <a href="# " class="card-link text-center ">
                                            <img src="img/kids/tshirt/t5.jpg" class="card-image ">
                                            <h2 class="card-title text-center ">F&W Men's Round Neck Cotton Regular Fit T-Shirt with Short Sleeves </h2>
                                            
                                            <p class="text-center ">4.0<i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-regular fa-star "></i></p>
                                            <strong><span class="price ">₹1100</span></strong>
                                            <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </li>
                                    <li class="card-item swiper-slide text-center ">
                                        <a href="# " class="card-link text-center ">
                                            <img src="img/kids/tshirt/t6.jpg" class="card-image ">
                                            <h2 class="card-title text-center ">F&W Men's Round Neck Cotton Regular Fit T-Shirt with Short Sleeves </h2>
                                            
                                            <p class="text-center ">3.5<i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star "></i><i class="fa-solid fa-star-half-stroke "></i><i class="fa-regular fa-star "></i></p>
                                            <strong><span class="price ">₹1100</span></strong>
                                            <a href="addtocart.php " class="mb-3 btn btn-warning text-center "><i class="fa-solid fa-cart-shopping "></i>Add To Cart</a>
                                        </a>
                                    </li>
                                </ul>

                                <div class="swiper-pagination "></div>
                                <div class="swiper-slide-button swiper-button-prev "></div>
                                <div class="swiper-slide-button swiper-button-next "></div>
                            </div>
                        </div>
                        <div class="seemore">
                            <a href="kids-Ware.php"><button class="button btn btn-outline-warning">
                                        View More
                                       </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
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
        new Swiper('.card-wrapper', {
            loop: true,
            speed: 800,
            spaceBetween: 20,
            // autoplay: {
            //     delay: 3500,
            // },

            // If we need pagination  
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },

            // Navigation arrows  
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
            }
        });
    </script>
</body>

</html>

</html> 