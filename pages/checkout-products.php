<?php
$pageTitle = 'Checkout Products';
$layout    = 'checkout';
require __DIR__ . '/../includes/header.php';

$total = 0;
foreach ($cartItems as $item) {
    $total += $item['price'] * $item['qty'];
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
      <img src="<?= url('images/' . $item['img']) ?>" alt="<?= e($item['name']) ?>">
      <div>
        <span class="tag"><?= e($item['category']) ?></span>
        <p><strong><?= e($item['name']) ?></strong></p>
      </div>
      <div>
        <strong><?= rupiah($item['price']) ?></strong>
        <p><span class="qty">+ <?= (int) $item['qty'] ?> −</span> 🗑</p>
      </div>
    </div>
    <?php endforeach; ?>
  </section>

  <section style="margin-top:2rem">
    <h2 style="text-align:left">Payment</h2>
    <?php foreach ($cartItems as $item): ?>
    <div class="line"><span><?= e($item['name']) ?></span><span>x<?= (int) $item['qty'] ?> &nbsp; <?= rupiah($item['price'] * $item['qty']) ?></span></div>
    <?php endforeach; ?>
    <div class="total"><span>Total:</span><strong><?= rupiah($total) ?></strong></div>
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
<?php require __DIR__ . '/../includes/footer.php'; ?>
