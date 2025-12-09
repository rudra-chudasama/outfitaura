<style>
      /*footer start*/
        
      .footer {
            width: 100%;
            background-color: #545454!important;
            font-size: 18px;
        }
        
        .fa-facebook-f {
            --fa: "\f39e";
            padding-right: 25px;
            padding-top: 25px;
            font-size: 25px;
        }
        
        .fa-instagram {
            --fa: "\f16d";
            padding-right: 25px;
            padding-top: 25px;
            font-size: 25px;
        }
        
        .fa-youtube {
            --fa: "\f167";
            padding-right: 25px;
            padding-top: 25px;
            font-size: 25px;
        }
        
        .fa-linkedin-in {
            --fa: "\f0e1";
            padding-right: 25px;
            padding-top: 25px;
            font-size: 25px;
        }
        
        .fa-whatsapp {
            --fa: "\f232";
            padding-right: 25px;
            padding-top: 25px;
            font-size: 25px;
        }
        
        footer img {
            width: 250px;
            height: 100px;
            padding-top: 30px;
            padding-right: 20px;
        }
        
        .footer h6 {
            color: #e9e7e2;
            font-size: 1.5rem;
            margin-top: 25px;
        }
        
        .footer p {
            color: #e9e7e2;
            font-size: 1rem;
            margin-top: 0;
            margin-bottom: 0;
        }
        
        .footer .Desgined-by {
            font-weight: bold;
            font-size: 20px;
        }
        
        .footer li {
            color: #e9e7e2;
        }
        
        .main-menu ul {
            list-style: none;
            /* Remove default bullets */
            padding: 0;
            margin: 0;
            color: #e9e7e2;
        }
        
        .main-menu li {
            position: relative;
            padding-left: 20px;
            /* <i class="fa-solid fa-cart-shopping"></i>Add space for the arrow */
            font-size: 16px;
            color: #e9e7e2;
        }
        
        .main-menu li::before {
            content: '\276F';
            /* Unicode arrow */
            position: absolute;
            left: 0;
            color: #e9e7e2;
            font-size: 16px;
        }
        /* Styling for the Quick Contact */
        
        .quick-contact li {
            position: static;
            /* Remove arrow positioning */
            color: #e9e7e2;
            /* Text color can remain consistent */
            font-size: 16px;
        }
        
        .product-menu {
            color: #e9e7e2;
        }
        
        .footer-link {
            color: #e9e7e2;
            font-size: 18px;
        }
        
        .footer-link:hover,
        .footer-link.active {
            color: #e9e7e2;
            /* Change to desired color */
            text-decoration: underline;
            /* Optional underline */
            transition: color 0.3s ease, text-decoration 0.3s ease;
        }
        
        .quick-contact p {
            display: flex;
        }
        
        .fa-map-pin {
            --fa: "\f276";
            margin-right: 15px;
            font-size: 20px;
        }
        
        .fa-location-dot {
            --fa: "\f3c5";
            margin-right: 10px;
            font-size: 20px;
        }
        
        .fa-envelope {
            --fa: "\f0e0";
            margin-right: 10px;
            font-size: 20px;
        }
        
        footer .fa-phone {
            --fa: "\f095";
            margin-right: 10px;
            font-size: 20px;
        }
        
        .footer-link {
            color: #e9e7e2;
            text-decoration: none;
            transition: color 0.3s ease, text-decoration 0.3s ease;
        }
        
        .footer-link:hover,
        .footer-link.active {
            color: #e9e7e2 !important;
            text-decoration: underline;
        }
        
        .nav-link.active::after,
        .footer-link.active::after {
            content: "";
            background-color: #545454;
        }
        /* Footer-Specific Styles */
        
        .footer {
            background-color: #f8f9fa;
            /* Light background for footer */
            padding: 20px 0;
        }
        
        .footer .quick-contact p {
            margin-bottom: 10px;
        }
        /*footer end*/
</style>
<footer class="footer ">
        <div class="container ">
            <div class="row ">
                <div class="col-lg-3 col-md-6 ">
                    <a href="index.php"><img src="img/logo.jpg" alt=" "></a>
                    <p><i class="fa-brands fa-whatsapp "></i><i class="fa-brands fa-instagram "></i><i class="fa-brands fa-facebook-f "></i><i class="fa-brands fa-youtube "></i><i class="fa-brands fa-linkedin-in "></i></p>


                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="main-menu ">
                        <h6>Main Menu</h6>
                        <ul class="list-unstyled ">
                            <li><a class="footer-link" aria-current="page " href="index.php ">Home</a></li>
                            <li><a class="footer-link" aria-current="page " href="about.php ">About Us</a></li>
                            <li><a class="footer-link" aria-current="page " href="contectus-page.php ">Contact Us</a></li>
                            <li><a class="footer-link" aria-current="page " href="customersupport-page.php ">Customer Support</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="product-menu">
                        <a class="footer-link" href="product.php">
                            <h6>Product Menu</h6>
                        </a>
                        <ul class="list-unstyled ">
                            <li>
                                <a class="footer-link" href="mans-ware.php">Man's Ware</a></li>
                            <li>
                                <a class="footer-link" href="womans-ware.php">Woman's Ware</a></li>
                            <li>
                                <a class="footer-link" href="kids-ware.php">Kid's ware</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="quick-contact ">
                        <h6>Quick Contact</h6>
                        <p><span><i class="fa-solid fa-location-dot "></i></span><span>8webcom.com - Top Web <br>Development & Digital Market  Company Ahmedabad, India</span></p><br>
                        <p><span><i class="fa-solid fa-envelope "></i></span><span>outfitaurainfo@gmail.com</span></p><br>
                        <p><span><i class=" fa-solid fa-phone "></i></span><span> +91-97234-83340 <br>Round The Clock Service</span></p>
                    </div>
                </div>
            </div>
        </div>
        <p class="desgin-by text-align-left" style="padding-bottom: 15px; padding-left: 105px;">© 2025 Outfit Aura. All Rights Reserved.</p>
        <p class="desgin-by text-center">Desgined By: 8webcom.com</p>
    </footer>