<?php /** Popup "My Cart" (dibuka lewat #cart). Data dari $cartItems di data.php. */ ?>
<aside id="cart" class="cart">
  <div class="cart-panel">
    <header>My Cart <small>| <?= count($cartItems) ?> items</small></header>
    <?php foreach ($cartItems as $item): ?>
    <div class="cart-item">
      <img src="<?= url('images/' . $item['img']) ?>" alt="<?= e($item['name']) ?>">
      <div>
        <span class="tag"><?= e($item['category']) ?></span>
        <p><?= e($item['name']) ?></p>
      </div>
      <div>
        <strong><?= rupiah($item['price']) ?></strong>
        <p><span class="qty">+ <?= (int) $item['qty'] ?> −</span> 🗑</p>
      </div>
    </div>
    <?php endforeach; ?>
    <footer>
      <a class="btn btn-green" href="<?= url('pages/checkout-products.php') ?>">Checkout</a>
      <a class="btn btn-brown" href="#">Close</a>
    </footer>
  </div>
</aside>
