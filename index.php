<?php
$products = [
    ['web/gold-necklace-product.webp', 'web/diamond-pendant-product.webp', 'Stylish Pearl Necklace', '$23.00 – $25.00'],
    ['web/pearl-necklace-product.webp', 'web/diamond-pendant-alternate.webp', 'Stylish Pearl Necklace', '$23.00 – $25.00'],
    ['web/gold-necklace-product.webp', 'web/jewellery-styling-model.webp', 'Stylish Pearl Necklace', '$23.00 – $25.00'],
    ['web/pearl-necklace-product.webp', 'web/diamond-pendant-product.webp', 'Stylish Pearl Necklace', '$23.00 – $25.00'],
];
$pageTitle = 'Carat Street — Fine Jewellery';
$pageDescription = "Timeless jewellery for life's most meaningful moments.";
$bodyClass = 'home-page';
?>
<?php require __DIR__ . '/includes/header.php'; ?>

<main id="home">
    <section class="hero">
        <div class="hero-slides" aria-label="Featured jewellery collections">
            <img class="hero-slide active" src="assets/web/hero-diamond-models.webp" alt="Models wearing diamond jewellery">
            <img class="hero-slide" src="assets/web/hero-statement-earrings.webp" alt="Model wearing statement earrings">
            <img class="hero-slide" src="assets/web/hero-pearl-editorial.webp" alt="Pearl jewellery editorial">
            <img class="hero-slide" src="assets/web/hero-charm-editorial.webp" alt="Charm jewellery editorial">
        </div>
        <div class="hero-copy">
            <p>Adorn your story with</p>
            <div class="hero-title-window">
                <div class="hero-title-track"><span>Diamonds</span><span>Heart stone</span><span>Pearls</span><span>Charms</span></div>
            </div>
            <a class="button button-dark" href="#collections">Shop Now</a>
        </div>
    </section>

    <section class="occasion section-pad" id="story">
        <div class="occasion-visual"><img src="assets/web/birthstone-occasion-model.webp" alt="Woman wearing fine jewellery"><span class="occasion-title">Embrace Your Birthstone's<br>Power And Beauty</span><span class="seal">Know<br>More</span></div>
        <div class="occasion-copy">
            <p class="eyebrow">Born to Shine, Crafted to Last</p>
            <h2>A Gem for Every Birthday,<br>A Story for Every Stone</h2>
            <p>Every birthstone carries a meaning as individual as the person who wears it. Set in refined silhouettes and finished with thoughtful detail, our birthstone jewellery transforms colour, character and personal milestones into modern keepsakes—pieces chosen for today and treasured for years to come.</p><a class="text-link" href="#jewellery">Shop Now <span aria-hidden="true">→</span></a>
        </div>
    </section>

    <section class="collections" id="collections">
        <div class="collections-backgrounds" aria-hidden="true">
            <img class="collections-background collections-background-default is-active" data-collection-bg="default" src="assets/web/collections-overview.webp" alt="">
            <img class="collections-background" data-collection-bg="rings" src="assets/web/collection-rings.webp" alt="">
            <img class="collections-background" data-collection-bg="earrings" src="assets/web/collection-earrings.webp" alt="">
            <img class="collections-background" data-collection-bg="pendant" src="assets/web/collection-pendants.webp" alt="">
        </div>
        <article class="collection-card rings">
            <div>
                <h3>Rings</h3>
                <p>From delicate diamond bands to bold modern silhouettes,<br>discover rings crafted to celebrate promises, milestones<br>and the beauty of everyday moments</p><a href="category.php?category=rings">Know More</a>
            </div>
        </article>
        <article class="collection-card earrings">
            <div>
                <h3>Earrings</h3>
                <p>From refined studs to expressive drops, discover earrings<br>shaped to frame the face with light, movement<br>and effortless elegance</p><a href="category.php?category=earrings">Know More</a>
            </div>
        </article>
        <article class="collection-card pendant">
            <div>
                <h3>Pendants</h3>
                <p>Meaningful symbols, luminous stones and graceful forms<br>come together in pendants designed to rest close<br>to the heart and be treasured</p><a href="category.php?category=pendants">Know More</a>
            </div>
        </article>
        <article class="collection-card bracelet">
            <div>
                <h3>Bracelets</h3>
                <p>Polished links, delicate details and brilliant stones create<br>bracelets that move beautifully with you from day<br>to evening, finished by hand</p><a href="product.php">Know More</a>
            </div>
        </article>
    </section>

    <section class="products section-pad" id="jewellery">
        <p class="eyebrow center">Freshly Arrived</p>
        <h2 class="center">Shine Brighter With Every Diamond</h2>
        <div class="product-grid">
            <?php foreach ($products as $product): ?><article class="product">
                    <div class="product-image"><img class="product-primary" src="assets/<?= $product[0] ?>" alt="<?= htmlspecialchars($product[2]) ?>"><img class="product-hover" src="assets/<?= $product[1] ?>" alt=""></div>
                    <div class="product-details">
                        <h3><?= htmlspecialchars($product[2]) ?></h3>
                        <p><?= htmlspecialchars($product[3]) ?></p>
                    </div><a href="product.php">View Product</a>
                </article><?php endforeach; ?>
        </div>
        <a class="products-view-all" href="category.php?category=all">View All Products</a>
    </section>

    <section class="gold-dish">
        <div class="orbit"><img src="assets/web/gold-dish-model.webp" alt="Model wearing Carat Street earrings"><svg class="orbit-text" viewBox="0 0 700 700" aria-hidden="true">
                <defs>
                    <path id="gold-dish-text-path" d="M350,60a290,290 0 1,1 0,580a290,290 0 1,1 0,-580"></path>
                </defs><text textLength="620" lengthAdjust="spacing">
                    <textPath href="#gold-dish-text-path" startOffset="2%">Jewels as Unique as You</textPath>
                </text><text textLength="620" lengthAdjust="spacing">
                    <textPath href="#gold-dish-text-path" startOffset="52%">Jewels as Unique as You</textPath>
                </text>
            </svg></div>
        <div class="wordmark"><span>GOL</span><span>DISH</span></div>
    </section>

    <section class="deal">
        <div class="countdown" data-deadline="2026-12-31T23:59:59">
            <div><strong data-seconds>00</strong><span>Secs</span></div>
            <div><strong data-minutes>00</strong><span>Mins</span></div>
            <div><strong data-hours>00</strong><span>Hrs</span></div>
            <div><strong data-days>00</strong><span>Days</span></div>
        </div><img src="assets/web/countdown-statement-necklace.webp" alt="Statement necklace">
        <div>
            <p>Shop Now, Save Big</p>
            <h2>Hurry, Deals Ends Soon</h2>
        </div>
    </section>

    <section class="nature">
        <div class="cave-scene" id="cave-scene" aria-label="Carat Street forest jewellery reveal"><img class="cave-reveal" src="assets/web/cave-jewellery-reveal.webp" alt="Moss-covered hand presenting a gemstone ring in a forest cave"><img class="tree-left" src="assets/web/cave-left-tree.webp" alt=""><img class="tree-right" src="assets/web/cave-right-tree.webp" alt=""><img class="cave-closed" src="assets/web/cave-closed-layer.webp" alt=""><button class="cave-toggle" type="button" aria-expanded="false" aria-controls="cave-scene"><span>Tap To Reveal</span></button></div>
        <div class="nature-panel">
            <div class="video-card"><img src="assets/web/diamond-pendant-product.webp" alt="Diamond pendant"><button aria-label="Play story video">▶</button></div>
            <div>
                <p class="eyebrow">The Art of Adornment</p>
                <h2>A Symbol Of Love, Beauty, And Sophistication, Beautifully Showcased Around Your Neck</h2>
                <p class="nature-description">Inspired by nature's enduring forms, each pendant balances sculpted gold with a luminous centre stone. Meticulous setting and a graceful silhouette create a piece that feels intimate, distinctive and effortless to wear—an expression of beauty made personal.</p>
                <a class="button button-light" href="#story">Know More</a>
            </div>
        </div>
    </section>

    <section class="story-banner"><img src="assets/web/story-celebration-banner.webp" alt="Women celebrating with jewellery">
        <div>
            <p>Jewels as Unique as You</p>
            <h2>Jewels as Unique as You</h2><a class="button button-light" href="#story">Know More</a>
        </div>
    </section>

    <section class="consultation" id="contact">
        <div class="consultation-visual"><img src="assets/web/jewellery-styling-model.webp" alt="Indian woman wearing fine jewellery"><span>Personal Jewellery Styling</span></div>
        <div class="consultation-copy">
            <p class="eyebrow">Your Jewellery, Your Story</p>
            <h2>Find the Piece Made for Your Moment</h2>
            <p class="consultation-intro">From wedding celebrations and meaningful gifts to sizing and personal selections, our jewellery specialists are here to help you choose with confidence.</p>
            <div class="consultation-actions"><a class="button consultation-primary" href="contact.php">Book a Consultation</a><a class="consultation-link" href="#jewellery">Explore Jewellery <span aria-hidden="true">→</span></a></div>
            <div class="consultation-services" aria-label="Consultation services">
                <div><strong>01</strong><span>Personal Styling</span></div>
                <div><strong>02</strong><span>Occasion Guidance</span></div>
                <div><strong>03</strong><span>Sizing Support</span></div>
                <div><strong>04</strong><span>Dedicated Aftercare</span></div>
            </div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
