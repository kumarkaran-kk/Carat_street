<?php
require __DIR__ . '/includes/catalog.php';
$requestedSlug = strtolower(trim($_GET['product'] ?? $catalogProducts[0]['slug']));
$product = null;
foreach ($catalogProducts as $catalogProduct) {
    if ($catalogProduct['slug'] === $requestedSlug) {
        $product = $catalogProduct;
        break;
    }
}
if ($product === null) {
    http_response_code(404);
    $product = $catalogProducts[0];
}
$related = array_slice(array_values(array_filter($catalogProducts, fn($item) => $item['slug'] !== $product['slug'])), 0, 4);
$galleryImages = $product['gallery_images'] ?: [$product['image'], $product['hover_image']];
$primaryGalleryImage = $galleryImages[0];
$productCategoryName = ucfirst($product['category']);
$productTypeName = $product['category'] === 'earrings' ? 'Earrings' : 'Pendant';
$pageTitle = $product['name'] . ' | Carat Street';
$pageDescription = $product['description'];
$pageStyles = [];
$pageStylesAfterResponsive = ['css/product-refined.css'];
$pageScripts = ['js/product.js'];
$bodyClass = 'product-page product-' . $product['slug'];
$footerId = 'contact';
?>
<?php require __DIR__ . '/includes/header.php'; ?>

