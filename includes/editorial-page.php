<?php
require __DIR__ . '/editorial-data.php';

if (!isset($editorialKey, $editorialPages[$editorialKey])) {
    http_response_code(404);
    exit('Editorial page not found.');
}

$page = $editorialPages[$editorialKey];
$pageTitle = $page['title'] . ' — Carat Street';
$pageDescription = $page['intro'];
$pageStylesAfterResponsive = ['css/editorial.css'];
$bodyClass = 'editorial-page editorial-' . $page['type'] . ' editorial-' . $editorialKey;

$relatedMap = [
    'house' => [['Our Philosophy', 'philosophy.php'], ['Craftsmanship', 'craftsmanship.php'], ['Signature Collection', 'signature-collection.php']],
    'philosophy' => [['The House', 'house-of-carat-street.php'], ['Everyday Luxury', 'everyday-luxury.php'], ['Craftsmanship', 'craftsmanship.php']],
    'craftsmanship' => [['Our Philosophy', 'philosophy.php'], ['Certification', 'certification.php'], ['Jewellery Care', 'jewellery-care.php']],
    'diamond-guide' => [['Certification', 'certification.php'], ['Jewellery Care', 'jewellery-care.php'], ['Explore Jewellery', 'category.php']],
    'gold-guide' => [['Gold Purity', 'gold-purity.php'], ['Hallmark Information', 'hallmark-information.php'], ['Jewellery Care', 'jewellery-care.php']],
    'everyday-luxury' => [['Signature Collection', 'signature-collection.php'], ['Our Philosophy', 'philosophy.php'], ['Explore Pendants', 'category.php?category=pendants']],
    'signature-collection' => [['Everyday Luxury', 'everyday-luxury.php'], ['Craftsmanship', 'craftsmanship.php'], ['Explore Earrings', 'category.php?category=earrings']],
    'gold-purity' => [['The Gold Guide', 'gold-guide.php'], ['Hallmark Information', 'hallmark-information.php'], ['Certification', 'certification.php']],
    'hallmark-information' => [['Gold Purity', 'gold-purity.php'], ['The Gold Guide', 'gold-guide.php'], ['Certification', 'certification.php']],
    'jewellery-care' => [['Craftsmanship', 'craftsmanship.php'], ['Gold Guide', 'gold-guide.php'], ['Contact Client Care', 'contact.php']],
    'certification' => [['Diamond Guide', 'diamond-guide.php'], ['Hallmark Information', 'hallmark-information.php'], ['Gold Purity', 'gold-purity.php']],
];

require __DIR__ . '/header.php';
?>
<main class="editorial-main">
    <section class="editorial-hero">
        <img src="<?= htmlspecialchars($page['hero']) ?>" alt="" style="object-position:<?= htmlspecialchars($page['hero_position']) ?>">
        <div class="editorial-hero-shade"></div>
        <div class="editorial-hero-copy">
            <p><?= htmlspecialchars($page['eyebrow']) ?></p>
            <h1><?= htmlspecialchars($page['title']) ?></h1>
            <span><?= htmlspecialchars($page['intro']) ?></span>
        </div>
        <a class="editorial-scroll" href="#introduction" aria-label="Continue to page content"><span></span>Discover</a>
    </section>

    <section class="editorial-statement" id="introduction">
        <p class="editorial-label"><?= htmlspecialchars($page['statement_label']) ?></p>
        <div>
            <h2><?= htmlspecialchars($page['statement_title']) ?></h2>
            <div class="editorial-prose">
                <?php foreach ($page['statement_copy'] as $paragraph): ?><p><?= htmlspecialchars($paragraph) ?></p><?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="editorial-feature">
        <div class="editorial-feature-visual"><img loading="lazy" decoding="async" src="<?= htmlspecialchars($page['feature_image']) ?>" alt=""></div>
        <div class="editorial-feature-copy">
            <p class="editorial-label"><?= htmlspecialchars($page['feature_label']) ?></p>
            <h2><?= htmlspecialchars($page['feature_title']) ?></h2>
            <p><?= htmlspecialchars($page['feature_copy']) ?></p>
        </div>
    </section>

    <section class="editorial-chapters">
        <div class="editorial-section-heading"><p class="editorial-label">Explore The Details</p><h2><?= htmlspecialchars($page['chapters_title']) ?></h2></div>
        <div class="editorial-chapter-grid">
            <?php foreach ($page['chapters'] as $chapter): ?>
                <article><span><?= htmlspecialchars($chapter[0]) ?></span><h3><?= htmlspecialchars($chapter[1]) ?></h3><p><?= htmlspecialchars($chapter[2]) ?></p></article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="editorial-quote"><p><?= htmlspecialchars($page['quote']) ?></p></section>

    <section class="editorial-notes">
        <div class="editorial-section-heading"><p class="editorial-label">A Considered Approach</p><h2><?= htmlspecialchars($page['notes_title']) ?></h2></div>
        <div class="editorial-note-list">
            <?php foreach ($page['notes'] as $index => $note): ?>
                <article><span><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></span><h3><?= htmlspecialchars($note[0]) ?></h3><p><?= htmlspecialchars($note[1]) ?></p></article>
            <?php endforeach; ?>
        </div>
        <?php if (!empty($page['source_url'])): ?><p class="editorial-source">Reference: <a href="<?= htmlspecialchars($page['source_url']) ?>" target="_blank" rel="noopener noreferrer"><?= htmlspecialchars($page['source_label']) ?></a></p><?php endif; ?>
    </section>

    <section class="editorial-related">
        <p class="editorial-label">Continue Exploring</p>
        <div>
            <?php foreach ($relatedMap[$editorialKey] as $related): ?><a href="<?= htmlspecialchars($related[1]) ?>"><span><?= htmlspecialchars($related[0]) ?></span><b aria-hidden="true">↗</b></a><?php endforeach; ?>
        </div>
    </section>

    <section class="editorial-cta">
        <div><p class="editorial-label">Carat Street</p><h2><?= htmlspecialchars($page['cta_title']) ?></h2><span><?= htmlspecialchars($page['cta_copy']) ?></span></div>
        <a href="<?= htmlspecialchars($page['cta_href']) ?>"><?= htmlspecialchars($page['cta_label']) ?><b aria-hidden="true">→</b></a>
    </section>
</main>
<?php require __DIR__ . '/footer.php'; ?>
