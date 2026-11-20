<?php
require __DIR__ . '/includes/catalog.php';
$featuredProductSlugs = ['faye', 'layla', 'maya', 'nora'];
$productsBySlug = [];
foreach ($catalogProducts as $catalogProduct) {
    $productsBySlug[$catalogProduct['slug']] = $catalogProduct;
}
$products = [];
foreach ($featuredProductSlugs as $slug) {
    if (isset($productsBySlug[$slug])) $products[] = $productsBySlug[$slug];
}
foreach ($catalogProducts as $catalogProduct) {
    if (!in_array($catalogProduct['slug'], $featuredProductSlugs, true)) $products[] = $catalogProduct;
}
$pageTitle = 'Carat Street | Fine Jewellery';
$pageDescription = "Timeless jewellery for life's most meaningful moments.";
$bodyClass = 'home-page';
$pageStylesAfterResponsive = ['css/home.css'];
?>
<?php require __DIR__ . '/includes/header.php'; ?>

<main id="home">
    <section class="hero">
        <div class="hero-slides" aria-label="Featured jewellery collections">
            <picture class="hero-slide hero-slide-product active">
                <source media="(max-width:600px)" srcset="assets/web/carat-banner-pendant-mobile.jpg"><img src="assets/web/carat-banner-pendant.jpg" alt="Model wearing a Carat Street diamond pendant" fetchpriority="high">
            </picture>
            <picture class="hero-slide hero-slide-product">
                <source media="(max-width:600px)" srcset="assets/web/carat-banner-editorial-mobile.jpg"><img src="assets/web/carat-banner-editorial.jpg" alt="Model wearing a Carat Street diamond pendant">
            </picture>
            <picture class="hero-slide hero-slide-product">
                <source media="(max-width:600px)" srcset="assets/web/revised-home-hero-mobile.jpg"><img src="assets/web/revised-home-hero.jpg" alt="Model wearing a Carat Street diamond pendant">
            </picture>
        </div>
        <div class="hero-controls" aria-label="Hero banner controls">
            <button type="button" data-hero-previous aria-label="Previous banner">←</button>
            <button type="button" data-hero-next aria-label="Next banner">→</button>
        </div>
    </section>

    <section class="occasion section-pad" id="story">
        <div class="occasion-kicker" aria-hidden="true"><span></span>
            <p>Everyday Brilliance</p><span></span>
        </div>
        <div class="occasion-visual">
            <img src="assets/web/birthstone-occasion-model.jpg" alt="Woman wearing a Carat Street diamond pendant">
            <span class="occasion-title">Celebrate Your<br>Individuality Through<br>Timeless Jewellery</span>
        </div>
        <div class="occasion-copy">
            <p class="eyebrow">Born to Shine, Crafted to Last</p>
            <h2>Jewellery That Reflects Your Style,<br>A Story in Every Detail</h2>
            <p>Every piece of jewellery carries its own character and charm. Thoughtfully designed with refined silhouettes and attention to detail, our creations celebrate individuality, personal expression and timeless elegance, with pieces chosen for today and treasured for years to come.</p>
            <a class="text-link" href="category.php?category=all">Shop Now <span aria-hidden="true">→</span></a>
            <div class="occasion-inset"><img src="assets/web/models/nora-model.jpg" alt="Carat Street Nora pendant worn with fine jewellery"></div>
        </div>
        <div class="occasion-signature" aria-hidden="true"><span></span><svg viewBox="0 0 32 28">
                <path d="M7 3h18l4 7-13 15L3 10l4-7Zm-4 7h26M7 3l5 7 4-7 4 7 5-7M12 10l4 15 4-15" />
            </svg>
            <p>Where Heritage Meets Tomorrow.</p><span></span>
        </div>
    </section>

    <section class="collections" id="collections">
        <?php /* Shared collection backgrounds are retained for reference but disabled. Each image now stays inside its own card.
        <div class="collections-backgrounds" aria-hidden="true">
            <img class="collections-background collections-background-default is-active" data-collection-bg="default" src="assets/web/collections-overview.jpg" alt="">
            <img class="collections-background" data-collection-bg="earrings" src="assets/web/collection-earrings.jpg" alt="">
            <img class="collections-background" data-collection-bg="pendant" src="assets/web/collection-pendants.jpg" alt="">
        </div>
        */ ?>
        <div class="collection-carousel-viewport" data-collection-viewport tabindex="0" aria-label="Jewellery collections carousel">
            <div class="collection-carousel-track">
                <article class="collection-card earrings" data-collection-background="earrings">
                    <img src="assets/web/revised-collection-earrings.jpg" alt="Model wearing Carat Street earrings">
                    <div>
                        <h3>Earrings</h3>
                        <p>From refined studs to expressive drops, discover earrings<br>shaped to frame the face with light, movement<br>and effortless elegance</p><a href="category.php?category=earrings">Know More</a>
                    </div>
                </article>
                <article class="collection-card pendant" data-collection-background="pendant">
                    <img src="assets/web/revised-collection-pendants.jpg" alt="Model wearing a Carat Street pendant">
                    <div>
                        <h3>Pendants</h3>
                        <p>Meaningful symbols, luminous stones and graceful forms<br>come together in pendants designed to rest close<br>to the heart and be treasured</p><a href="category.php?category=pendants">Know More</a>
                    </div>
                </article>
                <?php /* Rings and bracelets are retained here for a future collection launch.
                <article class="collection-card rings" data-collection-background="earrings">
                    <div>
                        <h3>Rings</h3>
                        <p>From delicate diamond bands to bold modern silhouettes,<br>discover rings crafted to celebrate promises, milestones<br>and the beauty of everyday moments</p><a href="category.php?category=rings">Know More</a>
                    </div>
                </article>
                <article class="collection-card bracelet" data-collection-background="pendant">
                    <div>
                        <h3>Bracelets</h3>
                        <p>Polished links, delicate details and brilliant stones create<br>bracelets that move beautifully with you from day<br>to evening, finished by hand</p><a href="category.php?category=bracelets">Know More</a>
                    </div>
                </article>
                */ ?>
            </div>
        </div>
        <div class="collection-carousel-controls" aria-label="Collection carousel controls">
            <button type="button" data-collection-prev aria-label="Previous collection">←</button>
            <p><span data-collection-current>01</span><i></i><span>02</span></p>
            <button type="button" data-collection-next aria-label="Next collection">→</button>
        </div>
    </section>

    <section class="products section-pad" id="jewellery">
        <p class="eyebrow center">New Arrivals</p>
        <h2 class="center">Discover Jewellery That Reflects Your Style.</h2>
        <div class="home-product-carousel" data-home-product-carousel>
            <div class="home-product-slider-controls">
                <button type="button" data-home-product-prev aria-label="Show previous products" disabled><span aria-hidden="true">←</span></button>
                <p aria-live="polite"><b data-home-product-current>01</b><i></i><span><?= str_pad((string) count($products), 2, '0', STR_PAD_LEFT) ?></span></p>
                <button type="button" data-home-product-next aria-label="Show next products"><span aria-hidden="true">→</span></button>
            </div>
            <div class="home-product-viewport" data-home-product-viewport tabindex="0" aria-label="Freshly arrived jewellery products">
                <div class="home-product-grid">
                    <?php foreach ($products as $product):
                        $productUrl = catalog_product_url($product);
                    ?><article class="home-product-card">
                            <a class="home-product-image" href="<?= htmlspecialchars($productUrl) ?>" aria-label="View <?= htmlspecialchars($product['name']) ?>">
                                <img loading="lazy" decoding="async" src="assets/<?= htmlspecialchars($product['home_image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                            </a>
                            <div class="home-product-content">
                                <p class="home-product-category"><?= htmlspecialchars($product['category']) ?></p>
                                <h3><a href="<?= htmlspecialchars($productUrl) ?>"><?= htmlspecialchars($product['name']) ?></a></h3>
                                <p class="home-product-price"><?= htmlspecialchars($product['price']) ?></p>
                                <div class="home-product-actions">
                                    <a class="home-product-primary-action" href="<?= htmlspecialchars($productUrl) ?>">View Details <span aria-hidden="true">→</span></a>
                                    <a class="home-product-quick-view" href="<?= htmlspecialchars($productUrl) ?>" aria-label="View <?= htmlspecialchars($product['name']) ?> details"><svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M2.2 12s3.6-6 9.8-6 9.8 6 9.8 6-3.6 6-9.8 6-9.8-6-9.8-6Z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg></a>
                                </div>
                            </div>
                        </article><?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="home-product-signature" aria-hidden="true"><span></span><svg viewBox="0 0 32 28">
                <path d="M7 3h18l4 7-13 15L3 10l4-7Zm-4 7h26M7 3l5 7 4-7 4 7 5-7M12 10l4 15 4-15" />
            </svg>
            <p>Where Heritage Meets Tomorrow.</p><span></span>
        </div>
        <a class="products-view-all" href="category.php?category=all">View All Products</a>
    </section>

    <section class="gold-dish" id="gold-dish">
        <div class="orbit"><img src="assets/web/gold-dish-stella-portrait.jpg" alt="Model wearing Carat Street Stella earrings"><svg class="orbit-text" viewBox="0 0 700 700" aria-hidden="true">
                <defs>
                    <path id="gold-dish-text-path" d="M350,60a290,290 0 1,1 0,580a290,290 0 1,1 0,-580"></path>
                </defs><text textLength="620" lengthAdjust="spacing">
                    <textPath href="#gold-dish-text-path" startOffset="2%">Jewels as Unique as You</textPath>
                </text><text textLength="620" lengthAdjust="spacing">
                    <textPath href="#gold-dish-text-path" startOffset="52%">Jewels as Unique as You</textPath>
                </text>
            </svg></div>
        <div class="wordmark gold-dish-headline">Elegance in Every Detail</div>
    </section>

    <section class="nature" id="adornment">
        <div class="nature-panel">
            <div class="video-card"><img src="assets/web/art-of-adornment-shoot.jpg" alt="Carat Street diamond pendant from the final jewellery shoot"><button type="button" data-story-video="9Pazl1r8a5Q" aria-label="Play Carat Street jewellery video">▶</button></div>
            <div>
                <p class="eyebrow">The Art of Adornment</p>
                <h2>A Touch of Elegance, A Reflection of Your Style.</h2>
                <p class="nature-description">Thoughtfully designed to bring together refined detailing and timeless appeal, each pendant is an expression of understated elegance. With graceful silhouettes and carefully considered finishes, our designs add a distinctive touch to your style, making every piece a personal expression of beauty.</p>
                <a class="button button-light" href="category.php?category=pendants">Know More</a>
            </div>
        </div>
        <?php /* The client requested that this complete ring-focused section remain in source but not render.
        <div class="cave-scene" id="cave-scene" aria-label="Carat Street forest jewellery reveal">
            <div class="cave-stage"><img class="cave-reveal" src="assets/open-cave.png" alt="Enchanted green forest within a rocky cave"><img class="cave-hand" src="assets/only-hand.png" alt="Moss-covered hand presenting a gemstone ring">
                <div class="cave-wordmark" aria-hidden="true"><span>Carat</span><span>Street</span></div><img class="cave-foliage cave-foliage-one" src="assets/web/cave-left-tree.webp" alt="" aria-hidden="true"><img class="cave-foliage cave-foliage-two" src="assets/web/cave-right-tree.webp" alt="" aria-hidden="true">
            </div><button class="cave-toggle" type="button" aria-expanded="false" aria-controls="cave-scene"><span>Tap To Reveal</span></button>
        </div>
        */ ?>
    </section>

    <section class="collection-showcase" id="collection-story">
        <div class="collection-showcase-visual"><img src="assets/web/jewellery-styling-model.jpg" alt="Indian woman wearing fine jewellery"><span>Jewellery For Every Moment</span></div>
        <div class="collection-showcase-copy">
            <p class="eyebrow">Jewellery That Tells Your Story</p>
            <h2>Made for Moments That Matter.</h2>
            <p class="collection-showcase-intro">From everyday expressions of elegance to life's most meaningful celebrations, discover jewellery that brings together thoughtful design, refined craftsmanship and timeless appeal. Each piece is created to complement your style and become part of your story.</p>
            <div class="collection-showcase-actions"><a class="button collection-showcase-primary" href="category.php">Explore The Collection</a><a class="collection-showcase-link" href="category.php?category=pendants">View Pendants <span aria-hidden="true">→</span></a></div>
            <div class="collection-showcase-services" aria-label="Collection highlights">
                <div><strong>01</strong><span>Everyday Elegance</span></div>
                <div><strong>02</strong><span>Meaningful Moments</span></div>
                <div><strong>03</strong><span>Quality &amp; Certification</span></div>
                <div><strong>04</strong><span>Thoughtful Craftsmanship</span></div>
            </div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
