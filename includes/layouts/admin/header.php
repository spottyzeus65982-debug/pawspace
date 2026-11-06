<?php
/**
 * Admin layout header. Set these variables before requiring this file:
 *   $pageTitle    string  browser tab title
 *   $adminActive  string  'hotel' | 'grooming' | 'products'
 *
 * This file opens <html>, <body> and <main>.
 * They are closed by layouts/admin/footer.php.
 */
require_once __DIR__ . '/../../core/bootstrap.php';

$pageTitle   = $pageTitle ?? 'Admin';
$adminActive = $adminActive ?? '';
$adminMenu = [
    'hotel'    => ['🏨 Hotel booking', 'admin/hotel-booking.php'],
    'grooming' => ['✂ Grooming',       'admin/grooming.php'],
    'products' => ['📦 Products',      'admin/products.php'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= escape_html($pageTitle) ?> | Paw Space</title>
  <link rel="stylesheet" href="<?= url('css/base.css') ?>">
  <link rel="stylesheet" href="<?= url('css/admin.css') ?>">
</head>
<body class="admin">
  <aside class="sidebar">
    <h1>PAW SPACE 🐾</h1>
    <p>Admin Center</p>
    <nav aria-label="Admin menu">
      <?php foreach ($adminMenu as $key => [$label, $path]): ?>
      <a class="<?= $key === $adminActive ? 'active' : '' ?>" href="<?= url($path) ?>"><?= escape_html($label) ?></a>
      <?php endforeach; ?>
    </nav>
  </aside>
  <main class="admin-main">
    <div class="admin-top">
      <input type="search" placeholder="Search" aria-label="Search">
      <span class="avatar"></span>
      <span class="username">Admin_name</span>
    </div>
