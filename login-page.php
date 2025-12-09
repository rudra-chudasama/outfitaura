<?php
session_start();
include("db_connection.php");
if (isset($_POST['submit'])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    
        $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
        $result = mysqli_query($cost, $sql);

        
            $num_rows = mysqli_num_rows($result);
            $array = mysqli_fetch_assoc($result);
            if ($num_rows == 1) {
                
                $_SESSION['email'] = $array['email'];
                
                ?>
                <script>
                    alert("Your Login is Successfully");
                    window.location.href = "index.php";
                </script>
                <?php

            }else {
        ?>
        <script>
            alert("Please enter valid email and password");
            window.location.href = "login-page.php";
        </script>
        <?php
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="x-icon" href="IMG/OFA.jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" />

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #e9e7e2 !important;
            margin: 0;
            padding: 0;
        }

        .login-box {
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 440px;
            height: 550px;
            padding: 20px;
            /* Reduced padding for more space */
            background: #e9e7e2 !important;
            /* Added background for better visibility */
            border-radius: 10px;
            /* Added border radius for aesthetics */
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            /* Improved shadow */
        }

        .login-box img {
            margin-left: 52px;
            margin-bottom: 40px;
            width: 200px;
        }

        .login-header header {
            color: #333;
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 20px;
            /* Added margin to create space below the header */
            text-align: center;
            /* Center the header text */
        }

        .input-box {
            margin-bottom: 15px;
            /* Added margin for spacing */
        }

        .input-field {
            width: 100%;
            height: 60px;
            font-size: 17px;
            padding: 0 25px;
            border-radius: 30px;
            border: none;
            box-shadow: 0px 5px 10px 1px #545454;
            outline: none;
            transition: .3s;
        }

        ::placeholder {
            font-weight: 500;
            color: #222;
        }

        .input-field:focus {
            width: 105%;
        }

        .forgot {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            margin-left: 65%;
        }

        section {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #555;
        }

        #check {
            margin-right: 10px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        section a {
            color: #555;
        }

        .input-submit {
            position: relative;
        }

        .submit-btn {
            width: 100%;
            height: 60px;
            background: #222;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: .3s;
        }

        .input-submit label {
            position: absolute;
            top: 45%;
            left: 50%;
            color: #fff;
            transform: translate(-50%, -50%);
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #000;
            transform: scale(1.05, 1);
        }

        .sign-up-link {
            text-align: center;
            font-size: 15px;
            margin-top: 20px;
        }

        .sign-up-link a {
            color: #000;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <a href="index.php">
            <div class="logo">
                <figure>
                    <img src="IMG/logo.png" alt="">
                </figure>
        </a>
    </div>
    <div class="login-header">
        <header>Login</header>
    </div>
    <form action="#" method="post">
        <div class="input-box">
            <input type="text" name="email" class="input-field" placeholder="Email" autocomplete="off" required>
        </div>
        <div class="input-box">
            <input type="password" name="password" class="input-field" placeholder="password" autocomplete="off"
                required>
        </div>
        <div class="forgot">
            <section>
                <a href="#">Forgot password</a>
            </section>
        </div>
        <div class="input-submit">
            <button class="submit-btn" name="submit" id="submit"></button>
            <label for="submit">Sing in</label>
        </div>
        <div class="sign-up-link">
            <p>Don't have account? <a href="signup-page.php">Sign up</a></p>
        </div>
        </div>

    </form>
</body>

</html>