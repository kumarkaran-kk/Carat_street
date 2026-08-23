<?php
$related = [
    ['web/diamond-halo-pendant.webp', 'Diamond Halo Pendant', '$82.00'],
    ['web/sculpted-diamond-pendant.webp', 'Eternal Gold Necklace', '$74.00'],
    ['web/diamond-halo-pendant.webp', 'Celestial Drop Pendant', '$88.00'],
    ['web/sculpted-diamond-pendant.webp', 'Sculpted Diamond Pendant', '$79.00'],
];
$pageTitle = 'Necklace Sets — Carat Street';
$pageDescription = "Discover Carat Street's handcrafted necklace set, designed with timeless stones and a modern silhouette.";
$pageStyles = ['css/product.css'];
$pageScripts = ['js/product.js'];
$bodyClass = 'product-page';
$footerId = 'contact';
?>
<?php require __DIR__ . '/includes/header.php'; ?>

    <main>
        <section class="pdp-hero">
            <div class="pdp-gallery">
                <div class="pdp-thumbnails" aria-label="Product views">
                    <?php for ($i = 1; $i <= 4; $i++): ?><button class="pdp-thumb <?= $i === 1 ? 'is-active' : '' ?>" data-angle="<?= $i ?>" aria-label="View product angle <?= $i ?>"><span class="product-crop angle-<?= $i ?>"></span></button><?php endfor; ?>
                </div>
                <div class="pdp-main-image"><span class="product-crop angle-1" data-main-product-image role="img" aria-label="Gold and diamond necklace set"></span></div>
            </div>
            <div class="pdp-summary">
                <p class="pdp-kicker">Carat Street Signature</p>
                <h1>Necklace Sets</h1>
                <p class="pdp-price">82.00$</p>
                <p class="pdp-description">A sculptural necklace set where luminous stones meet warm, polished gold. Each detail is placed by hand to make every celebration feel unforgettable. <button type="button" data-read-more>Read More</button><span class="pdp-more" hidden> Designed for lasting comfort and effortless brilliance from day into evening.</span></p>
                <div class="pdp-buy-row">
                    <div class="quantity" aria-label="Quantity selector"><button type="button" data-qty-minus aria-label="Decrease quantity">−</button><output data-quantity>1</output><button type="button" data-qty-plus aria-label="Increase quantity">+</button></div>
                    <button class="add-cart" type="button">Add to Cart</button>
                </div>
                <div class="pdp-utilities"><button type="button">↗ Share</button></div>
                <div class="pdp-promises">
                    <div><img src="assets/web/icon-handcrafted.webp" alt=""><span>Hand Crafted</span></div>
                    <div><img src="assets/web/icon-gold-plated.webp" alt=""><span>Gold-Plated</span></div>
                    <div><img src="assets/web/icon-hypoallergenic.webp" alt=""><span>Hypoallergenic</span></div>
                </div>
                <div class="pdp-accordions">
                    <details open><summary>Materials</summary><p>Diamond, Emerald, Turquoise</p></details>
                    <details><summary>Metal Details</summary><p>18k gold-plated recycled brass with a high-polish finish.</p></details>
                    <details><summary>Size Chart</summary><p>Adjustable 40–46 cm chain. Pendant measures 30 mm.</p></details>
                    <details><summary>Shipping</summary><p>Complimentary insured delivery and easy 14-day returns.</p></details>
                </div>
            </div>
        </section>

        <section class="design-story">
            <p class="section-label">About The Design</p>
            <h2>A Modern Heirloom, Made To Be Remembered</h2>
            <p>The necklace draws its rhythm from delicate floral geometry. Brilliant stones, hand-set in warm gold, create a softly sculpted silhouette that catches light from every direction.</p>
            <div class="collection-notes">
                <article><span>01</span><h3>Pearl Intuition</h3><p>Organic curves and luminous details celebrate confidence, grace and the beauty of following your own instinct.</p></article>
                <article><span>02</span><h3>Serenity Blue Sandstone</h3><p>A calm blue accent brings depth to the composition, balancing the brilliance of diamonds with a quiet celestial glow.</p></article>
            </div>
        </section>

        <section class="exclusive-services">
            <div class="services-copy">
                <p class="section-label">Made Personal</p><h2>Rose’s Exclusive Services</h2>
                <article><span>01</span><div><h3>Book An Appointment</h3><p>Enjoy an intimate one-to-one jewellery consultation, online or in our boutique.</p><a href="#contact">Book now</a></div></article>
                <article><span>02</span><div><h3>Expert Advice</h3><p>Our specialists will guide you through styling, sizing and selecting the right piece.</p><a href="#contact">Speak to an expert</a></div></article>
                <article><span>03</span><div><h3>Repairs &amp; Servicing</h3><p>Preserve the brilliance of your jewellery with thoughtful care from our craftspeople.</p><a href="#contact">Discover our care</a></div></article>
            </div>
            <div class="services-image"><img src="assets/web/exclusive-services-models.webp" alt="Two women wearing Carat Street jewellery"></div>
        </section>

        <section class="pdp-related">
            <p class="section-label">Chosen For You</p><h2>You May Also Like</h2>
            <div class="related-grid">
                <?php foreach ($related as $item): ?><article><div class="related-image"><img src="assets/<?= $item[0] ?>" alt="<?= htmlspecialchars($item[1]) ?>"></div><h3><?= htmlspecialchars($item[1]) ?></h3><p><?= htmlspecialchars($item[2]) ?></p><a href="product.php">View Product</a></article><?php endforeach; ?>
            </div>
            <a class="view-all" href="index.php#jewellery">View All Products</a>
        </section>

        <section class="pdp-categories" aria-label="Shop jewellery categories">
            <a href="category.php?category=pendants"><img src="assets/web/category-pendants-model.webp" alt=""><span>All Pendants</span></a>
            <a href="category.php?category=rings"><img src="assets/web/category-rings-hand.webp" alt=""><span>All Rings</span></a>
            <a href="category.php?category=earrings"><img src="assets/web/category-earrings-model.webp" alt=""><span>All Earrings</span></a>
        </section>
    </main>

<?php require __DIR__ . '/includes/footer.php'; ?>
