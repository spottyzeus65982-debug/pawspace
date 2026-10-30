<?php
/** Footer situs + popup keranjang (jika $showCart true). */
?>
<footer class="footer">
  <div class="inner">
    <div>
      <h4>PAW SPACE 🐾</h4>
      <p>Premier resort, boarding, and professional grooming designed with species-specific care for dogs and cats.</p>
    </div>
    <div>
      <h4>Quick links</h4>
      <a href="<?= url('pages/grooms.php') ?>">Paw Grooms</a>
      <a href="<?= url('pages/hotel.php') ?>">Paw Hotel</a>
      <a href="<?= url('index.php#products') ?>">Products</a>
      <a href="<?= url('index.php#about') ?>">About us</a>
      <a href="<?= url('index.php#reviews') ?>">Reviews</a>
    </div>
    <div>
      <h4>Resort hours</h4>
      <ul>
        <li>Mon - Fri: 7:00 AM - 7:00 PM</li>
        <li>Saturday: 8:00 AM - 6:00 PM</li>
        <li>Sunday: 9:00 AM - 5:00 PM</li>
      </ul>
      <p style="margin-top:12px">24/7 Care Staff On Duty Always</p>
    </div>
    <div>
      <h4>Contact &amp; location</h4>
      <p>104 Pawstone Meadow Way, Suite B<br>Phone: (555) 729-7729</p>
      <div class="social">
        <a href="#" aria-label="Instagram">IG</a>
        <a href="#" aria-label="Facebook">f</a>
      </div>
    </div>
  </div>
</footer>
<?php if (!empty($showCart)) { include __DIR__ . '/cart.php'; } ?>
</body>
</html>
