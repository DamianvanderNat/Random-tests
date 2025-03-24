<?php
// table.php
$jsonData = file_get_contents('products.json');
$products = json_decode($jsonData, true);

$itemsPerPage = 10;
$totalItems = count($products);
$totalPages = ceil($totalItems / $itemsPerPage);
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$startIndex = ($currentPage - 1) * $itemsPerPage;
$currentItems = array_slice($products, $startIndex, $itemsPerPage);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Galactic Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<script src="https://cdn.jsdelivr.net/npm/particles.js"></script>
<script>
    // Init particles.js (✨ glitter rain ✨)
    particlesJS.load('particles-js', 'particles.json', function() {
        console.log('✨ particles.js loaded ✨');
    });
</script>

<body>
<div id="particles-js"></div> <!-- particles.js will attach here -->

    <div class="search-container">
        <input type="text" id="search" placeholder="Search for products...">
        <select id="rarity-filter">
            <option value="">All</option>
            <option value="Legendary">Legendary</option>
            <option value="Very Rare">Very Rare</option>
            <option value="Rare">Rare</option>
            <option value="In Stock">In Stock</option>
            <option value="Low Stock">Low Stock</option>
            <option value="Out of Stock">Out of Stock</option>
        </select>
    </div>

    <table id="productTable">
        <thead>
            <tr>
                <th data-column="name">Product Name</th>
                <th data-column="price">Price</th>
                <th data-column="status">Status</th>
                <th data-column="description">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($currentItems as $product): ?>
                <tr>
                    <td><a href="test-product.php?id=<?php echo $product['id']; ?>"><?php echo htmlspecialchars($product['name']); ?></a></td>
                    <td>$<?php echo htmlspecialchars($product['price']); ?></td>
                    <td>
                        <span class="status-badge <?php echo strtolower(str_replace(' ', '-', $product['status'])); ?>">
                            <?php echo htmlspecialchars($product['status']); ?>
                        </span>
                    </td>
                    <td><?php echo htmlspecialchars($product['description']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>

    <script src="script.js"></script>

</body>

</html>
