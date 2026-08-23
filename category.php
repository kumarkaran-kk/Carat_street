<?php
require __DIR__ . '/includes/catalog.php';
$allowedCategories = ['all', 'necklaces', 'pendants', 'rings', 'earrings'];
$category = strtolower($_GET['category'] ?? 'all');
if (!in_array($category, $allowedCategories, true)) $category = 'all';
$visibleProducts = $category === 'all' ? $catalogProducts : array_values(array_filter($catalogProducts, fn($product) => $product['category'] === $category));
$categoryName = $category === 'all' ? 'Fine Jewellery' : ucfirst($category);
$pageTitle = $categoryName . ' — Carat Street';
$pageDescription = 'Explore ' . strtolower($categoryName) . ' selected with the timeless Carat Street sensibility.';
$pageStyles = ['css/storefront.css'];
$bodyClass = 'storefront-page';
require __DIR__ . '/includes/header.php';
?>
<main>
    <section class="listing-intro"><p>Carat Street Collections</p><h1><?= htmlspecialchars($categoryName) ?></h1><span>Jewellery with a quiet confidence, thoughtfully made for your story.</span></section>
    <nav class="category-tabs" aria-label="Product categories">
        <?php foreach ($allowedCategories as $item): ?><a class="<?= $category === $item ? 'is-active' : '' ?>" href="category.php?category=<?= urlencode($item) ?>"><?= $item === 'all' ? 'View All' : htmlspecialchars(ucwords(str_replace('-', ' ', $item))) ?></a><?php endforeach; ?>
    </nav>
    <section class="catalog-wrap">
        <div class="catalog-heading"><p><strong><?= count($visibleProducts) ?></strong> pieces</p><button type="button" data-filter-toggle>Filter &amp; Sort <span>+</span></button></div>
        <div class="filter-drawer" data-filter-drawer hidden><span>Sort by</span><button data-sort="featured">Featured</button><button data-sort="low">Price: Low to High</button><button data-sort="high">Price: High to Low</button></div>
        <div class="catalog-grid" data-catalog-grid>
            <?php foreach ($visibleProducts as $product): ?><article class="catalog-card" data-price="<?= (float) preg_replace('/[^0-9.]/', '', $product['price']) ?>"><div><a href="product.php"><img loading="lazy" decoding="async" src="assets/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>"></a></div><p><?= htmlspecialchars(ucfirst($product['category'])) ?></p><h2><a href="product.php"><?= htmlspecialchars($product['name']) ?></a></h2><strong><?= htmlspecialchars($product['price']) ?></strong></article><?php endforeach; ?>
        </div>
    </section>
</main>
<?php $pageScripts = ['js/storefront.js']; require __DIR__ . '/includes/footer.php'; ?>
