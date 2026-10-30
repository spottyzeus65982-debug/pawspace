<?php
/**
 * Kepala halaman bersama. Atur dulu variabel ini di halaman sebelum require:
 *   $pageTitle  string  judul tab browser
 *   $navLinks   array   [[label, href], ...] menu navbar (kosong = tanpa menu)
 *   $showCart   bool    tampilkan ikon keranjang + popup keranjang (default false)
 *   $layout     string  'site' (navbar di atas hero) atau 'checkout' (bar Check Out)
 */
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/data.php';

$pageTitle = $pageTitle ?? 'Paw Space';
$navLinks  = $navLinks ?? [];
$showCart  = $showCart ?? false;
$layout    = $layout ?? 'site';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($pageTitle) ?> | Paw Space</title>
  <?php foreach (['base', 'layout', 'pages', 'photos'] as $css): ?>
  <link rel="stylesheet" href="<?= url('css/' . $css . '.css') ?>">
  <?php endforeach; ?>
</head>
<body>
<?php if ($layout === 'checkout'): ?>
  <div class="checkout-top">PAW SPACE 🐾 <small>Check Out</small></div>
<?php else: ?>
  <header class="nav">
    <a class="logo" href="<?= url('index.php') ?>">PAW SPACE 🐾</a>
    <nav>
      <?php foreach ($navLinks as [$label, $href]): ?>
      <a href="<?= e($href) ?>"><?= e($label) ?></a>
      <?php endforeach; ?>
    </nav>
    <div class="user">
      <?php if ($showCart): ?><a class="cart-link" href="#cart" aria-label="Keranjang">🛒</a><?php endif; ?>
      <span class="avatar"></span>Username
    </div>
  </header>
<?php endif; ?>
