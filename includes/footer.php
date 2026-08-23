<?php
$pageScripts = $pageScripts ?? [];
$footerId = $footerId ?? 'site-footer';
$mainScriptVersion = @filemtime(__DIR__ . '/../js/main.js') ?: 1;
?>
    <footer id="<?= htmlspecialchars($footerId) ?>">
        <div class="footer-grid">
            <div><img class="footer-logo" src="assets/web/carat-street-footer-logo.webp" alt="Carat Street">
                <p>Fine jewellery made thoughtfully for life's most meaningful moments.</p><a class="footer-cta" href="contact.php">Book a private consultation <span aria-hidden="true">→</span></a>
            </div>
            <div><h3>Discover</h3><a href="index.php#story">Our Story</a><a href="category.php">Collections</a><a href="index.php#jewellery">Fresh Arrivals</a><a href="category.php">Fine Jewellery</a></div>
            <div><h3>Client Care</h3><a href="contact.php">Private Consultation</a><a href="#">Sizing Guide</a><a href="#">Jewellery Care</a><a href="#">Shipping &amp; Returns</a></div>
            <div><h3>Information</h3><a href="contact.php">Contact Us</a><a href="#">Frequently Asked Questions</a><a href="#">Privacy Policy</a><a href="#">Terms &amp; Conditions</a></div>
        </div>
        <div class="copyright"><span>© <?= date('Y') ?> Carat Street. All rights reserved.</span><span>Jewellery for every story, crafted with intention.</span></div>
    </footer>
    <script src="js/main.js?v=<?= $mainScriptVersion ?>"></script>
    <?php foreach ($pageScripts as $script): ?><script src="<?= htmlspecialchars($script) ?>"></script>
    <?php endforeach; ?>
</body>
</html>
