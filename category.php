<?php
require __DIR__ . '/includes/catalog.php';
$allowedCategories = ['all', 'pendants', 'earrings', 'coming-soon'];
$category = strtolower($_GET['category'] ?? 'all');
if (!in_array($category, $allowedCategories, true)) $category = 'all';
$categoryCounts = [];
foreach ($catalogProducts as $catalogProduct) {
    $catalogCategory = $catalogProduct['category'];
    $categoryCounts[$catalogCategory] = ($categoryCounts[$catalogCategory] ?? 0) + 1;
}
$visibleProducts = $category === 'all' ? $catalogProducts : array_values(array_filter($catalogProducts, fn($product) => $product['category'] === $category));
$isComingSoon = $category === 'coming-soon';
$categoryName = $category === 'all' ? 'Fine Jewellery' : ($isComingSoon ? 'Coming Soon' : ucfirst($category));
$pageTitle = $categoryName . ' | Carat Street';
$pageDescription = 'Explore ' . strtolower($categoryName) . ' selected with the timeless Carat Street sensibility.';
$pageStyles = ['css/storefront.css'];
$pageStylesAfterResponsive = ['css/catalog-cards.css'];
$bodyClass = 'storefront-page';
require __DIR__ . '/includes/header.php';
?>
<main>
    <section class="listing-intro"><p>Carat Street Collection</p><h1><?= htmlspecialchars($categoryName) ?></h1><span>Thoughtfully designed jewellery that reflects your individuality and becomes part of your story.</span></section>
    <nav class="category-tabs" aria-label="Product categories">
        <?php foreach ($allowedCategories as $item): ?>
            <a class="<?= $category === $item ? 'is-active' : '' ?><?= $item === 'coming-soon' ? ' is-coming-soon' : '' ?>" href="category.php?category=<?= urlencode($item) ?>">
                <span><?= $item === 'all' ? 'Our Collection' : htmlspecialchars(ucwords(str_replace('-', ' ', $item))) ?></span>
            </a>
        <?php endforeach; ?>
    </nav>
    <section class="catalog-wrap">
        <?php if ($isComingSoon): ?>
            <div class="category-coming-soon" role="status">
                <p>Coming Soon</p>
                <h2>A New Expression of Brilliance</h2>
                <span>Something special is on its way. Discover the upcoming Lab-Grown Diamond Collection by Carat Street, where contemporary elegance meets timeless brilliance.</span>
                <span>Thoughtfully designed for those who appreciate the beauty of fine jewellery, the collection brings a fresh perspective to modern diamond jewellery.</span>
                <a href="category.php">Explore Available Jewellery</a>
            </div>
        <?php else: ?>
            <div class="catalog-heading"><p><strong><?= count($visibleProducts) ?></strong> pieces</p><button type="button" data-filter-toggle>Filter &amp; Sort <span>+</span></button></div>
            <div class="filter-drawer" data-filter-drawer hidden><span>Sort by</span><button data-sort="featured">Featured</button><button data-sort="low">Price: Low to High</button><button data-sort="high">Price: High to Low</button></div>
            <div class="catalog-grid" data-catalog-grid>
                <?php foreach ($visibleProducts as $product):
                    $productUrl = catalog_product_url($product);
                ?><article class="catalog-card collection-product-card" data-price="<?= $product['price_value'] ?? 999999999 ?>">
                        <div class="collection-card-media">
                            <a href="<?= htmlspecialchars($productUrl) ?>">
                                <img class="catalog-product-image" loading="lazy" decoding="async" src="assets/<?= htmlspecialchars($product['card_image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                                <img class="catalog-model-image" loading="lazy" decoding="async" src="assets/<?= htmlspecialchars($product['hover_image']) ?>" alt="<?= htmlspecialchars($product['name']) ?> worn by a model">
                            </a>
                            <span class="collection-new-badge">New</span>
                        </div>
                        <section class="collection-card-content">
                            <p class="collection-card-category"><?= htmlspecialchars($product['category']) ?></p>
                            <h2><a href="<?= htmlspecialchars($productUrl) ?>"><?= htmlspecialchars($product['name']) ?></a></h2>
                            <p class="collection-card-description"><?= htmlspecialchars($product['description']) ?></p>
                            <p class="collection-card-facts"><span>Natural Diamonds</span><span><?= htmlspecialchars($product['specs']['Metal']) ?></span></p>
                            <strong class="collection-card-price"><?= htmlspecialchars($product['price']) ?></strong>
                            <a class="collection-card-cta" href="<?= htmlspecialchars($productUrl) ?>">View Details <span aria-hidden="true">→</span></a>
                        </section>
                    </article><?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</main>
<?php $pageScripts = ['js/storefront.js']; require __DIR__ . '/includes/footer.php'; ?>
