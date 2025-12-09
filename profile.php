<?php
session_start();
include("db_connection.php");

if (isset($_SESSION["email"])) {
    $email = $_SESSION['email'];
    $select = "SELECT * FROM `users` WHERE `email` ='$email'";
    $result = mysqli_query($cost, $select);  
    
    if (mysqli_num_rows($result) > 0) {
        $userrow = mysqli_fetch_assoc($result);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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
            font-family: Arial, sans-serif;
           
            width: 100%;
            height: auto;
           
        }
        .content1 {
            display: flex;
            justify-content: center;
            align-items: center;
            margin : 40px 40px;
        }

        .profile-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }
        .profile-photo {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #545454;
        }
        .profile-name {
            font-size: 30px;
            font-weight: bold;
            color: #545454;
            margin: 10px 0;
        }
        .profile-email {
            font-size: 16px;
            color: #545454;
            margin-bottom: 20px;
        }
        .button {
            background-color: #545454;
            color: white;
            border: none;
            padding: 10px 0px;
            margin: 10px;
            margin-left: 4px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <?php include("header.php")?>


    <div class="content1">
    <div class="profile-container">
        <img src="https://img.freepik.com/premium-vector/avatar-profile-icon-flat-style-male-user-profile-vector-illustration-isolated-background-man-profile-sign-business-concept_157943-38764.jpg?semt=ais_hybrid" alt="Profile Photo" class="profile-photo">
        <div class="profile-name"><?php if(!empty($userrow['username'])){ echo $userrow['username'];}else{ echo "";} ?></div>
            <div class="profile-email"><?php if(!empty($userrow['email'])){ echo $userrow['email'];}else{ echo "";} ?></div>
        <button class="button" onclick="viewOrders()">My Orders</button>
        <form action="logout.php" method="post">

            <button class="button" name="logout" onclick="return confirm('are you sure want to Logout')" > Logout</button>
        </form>
    </div>
    </div>
    <?php include("footer.php")?>
</body>
<script>
        function viewOrders() {
            alert("Redirecting to Orders Page...");
        }
        function logout() {
            alert("Logging out...");
        }
    </script>
</html>