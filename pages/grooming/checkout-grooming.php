<?php
require_once __DIR__ . '/../../includes/core/bootstrap.php';
$pageTitle = 'Checkout Grooming';
$layout    = 'checkout';
require PROJECT_ROOT . '/includes/layouts/site/header.php';

// Data from the Appointment page (?package, ?date, ?time); falls back to the design values when empty.
$package = $packages[(int) ($_GET['package'] ?? 0)] ?? $packages[0];
$date    = format_date($_GET['date'] ?? null, '10/03/2026');
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
        <div><label>Appointment Date</label><input type="text" value="<?= escape_html($date) ?>" readonly></div>
        <div><label>Appointment Time</label><input type="text" value="<?= escape_html($time) ?>" readonly></div>
      </div>
      <div class="field-row">
        <div><label>Pet Type</label><select><option><?= escape_html($petType) ?></option></select></div>
        <div><label>Grooming Package</label><select><option><?= escape_html($package['name']) ?></option></select></div>
      </div>

      <h3>Additional Pampering &amp; Spa Add Ons</h3>
      <br>
      <?php foreach ($groomingAddons as $addon): ?>
      <div class="addon">
        <label><input type="checkbox"> <?= escape_html($addon['name']) ?></label>
        <span><?= format_rupiah($addon['price']) ?></span>
      </div>
      <?php endforeach; ?>
    </form>

    <div>
      <aside class="summary">
        <h2>Payment</h2>
        <?php foreach ($lines as $label => $amount): ?>
        <div class="line"><span><?= escape_html($label) ?></span><span><?= format_rupiah($amount) ?></span></div>
        <?php endforeach; ?>
        <div class="total"><span>Total:</span><strong><?= format_rupiah($total) ?></strong></div>
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
<?php require PROJECT_ROOT . '/includes/layouts/site/footer.php'; ?>
