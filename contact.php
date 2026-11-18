<?php
$pageTitle = 'Contact Us — Carat Street';
$pageDescription = 'Contact the Carat Street team for product, availability, purchase and jewellery care enquiries.';
$pageStyles = ['css/storefront.css'];
$bodyClass = 'storefront-page contact-page';
require __DIR__ . '/includes/header.php';
?>
<main>
    <section class="contact-hero"><div><p>We’re Here For You</p><h1>Contact Us</h1><span>Whether you're selecting a meaningful gift or choosing a piece to make your own, we're here to help you find something truly special.</span></div><picture class="contact-hero-media"><source media="(max-width:600px)" srcset="assets/web/carat-banner-earrings-mobile.jpg"><img src="assets/web/carat-banner-earrings.jpg" alt="Carat Street jewellery specialist wearing diamond earrings"></picture></section>
    <?php /* The assistance and form section is retained for possible future use but is intentionally not rendered. */ if (false): ?>
    <section class="contact-main">
        <div class="contact-details"><p class="contact-label">Personal Assistance</p><h2>Let’s Find Something<br>Beautiful Together</h2><p>Tell us what you are looking for and a member of our team will respond personally.</p><dl><div><dt>Email</dt><dd><a href="mailto:care@caratstreet.com">care@caratstreet.com</a></dd></div><div><dt>Telephone</dt><dd><a href="tel:+911234567890">+91 12345 67890</a></dd></div><div><dt>Client Services</dt><dd>Monday–Saturday<br>10:00 AM–7:00 PM IST</dd></div></dl></div>
        <div class="contact-form-wrap">
            <form class="contact-form" action="contact.php" method="post"><div class="field-row"><label>First Name<input name="first_name" autocomplete="given-name" required></label><label>Last Name<input name="last_name" autocomplete="family-name" required></label></div><label>Email Address<input type="email" name="email" autocomplete="email" required></label><label>Telephone <small>Optional</small><input type="tel" name="phone" autocomplete="tel"></label><label>How Can We Help?<select name="interest"><option>Product enquiry</option><option>Availability and purchase</option><option>Jewellery care</option><option>General enquiry</option></select></label><label>Your Message<textarea name="message" rows="5" required></textarea></label><label class="contact-consent"><input type="checkbox" required><span>I agree that Carat Street may contact me regarding this enquiry.</span></label><button type="submit">Send Enquiry</button></form>
        </div>
    </section>
    <?php endif; ?>
    <section class="contact-discovery"><p>Continue Your Journey</p><h2>Discover Fine Jewellery Made For Every Story</h2><a href="category.php">Explore The Collection</a></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