<main>
    <nav class="pdp-breadcrumb" aria-label="Breadcrumb"><a href="index.php">Home</a><span>›</span><a href="category.php?category=<?= rawurlencode($product['category']) ?>"><?= htmlspecialchars($productCategoryName) ?></a><span>›</span><span><?= htmlspecialchars($product['name']) ?></span></nav>
    <section class="pdp-hero">
        <div class="pdp-gallery">
            <div class="pdp-thumbnails" aria-label="Product views">
                <?php foreach ($galleryImages as $galleryIndex => $galleryImage):
                    $galleryView = $galleryIndex === 0 ? 'product' : 'gallery';
                    $galleryLabel = $galleryIndex === 0 ? 'Product view' : 'Gallery view ' . ($galleryIndex + 1);
                ?><button class="pdp-thumb<?= $galleryIndex === 0 ? ' is-active' : '' ?>" type="button" data-image="assets/<?= htmlspecialchars($galleryImage) ?>" data-view="<?= htmlspecialchars($galleryView) ?>" data-label="<?= htmlspecialchars($galleryLabel) ?>" aria-label="View <?= htmlspecialchars($product['name'] . ' ' . strtolower($galleryLabel)) ?>"><img src="assets/<?= htmlspecialchars($galleryImage) ?>" alt=""></button><?php endforeach; ?>
                <button class="pdp-thumb pdp-thumb-report" type="button" data-image="assets/<?= htmlspecialchars($product['report_image']) ?>" data-view="report" aria-label="View <?= htmlspecialchars($product['name']) ?> jewellery report"><img src="assets/<?= htmlspecialchars($product['report_image']) ?>" alt=""></button>
            </div>
            <div class="pdp-main-image">
                <img src="assets/<?= htmlspecialchars($primaryGalleryImage) ?>" data-main-product-image data-view="product" alt="<?= htmlspecialchars($product['name']) ?>">
                <button class="pdp-fullscreen" type="button" aria-label="View product image fullscreen">&#x26F6;</button>
                <span class="pdp-image-caption">Product view</span>
            </div>
        </div>
        <div class="pdp-summary">
            <p class="pdp-kicker">Carat Street <?= htmlspecialchars($productTypeName) ?></p>
            <h1><?= htmlspecialchars($product['name']) ?></h1>
            <div class="pdp-diamond-divider" aria-hidden="true"><span>&#9671;</span></div>
            <p class="pdp-description"><?= htmlspecialchars($product['description']) ?></p>
            <div class="pdp-material-facts"><span>&#9671; <?= htmlspecialchars($product['specs']['Metal']) ?></span><span>&#9671; Natural Diamonds</span></div>
            <div class="pdp-acquisition">
                <div class="pdp-price-wrap"><span>Price</span>
                    <p class="pdp-price"><?= htmlspecialchars($product['price']) ?></p>
                </div>
                <a class="purchase-cta" href="<?= htmlspecialchars($product['retail_url']) ?>" target="_blank" rel="noopener noreferrer"><span>View on IndieKonnect</span><b aria-hidden="true">↗</b></a>
            </div>
            <p class="pdp-tax-note">Inclusive of all applicable taxes. Shipping charges are calculated separately at checkout.</p>
            <p class="pdp-purchase-notes">Secure checkout <span>•</span> Insured delivery <span>•</span> Lifetime care</p>
            <div class="pdp-promises" id="product-standard" aria-label="The Carat Street standard">
                <article><i aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m4 20 4.4-1 10.7-10.7a2.3 2.3 0 0 0-3.3-3.3L5.1 15.7 4 20Z"/><path d="m14.5 6.3 3.2 3.2M4.8 15.9l3.3 3.3"/></svg></i><span>01</span>
                    <h3>Thoughtful Design</h3>
                    <p>Balanced proportions shaped for graceful, effortless wear.</p>
                </article>
                <article><i aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m12 2 2.2 6.2L20 10l-5.8 2.1L12 18l-2.1-5.9L4 10l5.9-1.8L12 2Z"/><path d="m19 15 .9 2.1L22 18l-2.1.9L19 21l-.9-2.1L16 18l2.1-.9L19 15Z"/></svg></i><span>02</span>
                    <h3>Refined Finish</h3>
                    <p>Every visible detail is considered from every angle.</p>
                </article>
                <article><i aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M6 3h9l3 3v15H6V3Z"/><path d="M15 3v4h4M9 11h6M9 15h6"/></svg></i><span>03</span>
                    <h3>Complete Details</h3>
                    <p>Clear information about materials, finish and jewellery care.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="pdp-assurances" aria-label="Carat Street purchase assurances">
        <article><i aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 2 20 5v6c0 5-3.4 9.3-8 11-4.6-1.7-8-6-8-11V5l8-3Z"/><path d="m8.5 12 2.2 2.2 4.8-5"/></svg></i><p><strong>BIS Hallmarked</strong><span>Certified gold you can trust</span></p></article>
        <article><i aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m3 9 4-5h10l4 5-9 12L3 9Z"/><path d="M3 9h18M7 4l5 17 5-17M7 9l5-5 5 5"/></svg></i><p><strong>Certified Diamonds</strong><span>Natural and conflict free</span></p></article>
        <article><i aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M20.8 5.8a5.5 5.5 0 0 0-7.8 0L12 6.9l-1.1-1.1a5.5 5.5 0 0 0-7.7 7.8L12 22l8.8-8.4a5.5 5.5 0 0 0 0-7.8Z"/><path d="M17 9v4M15 11h4"/></svg></i><p><strong>Lifetime Care</strong><span>Cleaning and care guidance</span></p></article>
        <article><i aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3M12 14v3"/></svg></i><p><strong>Secure Purchase</strong><span>Completed through IndieKonnect</span></p></article>
    </section>

    <section class="pdp-secondary-details pdp-reveal" id="product-notes" aria-label="Product details">
        <section class="pdp-specifications" aria-labelledby="specification-title">
            <p id="specification-title">Product Details</p>
            <dl><?php foreach ($product['specs'] as $label => $value): ?><div><dt><?= htmlspecialchars($label) ?></dt><dd><?= htmlspecialchars($value) ?></dd></div><?php endforeach; ?>
                <div><dt>Diamond type</dt><dd>Natural Diamonds</dd></div>
                <div><dt>Setting</dt><dd>Precision Prong Setting</dd></div>
                <div><dt>Finish</dt><dd>High Polish</dd></div>
            </dl>
        </section>
        <div class="pdp-accordions">
            <details open>
                <summary>Product Notes</summary>
                <p>Diamond <?= htmlspecialchars(strtolower($productTypeName)) ?> crafted in <?= htmlspecialchars($product['specs']['Metal']) ?>.</p>
            </details>
            <details>
                <summary>Jewellery Care</summary>
                <p>Store separately in a soft pouch and avoid direct contact with fragrance, moisture and abrasive surfaces.</p>
            </details>
            <details>
                <summary>Availability &amp; Purchase</summary>
                <p>Current availability, delivery and transaction details are provided by IndieKonnect, our authorised retail partner.</p>
            </details>
            <details>
                <summary>Shipping &amp; Returns</summary>
                <p>Shipping timelines, insurance and return eligibility are confirmed on IndieKonnect before purchase.</p>
            </details>
        </div>
    </section>

    <section class="pdp-brand-statement pdp-reveal" aria-label="The Carat Street philosophy">
        <p>Carat Street · House of Fine Jewellery</p>
        <h2>Designed To Be Worn.<br><em>Created To Be Remembered.</em></h2>
        <div><span>01</span><p>Natural brilliance, selected with discernment.</p><span>02</span><p>Contemporary form, finished with enduring craft.</p><span>03</span><p>Considered details, from first discovery to lifetime care.</p></div>
    </section>

    <section class="design-story pdp-reveal">
        <div class="design-story-visual"><img src="assets/<?= htmlspecialchars($product['card_image']) ?>" alt="<?= htmlspecialchars($product['name']) ?> design detail"></div>
        <div class="design-story-copy">
            <p class="section-label">About The Design</p>
            <h2><?= htmlspecialchars($product['design_title']) ?></h2>
            <p><?= htmlspecialchars($product['design_story']) ?></p>
            <div class="design-metrics"><span><b><?= htmlspecialchars($product['specs']['Diamond stones']) ?></b>Diamonds</span><span><b><?= htmlspecialchars($product['specs']['Diamond weight']) ?></b>Total Diamond Weight</span><span><b>Natural</b>Diamond Quality</span><span><b>Refined</b>Finish</span></div>
        </div>
    </section>

    <section class="exclusive-services pdp-reveal">
        <div class="services-copy">
            <p class="section-label">The Carat Street Standard</p>
            <h2>Designed With Every Detail In Mind</h2>
            <p class="services-intro">Discover the details, craftsmanship and care behind every piece.</p>
            <article><span>01</span>
                <div>
                    <h3>Explore The Collection</h3>
                    <p>Discover fine jewellery shaped for everyday elegance and meaningful occasions.</p><a href="category.php?category=<?= rawurlencode($product['category']) ?>">View the collection</a>
                </div>
            </article>
            <article><span>02</span>
                <div>
                    <h3>Product Information</h3>
                    <p>Review materials, diamond details, weights and finish before choosing your piece.</p><a href="#product-notes">View product details</a>
                </div>
            </article>
            <article><span>03</span>
                <div>
                    <h3>Repairs &amp; Servicing</h3>
                    <p>Preserve the brilliance of your jewellery with thoughtful everyday care.</p><a href="jewellery-care.php">Read the care guide</a>
                </div>
            </article>
        </div>
        <div class="services-image"><img src="assets/<?= htmlspecialchars($product['hover_image']) ?>" alt="<?= htmlspecialchars($product['name']) ?> worn by a model"></div>
    </section>

    <section class="pdp-related pdp-reveal">
        <p class="section-label">Chosen For You</p>
        <h2>You May Also Like</h2>
        <div class="related-grid">
            <?php foreach ($related as $item): ?><article>
                    <div class="related-image"><img src="assets/<?= htmlspecialchars($item['card_image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>"></div>
                    <span class="related-type">Carat Street · Fine <?= htmlspecialchars($item['category'] === 'earrings' ? 'Earrings' : 'Pendant') ?></span>
                    <h3><?= htmlspecialchars($item['name']) ?></h3>
                    <p><?= htmlspecialchars($item['price']) ?></p><a href="<?= htmlspecialchars(catalog_product_url($item)) ?>">View Product</a>
                </article><?php endforeach; ?>
        </div>
        <a class="view-all" href="category.php?category=pendants">View All Products</a>
    </section>

    <section class="pdp-categories pdp-reveal" aria-label="Shop jewellery categories">
        <a href="category.php?category=pendants"><img src="assets/web/category-pendants-model.jpg" alt=""><span><b>Pendants</b><small>Explore Collection</small></span></a>
        <?php /* Rings are retained for a future collection launch.
        <a href="category.php?category=rings"><img src="assets/web/category-rings-hand.webp" alt=""><span><b>Rings</b><small>Explore Collection</small></span></a>
        */ ?>
        <a href="category.php?category=earrings"><img src="assets/web/category-earrings-model.jpg" alt=""><span><b>Earrings</b><small>Explore Collection</small></span></a>
    </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
