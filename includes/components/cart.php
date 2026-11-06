<?php
/** "My Cart" popup (opened through #cart). Data comes from $cartItems in core/data.php. */
?>
<aside id="cart" class="cart">
  <div class="cart-panel">
    <header>My Cart <small>| <?= count($cartItems) ?> items</small></header>
    <?php foreach ($cartItems as $item): ?>
    <div class="cart-item">
      <img src="<?= url('images/' . $item['image']) ?>" alt="<?= escape_html($item['name']) ?>">
      <div>
        <span class="tag"><?= escape_html($item['category']) ?></span>
        <p><?= escape_html($item['name']) ?></p>
      </div>
      <div>
        <strong><?= format_rupiah($item['price']) ?></strong>
        <p><span class="qty">+ <?= (int) $item['quantity'] ?> −</span> 🗑</p>
      </div>
    </div>
    <?php endforeach; ?>
    <footer>
      <a class="btn btn-green" href="<?= url('pages/products/checkout-products.php') ?>">Checkout</a>
      <a class="btn btn-brown" href="#">Close</a>
    </footer>
  </div>
</aside>
