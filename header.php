<?php

include("db_connection.php");
error_reporting(0);
// if (isset($_SESSION["email"])) {

//     $email_h = $_SESSION['email'];
//     $select_hreader = "SELECT * FROM `users` WHERE `email` ='$email_h'";
//     $result_header = mysqli_query($cost, $select_hreader);  

//     if (mysqli_num_rows($result_header) > 0) {
//         $userrow = mysqli_fetch_assoc($result_header);
//     }
// }


$current_Page = basename($_SERVER['PHP_SELF']);
?>
<style>
    /* Header & Navbar */
    .header_main {
        position: sticky;
        top: 0;
        z-index: 50;

        background-color: #e9e7e2 !important;
    }

    .navbar-expand-lg .navbar-collapse {
        padding-left: 5%;
    }

    .navbar-nav .nav-link {
        font-size: 18px;
    }

    @media (max-width: 767.98px) {
        .navbar-nav .nav-link {
            font-size: 16px;
        }
    }

    @media (max-width: 800px) {
        img {
            max-width: 100%;
            /* Logo should be responsive */
            height: auto;
            /* Maintain aspect ratio */
        }

        /* Ensure the search form stays in the navbar */
        .navbar-search {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            /* Add some spacing */
        }

        .navbar-search form {
            margin-right: 0;
            margin-left: 0;
            /* Remove the right margin */
            width: 100%;
            /* Full width */
        }

        .navbar-search input[type="text"] {
            width: calc(100% - 100px);
            /* Adjust width to fit the container */
        }

        .navbar-search button {
            width: 100px;
            /* Fixed width for the button */
        }
    }

    .navbar li {
        position: relative;
        padding-right: 15px;
    }

    .btn-secondary {
        background-color: #e9e7e2 !important;
        border-color: #e9e7e2 !important;
        color: #545454 !important;
    }

    .navbar-nav .nav-link.active,
    .navbar-nav .nav-link.show {
        color: #545454;
    }

    .nav-link {
        color: #545454;
    }

    .nav-link:hover,
    .nav-link.active {
        color: #333333;
        /* Change to desired color */
        text-decoration: underline;
        /* Optional underline */
        transition: color 0.3s ease, text-decoration 0.3s ease;
    }

    .nav-link.active::after {
        content: "";
        background-color: #545454;
    }

    .nav-style span {
        margin-right: 15px;
    }

    .nav-style a {
        color: #545454;
    }

    .navbar-nav .nav-link {
        font-size: 18px;
    }

    @media (max-width: 767.98px) {
        .navbar-nav .nav-link {
            font-size: 16px;
        }
    }

    /* Search start */

    .navbar-search form {
        display: flex;
        margin-right: 190px;
    }

    .navbar-search input[type="text"] {
        padding: 10px;
        border: none;
        /* No border */
        border-radius: 20px 0 0 20px;
        outline: none;
        width: 300px;
        /* Adjust width as needed */
        background-color: #f5f5f5;
        /* Light background for input */
        transition: background-color 0.3s ease;
    }

    @media (max-width: 768px) {
        .navbar-search input[type="text"] {
            width: 100%;
            /* Full width on mobile */
            border-radius: 20px 0 0 20px;
            /* Adjust border radius for full-width input */
        }

       
    }

    /* Fix button styling next to input */
    .navbar-search button {
        height: 42px;
        border: none;
        background-color: #545454;
        color: white;
        padding: 20px;
        border-radius: 0 20px 20px 0;
    }

    /* Adjust button on mobile */
    @media (max-width: 768px) {
        .navbar-search button {
            border-radius: 20px;
            padding: 10px;
            width: 100%;
            /* Make button full width if needed */
        }
    }

    .navbar-search input[type="text"]:focus {
        background-color: #e0e0e0;
        /* Slightly darker on focus */
    }

    .search-button {
        height: 42px;
        /* Match the input field height */
        padding: 10px 15px;
        border: none;
        background-color: #545454;
        color: white;
        border-radius: 0 20px 20px 0;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        font-weight: bold;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar-search input[type="text"] {
        height: 42px;
        /* Set height same as button */
        padding: 10px;
        border: none;
        border-radius: 20px 0 0 20px;
        outline: none;
        width: 300px;
        background-color: #f5f5f5;
        transition: background-color 0.3s ease;
    }

    .search-button i {
        font-size: 20px;
        /* Adjust icon size */
    }


    .navbar-search button:hover {
        background-color: #333333;
        /* Darker shade on hover */
        transform: translateY(-2px);
        /* Slight lift effect */
        box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
        /* Enhanced shadow on hover */
    }

    .navbar-search button i {
        font-size: 16px;
        /* Adjust icon size */
        transition: transform 0.3s ease;
    }

    .navbar-search button:hover i {
        transform: scale(1.1);
        /* Slightly enlarge icon on hover */
    }

    /* Search end */

    .nav-style span {
        border-radius: 10px;
        padding: 15px 20px;
    }

    .fa-user {
        --fa: "\f007";
        color: #565656;
        padding-right: 10px;
        font-size: 28px;
    }


    /* Header & Navbar */
</style>
<div class="nav-style header_main content">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="nevlogo">
                <a href="index.php"><img src="img/logo.png"></a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($current_Page == 'index.php') {
                            echo "active";
                        } ?>" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($current_Page == 'about.php') {
                            echo "active";
                        } ?>" aria-current="page" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <!-- Split dropdown button -->
                        <div class="btn-group dropdown">
                            <a href="product.php" class="nav-link <?php if ($current_Page == 'product.php' || $current_Page == 'Mans-Ware.php' || $current_Page == 'Womans-Ware.php' || $current_Page == 'Kids-Ware.php') {
                                echo "active";
                            } ?> btn btn-secondary">Product</a>
                            <a class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="Mans-Ware.php">Men's Ware</a></li>
                                <li><a class="dropdown-item" href="Womans-Ware.php">Women's Ware</a></li>
                                <li><a class="dropdown-item" href="Kids-Ware.php">Kid's Ware</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($current_Page == 'contectus-page.php') {
                            echo "active";
                        } ?>" aria-current="page" href="contectus-page.php">Contact Us</a>
                    </li>
                </ul>
                <div class="navbar-search">
                    <?php
                    if (isset($_POST["search"])) {

                        $search = trim($_POST['search']);
                    } else {
                        $search = '';
                    }

                    ?>
                    <form action="product.php" method="post">
                        <input type="text" name="search" value="<?php echo $search; ?>"
                            placeholder="Search for products...">
                        <button class="search-button" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <a href="profile.php"><i class="fa-solid fa-user"></i></a>
                <span class="login">
                    <?php if (!empty($userrow['email'])) { ?>
                        <b><a style="text-transform: capitalize;padding:0.5rem;border:2px solid #adadad;border-radius:10px;color:white;background-color:#565656;"
                                class="nav-link" aria-current="page"
                                href="profile.php"></i><?php echo $userrow['username']; ?></a></span>
                    </b>
                <?php } else {
                        ?>
                    <a class="nav-link" aria-current="page" href="login-page.php"></i>Login</a></span>
                <?php } ?>
            </div>
        </div>
    </nav>
</div>