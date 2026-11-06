<?php
require_once __DIR__ . '/../../includes/core/bootstrap.php';
$pageTitle = 'Checkout Hotel';
$layout    = 'checkout';
require PROJECT_ROOT . '/includes/layouts/site/header.php';

// Dates from the form on the Paw Hotel page (?check_in, ?check_out); falls back to the design values when empty.
$checkIn  = format_date($_GET['check_in'] ?? null, '10/20/2026');
$checkOut = format_date($_GET['check_out'] ?? null, '10/24/2026');

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
        <div><label>Check in date</label><input type="text" value="<?= escape_html($checkIn) ?>" readonly></div>
        <div><label>Check out date</label><input type="text" value="<?= escape_html($checkOut) ?>" readonly></div>
      </div>
      <div class="field-row">
        <div><label>Pet Type</label><select><option>Dog</option><option>Cat</option></select></div>
        <div><label>Room</label><select><option>Exclusive room</option></select></div>
      </div>

      <h3>Additional Pampering &amp; Spa Add Ons</h3>
      <br>
      <?php foreach ($hotelAddons as $addon): ?>
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
