<?php
    include("db_connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $showAlert = "false";
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

if($password == $cpassword){ 
     $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ( '$username', '$email', '$password');";
     $result = mysqli_query($cost, $sql);
     if ($result){ 
        ?>
        <script>
            alert("Your Signup is Successfully");
            window.location.href = "login-page.php";
        </script>
      <?php
    
     }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="x-icon" href="IMG/OFA.jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #e9e7e2 !important;
        }

        .signup-box {
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 440px;
            height: 600px;
            padding: 20px;
            background: #e9e7e2 !important;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }

        .signup-box img {
            margin-left: 100px;
            margin-bottom: 30px;
            width: 200px;
        }

        .signup-header header {
            color: #333;
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }

        .input-box {
            margin-bottom: 15px;
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

        .login-link {
            text-align: center;
            font-size: 15px;
            margin-top: 20px;
        }

        .login-link a {
            color: #000;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="signup-box">
        <a href="index.php">
            <div class="logo">
                <figure>
                    <img src="IMG/logo.png" alt="">
                </figure>
        </a>
    </div>
    <form action="#" method="post">
        <div class="signup-header">
            <header>Sign Up</header>
        </div>
        <div class="input-box">
            <input type="text" name="username" class="input-field" id="username" placeholder="Username" autocomplete="off" required>
        </div>
        <div class="input-box">
            <input type="email" name="email" class="input-field" id="email" placeholder="Email" autocomplete="off" required>
        </div>
        <div class="input-box">
            <input type="password" name="password" class="input-field" id="password" placeholder="Password" autocomplete="off" required>
        </div>
        <div class="input-box">
            <input type="password" name="cpassword" class="input-field" id="confirm-password" placeholder="Confirm Password"
                autocomplete="off" required>
        </div>
        <div class="input-submit">
            <button class="submit-btn" id="submit" onclick="validateForm()"></button>
            <label for="submit">Sign Up</label>
        </div>
        <div class="login-link">
            <p>Already have an account? <a href="login-page.php">Login</a></p>
        </div>
        </div>
    </form>
    <script>
        function validateForm() {
            const username = document.getElementById('username').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const confirmPassword = document.getElementById('confirm-password').value.trim();

            // Regular expressions for validation
            const usernameRegex = /^[A-Za-z]+$/; // Only letters allowed
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|in)$/; // Email should contain @ and end with .com or .in

            if (!username || !email || !password || !confirmPassword) {
                alert('All fields are required!');
                return false;
            }

            if (!usernameRegex.test(username)) {
                alert('Username can only contain letters (no numbers or special characters).');
                return false;
            }

            if (!emailRegex.test(email)) {
                alert('Enter a valid email (must contain "@" and end with ".com" or ".in").');
                return false;
            }

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return false;
            }

            return true;
        }
    </script>
</body>

</html>