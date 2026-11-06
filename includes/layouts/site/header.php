<?php
/**
 * Shared site header. Set these variables in the page before requiring this file:
 *   $pageTitle  string  browser tab title
 *   $navLinks   array   [[label, href], ...] navbar menu (empty = no menu)
 *   $showCart   bool    show the cart icon and cart popup (default false)
 *   $layout     string  'site' (navbar over the hero) or 'checkout' (Check Out bar)
 *
 * This file opens <html>, <body> and (for the 'site' layout) <main>.
 * They are closed by layouts/site/footer.php.
 */
require_once __DIR__ . '/../../core/bootstrap.php';

$pageTitle = $pageTitle ?? 'Paw Space';
$navLinks  = $navLinks ?? [];
$showCart  = $showCart ?? false;
$layout    = $layout ?? 'site';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= escape_html($pageTitle) ?> | Paw Space</title>
  <?php foreach (['base', 'layout', 'pages', 'photos'] as $stylesheet): ?>
  <link rel="stylesheet" href="<?= url('css/' . $stylesheet . '.css') ?>">
  <?php endforeach; ?>
</head>
<body>
<?php if ($layout === 'checkout'): ?>
  <header class="checkout-top">
    <a href="<?= url('index.php') ?>">PAW SPACE 🐾</a> <small>Check Out</small>
  </header>
<?php else: ?>
  <header class="nav">
    <a class="logo" href="<?= url('index.php') ?>">PAW SPACE 🐾</a>
    <?php if (!empty($navLinks)): ?>
    <nav aria-label="Main menu">
      <?php foreach ($navLinks as [$label, $href]): ?>
      <a href="<?= escape_html($href) ?>"><?= escape_html($label) ?></a>
      <?php endforeach; ?>
    </nav>
    <?php endif; ?>
    <div class="user">
      <?php if ($showCart): ?><a class="cart-link" href="#cart" aria-label="Cart">🛒</a><?php endif; ?>
      <span class="avatar"></span>
      <span class="username">Username</span>
    </div>
  </header>
  <main>
<?php endif; ?>
