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
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
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
 
        /*contant start*/
        
        .section1 {
            padding-top: 20px;
        }
        
        main {
            padding: 20px;
            max-width: 1000px;
            margin: auto;
            border-radius: 10px;
        }
        .contant {
            padding: 25px;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }   
        main p {
            text-align: justify;
        }
        
        section {
            margin-bottom: 20px;
        }
        
        h2 {
            color: #35424a;
        }
        /*contant end*/

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
         CONTENT 
===========================-->
          
               
                <div class="reletion">
                <img src="img/banner/cs.jpg">
                </div>
                <section class="section1">
                <main>  


                    <section class="contant" id="privacy">
                        
                        <h3>Privacy Policy</h3>
                        <p>At Outfit Aura, your privacy is our top priority. We collect personal information only for the purpose of processing orders, delivering services, and improving your shopping experience. This includes your name, contact details,
                            payment information, and browsing preferences. We ensure that your data is securely stored and never shared with third parties without your consent. We use cookies to enhance your experience and analyze site traffic. By using
                            our website, you agree to our privacy policy. For any questions, feel free to contact us. Your trust is important to us, and we are committed to safeguarding your information.</p>
                    </section>

                    <section class="contant" id="return">
                        <h3>Return & Refund Policy</h3>
                        <p>At Outfit Aura, we strive to ensure your satisfaction with every purchase. If you are not completely happy, you may return items within 7 days of delivery. Products must be unused, unwashed, and in original packaging with tags
                            intact. Refunds will be processed to the original payment method within 5-7 business days after inspection. Sale items and customized products are non-refundable. Shipping charges are non-refundable. To initiate a return, contact
                            our support team at <strong>outfitaurainfo@gmail.com</strong>. Outfit Aura reserves the right to refuse returns that do not meet our policy.</p>
                    </section>

                    <section class="contant" id="shipping">
                        <h3>Shipping & Delivery</h3>
                        <p>At Outfit Aura, we strive to deliver your orders quickly and safely. We offer standard and express shipping options across multiple locations. Orders are processed within 1-2 business days, and delivery typically takes 5-7 business
                            days, depending on your location. You will receive a tracking link once your order is shipped. We ensure secure packaging to protect your items. Shipping charges may vary based on order value and destination. For any delays
                            or assistance, contact our support team. Enjoy a seamless shopping experience with Outfit Aura.</p>
                    </section>

                    <section class="contant" id="cancellation">
                        <h3>Cancellation Policy</h3>
                        <p>At Outfit Aura, we strive to provide a seamless shopping experience. Orders can be canceled within 24 hours of placement. Once processed or shipped, cancellations are not possible. To request a cancellation, contact our customer
                            support with your order details. If eligible, refunds will be processed within 5-7 business days to the original payment method. Outfit Aura reserves the right to cancel orders due to unforeseen circumstances, such as stock
                            unavailability or payment issues. In such cases, customers will be notified, and a full refund will be issued. For assistance, reach out to our support team.</p>
                    </section>
                </main>
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
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js ">
                // Placeholder for future JavaScript functionality
                console.log("Customer Support Page Loaded");
            </script>
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