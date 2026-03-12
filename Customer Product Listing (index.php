<?php
include 'db.php';

$stmt = $conn->query("SELECT p.*, u.name AS vendor_name FROM products p JOIN users u ON p.vendor_id = u.id");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Product List</h2>
<?php if(isset($_SESSION['name'])): ?>
    Welcome, <?= $_SESSION['name'] ?> | <a href="logout.php">Logout</a>
<?php else: ?>
    <a href="login.php">Login</a> | <a href="register.php">Register</a>
<?php endif; ?>

<?php foreach($products as $product): ?>
<div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
    <h3><?= $product['name'] ?></h3>
    <p><?= $product['description'] ?></p>
    <p>Price: $<?= $product['price'] ?></p>
    <p>Vendor: <?= $product['vendor_name'] ?></p>
    <a href="cart/add_to_cart.php?id=<?= $product['id'] ?>">Add to Cart</a>
</div>
<?php endforeach; ?>
