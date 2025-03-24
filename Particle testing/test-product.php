<?php
$jsonData = file_get_contents('products.json');
$products = json_decode($jsonData, true);

$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = null;

foreach ($products as $p) {
    if ($p['id'] === $productId) {
        $product = $p;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
<script>
    // Init particles.js (✨ glitter rain ✨)
    particlesJS.load('particles-js', 'particles.json', function() {
        console.log('✨ particles.js loaded ✨');
    });
</script>
<div id="particles-js"></div> <!-- particles.js will attach here -->

<body class="detail-body">
    <?php if ($product): ?>
        <div class="product-card">
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <p class="price">$<?php echo htmlspecialchars($product['price']); ?></p>
            <span class="status-badge"><?php echo htmlspecialchars($product['status']); ?></span>
            <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>
            <a href="test-table.php" class="back-button">⬅ Back to the shop</a>
        </div>
    <?php else: ?>
        <p class="not-found">Product not found. <a href="table.php" class="back-button">Back to the shop</a></p>
    <?php endif; ?>
</body>

</html>
