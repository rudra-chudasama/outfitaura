<?php 
 session_start();
include("db_connection.php");
if (isset($_POST["logout"])) {
    if (isset($_SESSION["email"])) {
    session_destroy() ;
    ?>
    <script>
        window.location.href = "profile.php";
    </script>
    <?php
    }
    
}
?>