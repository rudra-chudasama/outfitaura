<?php 
session_start();


include("db_connection.php");
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
    <link rel="shortcut icon" type="x-icon" href="img/OFA.jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traning Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/maharlika" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        body {
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
            z-index: 0;
            margin: 0;
            padding: 0;
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
            transform: translateY(-70px);
            pointer-events: none;
        }
        
        .carousel img {
            width: 100%;
            height: auto;
        }
        /* Default state */
        /* Default state - all slides start off-screen to the right */
        
        .carousel-item {
            transform: translateX(100%);
            opacity: 0;
            transition: transform 1s ease-in-out, opacity 1s ease-in-out;
        }
        /* Active slide - visible and in place */
        
        .carousel-item.active {
            transform: translateX(0);
            opacity: 1;
        }
        /* Previous slide - moves out to the left */
        
        .carousel-item-prev {
            transform: translateX(-100%);
            opacity: 0;
        }
        
        @media (max-width: 767.98px) {
            .carousel-indicators {
                display: none;
            }
        }
        
        .wimg img {
            width: 320px;
            height: 50%;
        }
        /* Animation for sliding in from the right */
        
        @keyframes slideInRight {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        .slide-in-right {
            animation: slideInRight 0.5s forwards;
            /* Adjust duration as needed */
            opacity: 0;
            /* Start hidden */
        }
        
        h2 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 20px;
            color: #000000;
            margin-top: 25px;
        }
        
        .product h6 {
            font-size: 3rem;
            text-align: left;
            color: #000000;
        }
        
        h5 {
            position: absolute;
            font-size: 4rem;
            font-weight: bold;
            text-transform: capitalize;
        }
        
        h6 {
            font-size: 2rem;
        }
        /* Section 3 Scroll Animation */
        
        .section3 {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 1s ease, transform 1s ease;
        }
        
        .section3.show {
            opacity: 1;
            transform: translateY(0);
        }
        /*slider start*/
        
        .product {
            view-timeline-name: --revealing-image;
            view-timeline-axis: block;
            animation: linear reveal both;
            animation-timeline: --revealing-image;
            animation-range: entry 25% cover 50%;
        }
        
        @keyframes product {
            from {
                opacity: 0;
                clip-path: inset(45% 20% 45% 20%);
            }
            to {
                opacity: 1;
                clip-path: inset(0% 0% 0% 0%);
            }
        }
        
        .section2 .row {
            position: relative;
            margin-bottom: 15px;
            padding: 10px 40px 10px 40px;
            margin-top: 10px;
            margin-right: 0px;
        }
        
        .card-wrapper {
            max-width: 1100px;
            margin: 0 60px 0px;
            padding: 20px 15px;
            overflow: hidden;
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
            background: #f5f5f5;
            padding: 10px 16px;
            border-radius: 10px;
            text-decoration: none;
            border: 2px solid transparent;
            cursor: pointer;
            transition: 0.2s ease;
            margin-top: 100px;
        }
        
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #f5f5f5;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 25px;
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
            color: #f5f5f5;
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
            background: #F5F5F5!important;
        }
        
        .card-wrapper .swiper-pagination-bullet {
            height: 13px;
            width: 13px;
            opacity: 0.5;
            background: #000000;
        }
        
        .card-item {
            border-radius: 5px;
            background-color: #F5F5F5!important;
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
        /* Media Queries for Responsiveness */
        
        .section1 {
            width: 100%;
            height: auto;
        }
        
        .section2 {
            width: 100%;
            height: auto;
        }
        
        .section3 {
            width: 100%;
        }
        
        .section4 {
            width: 100%;
        }
        
        .section5 {
            width: 100%;
        }
        
        .section6 {
            width: 100%;
            justify-content: center;
        }
        
        h4 {
            position: relative;
            box-shadow: 0 0 50px 0 rgba(0, 0, 0, .1);
            margin-bottom: 30px;
            padding: 40px 40px 40px 40px;
            margin-top: 10px;
            margin-right: 0px;
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
              CAROUSEL
    ==========================-->
    <section class="section2">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="5" aria-label="Slide 6"></button>
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/banner/1.jpg" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="img/banner/2.jpg" class="d-block w-100" alt="Banner 2">
                </div>
                <div class="carousel-item">
                    <img src="img/banner/3.jpg" class="d-block w-100" alt="Banner 3">
                </div>
                <div class="carousel-item">
                    <img src="img/banner/4.jpg" class="d-block w-100" alt="Banner 4">
                </div>
                <div class="carousel-item">
                    <img src="img/banner/5.jpg" class="d-block w-100" alt="Banner 5">
                </div>
                <div class="carousel-item">
                    <img src="img/banner/6.jpg" class="d-block w-100" alt="Banner 6">
                </div>
            </div>
        </div>
    </section>


    <!--=========================
        ABOUT US      
==========================-->
    <section class="section3">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 ">
                    <div class="p-2 text-center ">
                        <h4 class="slide-in-right">“We are Manufacturers, Exporters & Suppliers of High-Quality Fabric”</h4>
                        <div class="wimg"><img src="img/himg.jpg"></div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="pt-2 text-center ">
                        <div class="about ">
                            <h2 class="slide-in-right">Welcome to OUTFIT AURA</h2>
                            <p>About of OUTFIT AURA
                                <br> OUTFIT AURA is a fashion brand that celebrates individuality and self-expression. We offer curated collections designed to inspire confidence and creativity in every wear. From timeless classics to bold trends, our
                                pieces cater to all styles and occasions. Our goal is to help you express your unique personality through fashion.</p>

                            <p>Mission of OUTFIT AURA
                                <br> Our mission is to make fashion sustainable, inclusive, and accessible to all. We prioritize ethical production and eco-friendly materials to reduce environmental impact. By offering high-quality, stylish clothing,
                                we empower you to look and feel your best. We aim to create a seamless shopping experience that aligns with your values.</p>

                            <p>Vision of OUTFIT AURA
                                <br> We envision a future where fashion is a force for positive change. OUTFIT AURA strives to lead the industry in sustainability and inclusivity. We aim to build a global community that celebrates diversity and conscious
                                living. Together, we can redefine fashion and create a stylish, purposeful world.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
             PRODUCT      
    ==========================-->
    <section class="section2 py-5">
    <div class="container">
        <h1 class="text-center mb-4">Our Products</h1>
        <div class="row g-4">
            <!-- Men's Wear -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-lg text-center p-3">
                    <img src="img/male/shirt/s1.jpg" class="card-img-top rounded" alt="Men's Wear">
                    <div class="card-body">
                        <h3 class="card-title">Men's Wear</h3>
                        <a href="mans-ware.php" class="btn btn-outline-warning">View More</a>
                    </div>
                </div>
            </div>

            <!-- Women's Wear -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-lg text-center p-3">
                    <img src="img/female/top/t1.jpg" class="card-img-top rounded" alt="Women's Wear">
                    <div class="card-body">
                        <h3 class="card-title">Women's Wear</h3>
                        <a href="womans-ware.php" class="btn btn-outline-warning">View More</a>
                    </div>
                </div>
            </div>

            <!-- Kids' Wear -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-lg text-center p-3">
                    <img src="img/kids/tshirt/t1.jpg" class="card-img-top rounded" alt="Kids' Wear">
                    <div class="card-body">
                        <h3 class="card-title">Kids' Wear</h3>
                        <a href="kids-ware.php" class="btn btn-outline-warning">View More</a>
                    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>


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
        //product swiper
        new Swiper('.card-wrapper', {
            loop: true,
            speed: 800,
            spaceBetween: 20,
            autoplay: {
                delay: 3500,
            },

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
        //scroll animation
        // Scroll Animation for Section 3
        function animateSection3() {
            var section3 = document.querySelector('.section3');
            var h4 = section3.querySelector('h4');
            var h2 = section3.querySelector('h2');
            var rect = section3.getBoundingClientRect();
            var isVisible = rect.top < window.innerHeight * 0.9;

            if (isVisible && !section3.classList.contains('show')) {
                setTimeout(() => {
                    section3.classList.add('show');
                    h4.classList.add('slide-in-right'); // Add animation class to h4
                    h2.classList.add('slide-in-right'); // Add animation class to h2
                }, 100); // 1.5-second delay before animation starts
            }
        }

        window.addEventListener('scroll', animateSection3);
    </script>

</body>

</html>
