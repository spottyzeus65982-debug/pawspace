<?php
$pageTitle = 'Checkout Hotel';
$layout    = 'checkout';
require __DIR__ . '/../includes/header.php';

// Tanggal dari form di halaman Paw Hotel (?in, ?out); jika kosong pakai nilai desain.
$checkIn  = fmt_date($_GET['in'] ?? null, '10/20/2026');
$checkOut = fmt_date($_GET['out'] ?? null, '10/24/2026');

$lines = [
    'Accommodation Fee:' => 200000,
    'Service Fee:'       => 20000,
    'Taxes:'             => 8000,
];
$total = array_sum($lines);
?>
<main class="checkout">
  <h1>Review your Items</h1>
  <p>Please carefully review the date of your booking to avoid moments of disappointment</p>

  <div class="checkout-layout">
    <form>
      <div class="field-row">
        <div><label>Check in date</label><input type="text" value="<?= e($checkIn) ?>" readonly></div>
        <div><label>Check out date</label><input type="text" value="<?= e($checkOut) ?>" readonly></div>
      </div>
      <div class="field-row">
        <div><label>Pet Type</label><select><option>Dog</option><option>Cat</option></select></div>
        <div><label>Room</label><select><option>Exclusive room</option></select></div>
      </div>

      <h3>Additional Pampering &amp; Spa Add Ons</h3>
      <br>
      <?php foreach ($hotelAddons as $addon): ?>
      <div class="addon">
        <label><input type="checkbox"> <?= e($addon['name']) ?></label>
        <span><?= rupiah($addon['price']) ?></span>
      </div>
      <?php endforeach; ?>
    </form>

    <div>
      <aside class="summary">
        <h2>Payment</h2>
        <?php foreach ($lines as $label => $amount): ?>
        <div class="line"><span><?= e($label) ?></span><span><?= rupiah($amount) ?></span></div>
        <?php endforeach; ?>
        <div class="total"><span>Total:</span><strong><?= rupiah($total) ?></strong></div>
        <h3 style="margin-top:1.5rem">Payment Method:</h3>
        <select><option>Qris</option></select>
      </aside>
      <div class="checkout-actions">
        <a class="btn btn-green" href="#">Pay Now</a>
        <a class="btn btn-brown" href="<?= url('index.php') ?>">Continue Browsing</a>
      </div>
    </div>
  </div>
</main>
</body>
</html>
