<?php
$pageTitle = $pageTitle ?? 'Carat Street — Fine Jewellery';
$pageDescription = $pageDescription ?? "Timeless jewellery for life's most meaningful moments.";
$pageStyles = $pageStyles ?? [];
$pageStylesAfterResponsive = $pageStylesAfterResponsive ?? [];
$bodyClass = $bodyClass ?? '';
$baseStyleVersion = @filemtime(__DIR__ . '/../css/style.css') ?: 1;
$responsiveStyleVersion = @filemtime(__DIR__ . '/../css/responsive.css') ?: 1;
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TH57NKVS');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?v=<?= $baseStyleVersion ?>">
    <?php foreach ($pageStyles as $stylesheet): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($stylesheet) ?>">
    <?php endforeach; ?>
    <link rel="stylesheet" href="css/responsive.css?v=<?= $responsiveStyleVersion ?>">
    <?php foreach ($pageStylesAfterResponsive as $stylesheet): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($stylesheet) ?>?v=<?= @filemtime(__DIR__ . '/../' . $stylesheet) ?: 1 ?>">
    <?php endforeach; ?>
    <link rel="stylesheet" href="css/header-sticky.css?v=<?= @filemtime(__DIR__ . '/../css/header-sticky.css') ?: 1 ?>">
</head>
<body<?= $bodyClass !== '' ? ' class="' . htmlspecialchars($bodyClass) . '"' : '' ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TH57NKVS" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="site-header">
        <button class="menu-toggle" aria-label="Open menu" aria-expanded="false"><span></span><span></span><span></span></button>
        <a class="brand" href="index.php"><img src="assets/web/carat-street-brand-logo.png" alt="Carat Street"></a>
        <nav class="nav" aria-label="Main navigation">
            <a href="house-of-carat-street.php">The House</a><a href="category.php">Collections</a><a href="diamond-guide.php">Guides</a><a href="contact.php">Contact</a>
        </nav>
        <div class="header-actions"><button class="header-search" type="button" aria-label="Search" data-open-search><img src="assets/search.svg" alt=""><span>Search</span></button></div>
    </header>
    <aside class="menu-panel" aria-hidden="true" aria-label="Site menu">
        <div class="menu-panel-inner">
            <p>Explore Carat Street</p>
            <nav><a href="category.php"><span>01</span>All Jewellery</a><a href="category.php?category=necklaces"><span>02</span>Necklaces</a><a href="category.php?category=rings"><span>03</span>Rings</a><a href="category.php?category=earrings"><span>04</span>Earrings</a><a href="category.php?category=pendants"><span>05</span>Pendants</a></nav>
            <div class="menu-secondary"><a href="house-of-carat-street.php">The House</a><a href="craftsmanship.php">Craftsmanship</a><a href="diamond-guide.php">Diamond Guide</a></div>
        </div>
        <div class="menu-panel-visual"><img src="assets/web/category-earrings-model.webp" alt="Carat Street jewellery editorial"><span>Jewels as unique as you</span></div>
    </aside>
