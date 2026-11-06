<?php
require_once __DIR__ . '/../../includes/core/bootstrap.php';
$pageTitle = 'Checkout Products';
$layout    = 'checkout';
require PROJECT_ROOT . '/includes/layouts/site/header.php';

$total = 0;
foreach ($cartItems as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>
<main class="checkout">
  <section class="card">
    <h3>Delivery Info Details</h3>
    <div style="background:#fff;padding:1rem;margin-top:.5rem">
      <p>📍 Address</p>
      <p>Jl.Blablabla, Sungaibangkong, Pontianak kota, KOTA PONTIANAK - PONTIANAK KOTA, KALIMANTAN BARAT, ID 781111</p>
      <p style="text-align:right"><a href="#" style="color:var(--brown)">change</a></p>
    </div>
  </section>

  <section class="card" style="margin-top:2rem">
    <h3>Order Summary</h3>
    <p>Paw Space Products</p>
    <?php foreach ($cartItems as $item): ?>
    <div class="order-item">
      <img src="<?= url('images/' . $item['image']) ?>" alt="<?= escape_html($item['name']) ?>">
      <div>
        <span class="tag"><?= escape_html($item['category']) ?></span>
        <p><strong><?= escape_html($item['name']) ?></strong></p>
      </div>
      <div>
        <strong><?= format_rupiah($item['price']) ?></strong>
        <p><span class="qty">+ <?= (int) $item['quantity'] ?> −</span> 🗑</p>
      </div>
    </div>
    <?php endforeach; ?>
  </section>

  <section style="margin-top:2rem">
    <h2 style="text-align:left">Payment</h2>
    <?php foreach ($cartItems as $item): ?>
    <div class="line"><span><?= escape_html($item['name']) ?></span><span>x<?= (int) $item['quantity'] ?> &nbsp; <?= format_rupiah($item['price'] * $item['quantity']) ?></span></div>
    <?php endforeach; ?>
    <div class="total"><span>Total:</span><strong><?= format_rupiah($total) ?></strong></div>
  </section>

  <section style="margin-top:2rem">
    <h3>Payment Method:</h3>
    <div class="grid cols-3" style="margin-top:.5rem;align-items:center">
      <div class="checkout"><select><option>Qris</option></select></div>
      <a class="btn btn-green" href="#">Pay Now</a>
      <a class="btn btn-brown" href="<?= url('index.php') ?>">Continue Browsing</a>
    </div>
  </section>
</main>
<?php require PROJECT_ROOT . '/includes/layouts/site/footer.php'; ?>
