<?php
$pageScripts = $pageScripts ?? [];
$footerId = $footerId ?? 'site-footer';
$mainScriptVersion = @filemtime(__DIR__ . '/../js/main.js') ?: 1;
?>
    <footer id="<?= htmlspecialchars($footerId) ?>">
        <div class="footer-grid">
            <div><img class="footer-logo" src="assets/web/carat-street-brand-logo.png" alt="Carat Street">
                <p>Fine jewellery made thoughtfully for life's most meaningful moments.</p><a class="footer-cta" href="contact.php">Book a private consultation <span aria-hidden="true">→</span></a>
                <nav class="footer-social" aria-label="Carat Street social media">
                    <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"></rect><circle cx="12" cy="12" r="4.25"></circle><circle class="social-dot" cx="17.4" cy="6.7" r="1"></circle></svg></a>
                    <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14.2 21v-8h2.7l.4-3h-3.1V8.1c0-.9.3-1.6 1.6-1.6h1.7V3.8c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2H8v3h2.8v8h3.4Z"></path></svg></a>
                    <a href="https://www.pinterest.com/" target="_blank" rel="noopener noreferrer" aria-label="Pinterest"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3.2a8.8 8.8 0 0 0-3.2 17c-.1-1.5 0-3.2.4-4.6l1.1-4.5s-.3-.7-.3-1.7c0-1.6.9-2.8 2.1-2.8 1 0 1.5.7 1.5 1.6 0 1-.6 2.5-1 3.9-.5 1.2.6 2.2 1.8 2.2 2.2 0 3.7-2.8 3.7-6.1 0-2.5-2-4.4-5.1-4.4-3.7 0-6 2.8-6 5.9 0 1.1.3 2.2.9 2.8.2.2.2.3.1.6l-.3 1.1c-.1.4-.5.5-.8.4-2.1-.9-3-3.4-3-6.1 0-4.5 3.8-9.9 11.4-9.9 6.1 0 10.1 4.4 10.1 9.2 0 6.3-3.5 11-8.7 11-1.7 0-3.3-.9-3.9-2l-1.1 4.2c-.4 1.4-1.1 2.8-1.8 3.8.7.2 1.4.3 2.1.3A8.8 8.8 0 0 0 12 3.2Z" transform="scale(.8) translate(3 1)"></path></svg></a>
                    <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 8.1a3 3 0 0 0-2.1-2.2C17.1 5.4 12 5.4 12 5.4s-5.1 0-6.9.5A3 3 0 0 0 3 8.1a31 31 0 0 0 0 7.8 3 3 0 0 0 2.1 2.2c1.8.5 6.9.5 6.9.5s5.1 0 6.9-.5a3 3 0 0 0 2.1-2.2 31 31 0 0 0 0-7.8ZM10 15.3V8.7l5.3 3.3-5.3 3.3Z"></path></svg></a>
                </nav>
            </div>
            <div><h3>Discover</h3><a href="house-of-carat-street.php">The House</a><a href="philosophy.php">Our Philosophy</a><a href="craftsmanship.php">Craftsmanship</a><a href="category.php">Collections</a></div>
            <div><h3>Collections</h3><a href="category.php?category=pendants">Pendants</a><a href="category.php?category=earrings">Earrings</a><a href="everyday-luxury.php">Everyday Luxury</a><a href="signature-collection.php">Signature Collection</a></div>
            <div><h3>Guides</h3><a href="diamond-guide.php">Diamond Guide</a><a href="gold-guide.php">Gold Guide</a><a href="jewellery-care.php">Jewellery Care</a><a href="certification.php">Certification</a></div>
        </div>
        <div class="copyright"><span>© <?= date('Y') ?> Carat Street. All rights reserved.</span><span>Jewellery for every story, crafted with intention.</span></div>
    </footer>
    <script src="js/main.js?v=<?= $mainScriptVersion ?>"></script>
    <?php foreach ($pageScripts as $script): ?><script src="<?= htmlspecialchars($script) ?>?v=<?= @filemtime(__DIR__ . '/../' . $script) ?: 1 ?>"></script>
    <?php endforeach; ?>
</body>
</html>
