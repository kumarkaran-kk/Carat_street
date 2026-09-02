<?php
require __DIR__ . '/includes/catalog.php';
$query = trim($_GET['q'] ?? '');
$results = $query === '' ? [] : array_values(array_filter($catalogProducts, fn($product) => stripos($product['name'] . ' ' . $product['category'], $query) !== false));
$pageTitle = 'Search — Carat Street';
$pageDescription = 'Search the Carat Street jewellery collection.';
$pageStyles = ['css/storefront.css'];
$bodyClass = 'storefront-page search-page';
require __DIR__ . '/includes/header.php';
?>
<main>
    <section class="search-intro"><p>Find Your Piece</p><h1>Search Carat Street</h1><form action="search.php" method="get"><label class="sr-only" for="site-search">Search jewellery</label><input id="site-search" name="q" value="<?= htmlspecialchars($query) ?>" placeholder="Search necklaces, rings, earrings…" autofocus><button type="submit"><img src="assets/search.svg" alt=""><span>Search</span></button></form></section>
    <section class="search-results">
        <?php if ($query === ''): ?><div class="search-empty"><p>Begin with a piece, stone or collection.</p><div><a href="category.php?category=necklaces">Necklaces</a><a href="category.php?category=rings">Rings</a><a href="category.php?category=earrings">Earrings</a><a href="category.php?category=pendants">Pendants</a></div></div>
        <?php elseif (!$results): ?><div class="search-empty"><h2>No pieces found</h2><p>Try a broader search, or explore our complete collection.</p><a class="minimal-button" href="category.php">View All Jewellery</a></div>
        <?php else: ?><div class="results-title"><p><?= count($results) ?> result<?= count($results) === 1 ? '' : 's' ?> for</p><h2>“<?= htmlspecialchars($query) ?>”</h2></div><div class="catalog-grid search-result-grid"><?php foreach ($results as $product): ?><article class="catalog-card"><div><a href="<?= htmlspecialchars(catalog_product_url($product)) ?>"><img loading="lazy" decoding="async" src="assets/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>"></a></div><p><?= htmlspecialchars(ucfirst($product['category'])) ?></p><h2><a href="<?= htmlspecialchars(catalog_product_url($product)) ?>"><?= htmlspecialchars($product['name']) ?></a></h2><strong><?= htmlspecialchars($product['price']) ?></strong></article><?php endforeach; ?></div><?php endif; ?>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
