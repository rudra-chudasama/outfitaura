<?php
include("db_connection.php")
?>
<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
   
    <style>
body {
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
            z-index: 0;
            
        }


        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            width: 10%;
            
            object-fit: cover;
        }
    </style>
</head>
<body>
    
    <?php include("header.php") ?>
 

    <h2>Shopping Cart</h2>
    <table>
        <thead>
            <tr>
                <th>SR No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Price</th>
                <th>GST</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="cart-body">
            <tr>
                <td>1</td>
                <td><img src="https://m.media-amazon.com/images/I/713n+TxyfCL.SX569.jpg" alt="Product"></td>
                <td>Men's T-Shirt</td>
                <td><input type="number" value="1" min="1" class="quantity" onchange="updateTotal(this)"></td>
                <td>M</td>
                <td class="price">1100</td>
                <td class="gst">6%</td>
                <td class="total">1150</td>
            </tr>
        </tbody>
    </table>
    
    <h3>Grand Total: ₹<span id="grand-total">1150</span></h3>
    
    <?php include("footer.php") ?>
    
    <script>
        function updateTotal(element) {
            let row = element.closest('tr');
            let quantity = parseInt(element.value);
            let price = parseInt(row.querySelector('.price').innerText);
            let gst = parseInt(row.querySelector('.gst').innerText);
            let total = (price + gst) * quantity;
            row.querySelector('.total').innerText = total;
            
            updateGrandTotal();
        }

        function updateGrandTotal() {
            let totals = document.querySelectorAll('.total');
            let grandTotal = 0;
            totals.forEach(total => {
                grandTotal += parseInt(total.innerText);
            });
            document.getElementById('grand-total').innerText = grandTotal;
        }
    </script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js " integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js " integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js "></script>
   
</body>
</html>