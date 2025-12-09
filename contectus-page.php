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
    <title>Contect Us</title>
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

        /*Contect Start*/

        .main-img img {
            width: 100%;
            background-color: #e9e7e2;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            display: flex;
        }

        .form-container {
            padding: 20px;
            flex: 1;
            background-color: #e9e7e2;
            border-radius: 8px 0 0 8px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-weight: 750;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 25px;
        }

        button {
            padding: 10px 60px 10px 60px;
            background-color: #545454;
            color: #e9e7e2;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #303030;
            color: #e9e7e2;
            transform: scale(1.05);
        }

        .image-container {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .image-container img {
            max-width: 100%;
            height: 680px;
            border-radius: 0 8px 8px 0;
        }

        .message-box-container {
            position: relative;
            width: 100%;
        }

        textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            resize: vertical;
            /* Allow vertical resizing */
        }

        #charCount {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.8);
            /* Semi-transparent background */
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 12px;
            color: #666;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 100%;
            }

            .form-container {
                border-radius: 0;
            }

            .image-container img {
                order: +1;
                border-radius: 0;
            }

            .image-container img {
                height: auto;
            }
        }

        /*Contect End*/
        /*Map start*/

        .section3 {
            margin-top: 2px !important;
            margin-bottom: 2px !important;
            display: flex;
            color: rgb(0, 0, 0);
            width: 100%;
            max-width: 100%;
        }

        .box {
            max-width: 600px;
        }

        iframe {
            width: 100%;
        }

        /*Map End*/
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
                CONTENT US BANNER
            ===========================-->
    <section class="section2">
        <div class="main-img">
            <img src="img/banner/contectus.jpg">
        </div>
    </section>



    <!--=========================
                    FORM CONTENT US
            ===========================-->
    <section class="section2 ">
        <div class="container">
            <div class="form-container">
                <h2>Contact Us</h2>
                <form id="contactForm">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="phone">Mobile:</label>
                    <input type="tel" id="phone" name="phone" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>

                    <label for="message">Message:</label>
                    <div class="message-box-container">
                        <textarea id="message" name="message" rows="4" maxlength="500" required></textarea>
                        <div id="charCount">500 characters remaining</div>
                    </div>

                    <button type="submit">Submit</button>
                </form>

                <!-- Success Message Container -->
                <div id="successMessage" style="display: none; color: green; margin-top: 10px;">
                    ✅ Your message has been sent successfully!
                </div>

            </div>
            <div class="image-container">
                <img src="IMG/contectusform.jpg">
            </div>
        </div>

    </section>
    <!--=========================
              IMAP    
    ==========================-->
    <section class="section3">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15798.75438305941!2d72.5207599576044!3d23.01092936690805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84e6132e6057%3A0xf1f062ffdec7bdd7!2s8webcom.com%20-%20Top%20Web%20Development%20%26%20Digital%20Marketing%20Company%20Ahmedabad%2C%20India!5e1!3m2!1sen!2sin!4v1736400525434!5m2!1sen!2sin "
            width="1920 " height="500 " style="border:0; " allowfullscreen=" " loading="lazy"
            referrerpolicy="no-referrer-when-downgrade "></iframe>
    </section>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
    </script>
    <script type="text/javascript">
        (function () {
            emailjs.init({
                publicKey: "AR8exSpGt23nEDBAK",
            });
        })();
    </script>

    <script>
        // Loading animation
        window.onload = function () {
            setTimeout(function () {
                document.getElementById("loader-container").style.opacity = "0";
                setTimeout(() => {
                    document.getElementById("loader-container").style.display = "none";
                }, 1000);
            }, 1000);
        };

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('contactForm');
            const successMessage = document.getElementById('successMessage');
            const messageBox = document.getElementById('message');
            const charCount = document.getElementById('charCount');

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                // Get form values
                const name = document.getElementById('name').value.trim();
                const phone = document.getElementById('phone').value.trim();
                const email = document.getElementById('email').value.trim();
                const subject = document.getElementById('subject').value.trim();
                const message = document.getElementById('message').value.trim();
                // Function to send an auto-reply email
                function sendAutoReply(userEmail, userName) {
                    let autoReplyParams = {
                        user_email: userEmail,
                        user_name: userName,
                    };

                    emailjs.send('template_rl82mrw', 'service_o5hbojr', autoReplyParams, 'AR8exSpGt23nEDBAK')
                        .then(function (response) {
                            console.log('Auto-reply sent successfully!', response);
                        })
                        .catch(function (error) {
                            console.error('Auto-reply failed...', error);
                        });
                }

                // Send auto-reply to user
                sendAutoReply(email, name);

                // Validate phone number (exactly 10 digits)
                if (!/^\d{10}$/.test(phone)) {
                    alert('Please enter a valid 10-digit phone number.');
                    return;
                }

                // Validate email (.com or .in only)
                if (!/^\S+@\S+\.(com|in)$/.test(email)) {
                    alert('Please enter a valid email address ending with .com or .in.');
                    return;
                }

                // Validate message length (not more than 500 chars)
                if (message.length > 500) {
                    alert('Message must not exceed 500 characters.');
                    return;
                }

                // Send the email using EmailJS
                let params = {
                    name: name,
                    phone: phone,
                    email: email,
                    subject: subject,
                    message: message,
                };

                emailjs.send('service_ajnbiff', 'template_rl82mrw', params).then(
                    function (response) {
                        console.log('SUCCESS!', response.status, response.text);



                        // Show success message
                        successMessage.style.display = 'block';
                        successMessage.style.opacity = '1';

                        // Hide success message after 5 seconds
                        setTimeout(() => {
                            successMessage.style.opacity = '0';
                            setTimeout(() => {
                                successMessage.style.display = 'none';
                            }, 500);
                        }, 5000);

                        // Reset form
                        form.reset();
                        charCount.textContent = "500 characters remaining";
                    },
                    function (error) {
                        console.log('FAILED...', error);
                        alert('Something went wrong. Please try again.');
                    }
                );
            });



            // Character Count Functionality
            messageBox.addEventListener('input', function () {
                const remainingChars = 500 - messageBox.value.length;
                charCount.textContent = `${remainingChars} characters remaining`;
                charCount.style.color = remainingChars < 0 ? 'red' : 'black';
            });
        });
    </script>

</body>

</html>