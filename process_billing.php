<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="x-icon" href="IMG/OFA.jpg">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Billing-Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9e7e2;
            font-family: 'Segoe UI', sans-serif;
        }

        .logo img {
            padding-bottom: 10px;
        }

        .billing-card {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .btn-custom {
    background-color: #545454;
    color: #fff;
    padding: 10px 25px;
    border: none;
    border-radius: 12px;
    font-weight: 500;
    font-size: 16px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-custom:hover {
    background-color: #e9e7e2;
    color: #545454;
    transform: scale(1.05);
    box-shadow: 0 6px 15px rgba(84, 84, 84, 0.3);
}

    </style>
</head>

<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="billing-card">
                    <div class="logo text-center">
                        <a href="index.php">
                            <img src="img/logo.png" alt="Outfit Aura Logo" class="img-fluid" style="max-height: 60px;">
                        </a>
                    </div>
                    <h3 class="mb-4 text-center">Billing Information</h3>
                    <form action="process_billing.php" method="POST">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Shipping Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="payment" class="form-label">Payment Method</label>
                            <select class="form-select" id="payment" name="payment" required>
                                <option selected disabled>Select Payment Method</option>
                                <option value="cod">Cash on Delivery</option>
                                <option value="card">Credit/Debit Card</option>
                                <option value="upi">UPI</option>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-custom">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>