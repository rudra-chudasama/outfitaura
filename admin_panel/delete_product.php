<!-- delete logic -->
<!-- php code -->
<?php
include 'db_connection.php';
if (isset($_GET['id'])) {
    $delete_id = $_GET['id'];
    $query = "DELETE FROM upload WHERE id = $delete_id";
    $delete_query = mysqli_query($cost, $query) or die("Query failed");
    if ($delete_query) {
       ?>
       <script>
        alert("Yor data deleted successfully.");
        window.location.href="product_show.php";
       </script>
       <?php 
    }
}
?>