<style>
    body {
        display: flex;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        background: #545454;
        color: white;
        padding: 20px;
        position: fixed;
        left: 0;
        top: 0;
    }

    .sidebar h2 {
        text-align: center;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar ul li {
        padding: 10px;
        margin: 10px 0;
        background: #626262;
        cursor: pointer;
        text-align: center;
    }

    .sidebar ul li:hover {
        background: #000;
    }

    .content {
        margin-left: 270px;
        padding: 20px;
        flex-grow: 1;
    }
</style>
<div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
        <li><a href="index.php" style="color: white; text-decoration: none;">Add Product</a></li>
        <li><a href="product_show.php" style="color: white; text-decoration: none;">Product Detail</a></li>
    </ul>
</div>
