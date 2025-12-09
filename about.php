<?php session_start();


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
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Link Swiper's CSS -->

    <style>
        body {
            width: 100%;
            height: 100%;
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
        
        .reletion img {
            width: 100%;
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
        
        .about-img img {
            width: 320px;
            height: 50%;
        }
        
        .me p {
            text-align: justify;
            padding: 1rem;
        }
        
        .card-vision {
            box-shadow: 0 0 50px 0 rgba(0, 0, 0, .1);
            /* background-image: url(https://png.pngtree.com/thumb_back/fh260/background/20231011/pngtree-isolated-white-background-texture-of-crumpled-or-wrinkled-paper-image_13644981.png);*/
            background-size: cover;
            background-position: center;
        }
        
        .card-mission {
            box-shadow: 0 0 50px 0 rgba(0, 0, 0, .1);
            /*background-image: url(https://png.pngtree.com/thumb_back/fh260/background/20231011/pngtree-isolated-white-background-texture-of-crumpled-or-wrinkled-paper-image_13644981.png);*/
            background-size: cover;
            background-position: center;
        }
        
        .card-vision p {
            text-align: justify;
            padding: 1rem;
        }
        
        .card-mission p {
            text-align: justify;
            padding: 1rem;
        }
        
        .card-title {
            padding-top: 10px;
        }
        /* swiper style*/
        
        .section6 h1 {
            font-size: 2.5rem;
            font-weight: none;
        }
        
        .section6 img {
            border: #000;
            border-radius: 50%;
            height: 170px;
        }
        
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
        }
        
        .Designer-work-msg {
            padding: 0rem 15rem;
            background: var(--white);
            border-radius: 1rem;
            text-align: center;
            box-shadow: var(--shadow);
            position: relative;
        }
        
        .Designer-work-msg p {
            text-justify: center;
        }
        
        .Designer-work-msg::before {
            content: "";
            position: absolute;
            bottom: -10rem;
            left: 50%;
            border: 0.5rem solid var(--white);
            border-color: transparent;
            border-top-color: var(--helper-tint);
        }
        
        .name {
            align-content: center;
        }
        
        @media screen and (max-width: 1200px) {
            .Designer-work-msg {
                padding: 10px;
            }
        }
        /* Swiper Slide - Initial State */
        /* Initially hide all slides */
.swiper-slide {
    text-align: center;
    font-size: 18px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 25px;
    padding-bottom: 20px;
    opacity: 0;
    transform: scale(0.8);
    transition: opacity 1s ease-in-out, transform 1s ease-in-out;
}

/* Swiper Active Slide Animation */
.swiper-slide-active {
    opacity: 1 !important;
    transform: scale(1);
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
                 ABOUT US
        ==========================-->



        <section class="section2">
            <div class="reletion">
                <img src="img/banner/about.jpg">
                <div class="carousel-caption text-dark">
                </div>
            </div>
        </section>

        <!--=========================
      ABOUT US      
==========================-->

        <section class="section3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-center">
                            <div class="about-img">
                                <img src="img/himg.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pt-2 text-center">
                            <div class="me">
                                <h2>Welcome to Outfit Aura</h2>
                                <p>OUTFIT AURA is a fashion brand dedicated to celebrating individuality, creativity, and self-expression. We believe that clothing is more than just fabric—it’s a way to tell your unique story. Our carefully curated collections
                                    blend timeless elegance with modern trends, offering something for every style and occasion. From casual everyday wear to sophisticated evening looks, we ensure you always feel confident and inspired. At OUTFIT AURA,
                                    we prioritize quality, sustainability, and affordability, making fashion accessible to everyone. Our mission is to empower you to embrace your personal style while making a positive impact on the world. Join us in redefining
                                    fashion, where style meets purpose, and every outfit reflects the best version of you. Welcome to OUTFIT AURA—your destination for fashion that truly speaks to you.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=========================
      ABOUT US      
==========================-->
        <section class="section4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-center">
                            <div class="card-vision">
                                <div class="card-body">
                                    <h2 class="card-title">Vision</h2>
                                    <img src="img/vision.png" alt="">
                                    <p class="card-text">"Our vision is to make fashion sustainable, inclusive, and accessible to all. We prioritize ethical production and eco-friendly materials to reduce environmental impact. By offering high-quality, stylish clothing, we
                                        empower you to look and feel your best. We aim to create a seamless shopping experience that aligns with your values."

                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="text-center ">
                            <div class="card-mission">
                                <div class="card-body">
                                    <h2 class="card-title">Mission</h2>
                                    <img src="img/goal.png" alt="">
                                    <p class="card-text">"Our mission is to make fashion sustainable, inclusive, and accessible to all. We prioritize ethical production and eco-friendly materials to reduce environmental impact. By offering high-quality, stylish clothing,
                                        we empower you to look and feel your best. We aim to create a seamless shopping experience that aligns with your values."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <!--=========================
              TEAM STATUS      
    ==========================-->
    <section class="section6 ">
        <div class="container ">
            <h1 class="text-center ">Team Status</h1>
            <!-- Swiper -->
            <div class="swiper mySwiper ">
                <div class="swiper-wrapper ">
                    <div class="swiper-slide ">
                        <div class="Designer-pp ">
                            <figure>
                                <img src="img/pp.jpg">
                            </figure>
                            <div class="Designer-work-msg ">
                                <p><i class="fa-solid fa-quote-left "></i>Merges backend expertise in databases and APIs with innovative design to deliver functional, scalable, and visually stunning applications.<i class="fa-solid fa-quote-right "></i></p>
                            </div>

                            <div class="Dsginer-details ">
                                <h2 class="name">Rudra Chudasama</h2>
                                <span class="work">Frontend Developer & Backend Developer </span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="Designer-pp ">
                            <figure>
                                <img src="img/pp.jpg">
                            </figure>
                            <div class="Designer-work-msg ">
                                <p><i class="fa-solid fa-quote-left "></i>Combines technical expertise in backend development with creative design skills to build robust, user-friendly, and visually appealing applications.<i class="fa-solid
                            fa-quote-right "></i></p>
                            </div>
                            <div class="Dsginer-details ">
                                <h2 class="name ">Dhruv Dabgar</h2>
                                <span class="work ">Backend Developer & Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="Designer-pp ">
                            <figure>
                                <img src="img/pp.jpg">
                            </figure>
                            <div class="Designer-work-msg ">
                                <p><i class="fa-solid fa-quote-left "></i>Proactive and skilled in backend development and designing, she collaborates effectively with the team to deliver seamless, creative solutions.<i class="fa-solid fa-quote-right "></i></p>
                            </div>
                            <div class="Dsginer-details ">
                                <h2 class="name ">Rishwa kansara</h2>
                                <span class="work ">Backend Developer & Designer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination "></div>
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
        //swiper
        //Initialize Swiper
        document.addEventListener("DOMContentLoaded", function () {
    // Delay Swiper initialization
    setTimeout(() => {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            on: {
                slideChangeTransitionStart: function () {
                    let slides = document.querySelectorAll(".swiper-slide");
                    slides.forEach(slide => slide.classList.remove("swiper-slide-active"));
                    slides[swiper.activeIndex].classList.add("swiper-slide-active");
                }
            }
        });

        // Delay the first slide animation
        let firstSlide = document.querySelector(".swiper-slide");
        if (firstSlide) {
            firstSlide.style.opacity = "1";
            firstSlide.style.transform = "scale(1)";
        }
    }, 1200); // Delay Swiper by 1 second
});


        // Scroll Animation for Section 3
        function animateSection3() {
            var section3 = document.querySelector('.section3');
            var h4 = section3.querySelector('h4');
            var h2 = section3.querySelector('h2');
            var rect = section3.getBoundingClientRect();
            var isVisible = rect.top < window.innerHeight * 1;

            if (isVisible && !section3.classList.contains('show')) {
                setTimeout(() => {
                    section3.classList.add('show');
                    h4.classList.add('slide-in-right'); // Add animation class to h4
                    h2.classList.add('slide-in-right'); // Add animation class to h2
                }, 100); // 1.5-second delay before animation starts
            }
        }

        // Scroll Animation for Section 4
        function animateSection4() {
            var section4 = document.querySelector('.section4');
            var rect = section4.getBoundingClientRect();
            var isVisible = rect.top < window.innerHeight * 2;

            if (isVisible && !section4.classList.contains('show')) {
                section4.classList.add('show');
                section4.animate([{
                    transform: "translateY(0px)"
                }, {
                    transform: "translateY(-15px)"
                }, {
                    transform: "translateY(-30px)"
                }], {
                    duration: 1500, // 1 second
                    easing: "ease-in-out",
                    iterations: 1,
                    fill: "forwards"
                });
            }
        }

        window.addEventListener('scroll', animateSection3);
        window.addEventListener('scroll', animateSection4);
    </script>
</body>

</html>