<?php
$pageTitle = 'Checkout Grooming';
$layout    = 'checkout';
require __DIR__ . '/../includes/header.php';

// Data dari halaman Appointment (?package, ?date, ?time); jika kosong pakai nilai desain.
$package = $packages[(int) ($_GET['package'] ?? 0)] ?? $packages[0];
$date    = fmt_date($_GET['date'] ?? null, '10/03/2026');
$time    = $_GET['time'] ?? '01:00 PM';
$petType = $package['type'] === 'cat' ? 'Cat' : 'Dog';

$lines = [
    'Grooming Package:'    => $package['price'],
    'Care & Sanitize Fee:' => 20000,
    'Taxes:'               => 8000,
];
$total = array_sum($lines);
?>
<main class="checkout">
  <h1>Review your Items</h1>
  <p>Please carefully review the date of your booking to avoid moments of disappointment</p>

  <div class="checkout-layout">
    <form>
      <div class="field-row">
        <div><label>Appointment Date</label><input type="text" value="<?= e($date) ?>" readonly></div>
        <div><label>Appointment Time</label><input type="text" value="<?= e($time) ?>" readonly></div>
      </div>
      <div class="field-row">
        <div><label>Pet Type</label><select><option><?= e($petType) ?></option></select></div>
        <div><label>Grooming Package</label><select><option><?= e($package['name']) ?></option></select></div>
      </div>

      <h3>Additional Pampering &amp; Spa Add Ons</h3>
      <br>
      <?php foreach ($groomingAddons as $addon): ?>
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
