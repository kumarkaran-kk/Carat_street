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
$productCategoryName = ucfirst($product['category']);
$productTypeName = $product['category'] === 'earrings' ? 'Earrings' : 'Pendant';
$pageTitle = $product['name'] . ' — Carat Street';
$pageDescription = $product['description'];
$pageStyles = [];
$pageStylesAfterResponsive = ['css/product-refined.css'];
$pageScripts = ['js/product.js'];
$bodyClass = 'product-page';
$footerId = 'contact';
?>
<?php require __DIR__ . '/includes/header.php'; ?>

<main>
    <nav class="pdp-breadcrumb" aria-label="Breadcrumb"><a href="index.php">Home</a><span>›</span><a href="category.php?category=<?= rawurlencode($product['category']) ?>"><?= htmlspecialchars($productCategoryName) ?></a><span>›</span><span><?= htmlspecialchars($product['name']) ?></span></nav>
    <section class="pdp-hero">
        <div class="pdp-gallery">
            <div class="pdp-thumbnails" aria-label="Product views">
                <button class="pdp-thumb is-active" type="button" data-image="assets/<?= htmlspecialchars($product['image']) ?>" data-view="product" aria-label="View <?= htmlspecialchars($product['name']) ?> product image"><img src="assets/<?= htmlspecialchars($product['image']) ?>" alt=""></button>
                <button class="pdp-thumb pdp-thumb-editorial" type="button" data-image="assets/<?= htmlspecialchars($product['hover_image']) ?>" data-view="editorial" aria-label="View <?= htmlspecialchars($product['name']) ?> styled"><img src="assets/<?= htmlspecialchars($product['hover_image']) ?>" alt=""></button>
                <button class="pdp-thumb pdp-thumb-report" type="button" data-image="assets/<?= htmlspecialchars($product['report_image']) ?>" data-view="report" aria-label="View <?= htmlspecialchars($product['name']) ?> jewellery report"><img src="assets/<?= htmlspecialchars($product['report_image']) ?>" alt=""></button>
            </div>
            <div class="pdp-main-image">
                <img src="assets/<?= htmlspecialchars($product['image']) ?>" data-main-product-image data-view="product" alt="<?= htmlspecialchars($product['name']) ?>">
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
                <a class="indikonnect-cta" href="https://www.indiekonnect.com/" target="_blank" rel="noopener noreferrer"><span>View on IndieKonnect</span><b aria-hidden="true">↗</b></a>
            </div>
            <p class="pdp-purchase-notes">Secure checkout <span>•</span> Insured delivery <span>•</span> Lifetime care</p>
            <div class="pdp-promises" id="product-standard" aria-label="The Carat Street standard">
                <article><i aria-hidden="true">&#9998;</i><span>01</span>
                    <h3>Thoughtful Design</h3>
                    <p>Balanced proportions shaped for graceful, effortless wear.</p>
                </article>
                <article><i aria-hidden="true">&#9671;</i><span>02</span>
                    <h3>Refined Finish</h3>
                    <p>Every visible detail is considered from every angle.</p>
                </article>
                <article><i aria-hidden="true">&#9825;</i><span>03</span>
                    <h3>Personal Guidance</h3>
                    <p>Specialist support for styling, selection and care.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="pdp-assurances" aria-label="Carat Street purchase assurances">
        <article><i aria-hidden="true">&#9651;</i><p><strong>BIS Hallmarked</strong><span>Certified gold you can trust</span></p></article>
        <article><i aria-hidden="true">&#9671;</i><p><strong>Certified Diamonds</strong><span>Natural and conflict free</span></p></article>
        <article><i aria-hidden="true">&#9825;</i><p><strong>Lifetime Care</strong><span>Cleaning and care guidance</span></p></article>
        <article><i aria-hidden="true">&#9635;</i><p><strong>Secure Purchase</strong><span>Completed through IndieKonnect</span></p></article>
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
                <p>Current availability, delivery and transaction details are provided by IndieKonnect, our external retail portal.</p>
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
        <div><span>01</span><p>Natural brilliance, selected with discernment.</p><span>02</span><p>Contemporary form, finished with enduring craft.</p><span>03</span><p>Personal service, from first discovery to lifetime care.</p></div>
    </section>

    <section class="design-story pdp-reveal">
        <div class="design-story-visual"><img src="assets/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?> design detail"></div>
        <div class="design-story-copy">
            <p class="section-label">About The Design</p>
            <h2><?= htmlspecialchars($product['design_title']) ?></h2>
            <p><?= htmlspecialchars($product['design_story']) ?></p>
            <div class="design-metrics"><span><b><?= htmlspecialchars($product['specs']['Diamond stones']) ?></b>Diamonds</span><span><b><?= htmlspecialchars($product['specs']['Diamond weight']) ?></b>Total Diamond Weight</span><span><b>Natural</b>Diamond Quality</span><span><b>Refined</b>Finish</span></div>
        </div>
    </section>

    <section class="exclusive-services pdp-reveal">
        <div class="services-copy">
            <p class="section-label">Carat Street Privé</p>
            <h2>Our Private Services</h2>
            <p class="services-intro">Because every piece of jewellery deserves personal attention.</p>
            <article><span>01</span>
                <div>
                    <h3>Book An Appointment</h3>
                    <p>Enjoy an intimate one-to-one jewellery consultation, online or in our boutique.</p><a href="#contact">Book now</a>
                </div>
            </article>
            <article><span>02</span>
                <div>
                    <h3>Expert Advice</h3>
                    <p>Our specialists will guide you through styling, sizing and selecting the right piece.</p><a href="#contact">Speak to an expert</a>
                </div>
            </article>
            <article><span>03</span>
                <div>
                    <h3>Repairs &amp; Servicing</h3>
                    <p>Preserve the brilliance of your jewellery with thoughtful care from our craftspeople.</p><a href="#contact">Discover our care</a>
                </div>
            </article>
        </div>
        <div class="services-image"><img src="assets/<?= htmlspecialchars($product['hover_image']) ?>" alt="Carat Street jewellery styling"></div>
    </section>

    <section class="pdp-related pdp-reveal">
        <p class="section-label">Chosen For You</p>
        <h2>You May Also Like</h2>
        <div class="related-grid">
            <?php foreach ($related as $item): ?><article>
                    <div class="related-image"><img src="assets/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>"></div>
                    <span class="related-type">Carat Street · Fine <?= htmlspecialchars($item['category'] === 'earrings' ? 'Earrings' : 'Pendant') ?></span>
                    <h3><?= htmlspecialchars($item['name']) ?></h3>
                    <p><?= htmlspecialchars($item['price']) ?></p><a href="<?= htmlspecialchars(catalog_product_url($item)) ?>">View Product</a>
                </article><?php endforeach; ?>
        </div>
        <a class="view-all" href="category.php?category=pendants">View All Products</a>
    </section>

    <section class="pdp-categories pdp-reveal" aria-label="Shop jewellery categories">
        <a href="category.php?category=pendants"><img src="assets/web/category-pendants-model.webp" alt=""><span><b>Pendants</b><small>Explore Collection</small></span></a>
        <a href="category.php?category=rings"><img src="assets/web/category-rings-hand.webp" alt=""><span><b>Rings</b><small>Explore Collection</small></span></a>
        <a href="category.php?category=earrings"><img src="assets/web/category-earrings-model.webp" alt=""><span><b>Earrings</b><small>Explore Collection</small></span></a>
    </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
