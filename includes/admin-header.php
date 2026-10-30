<?php
/**
 * Layout admin. Atur sebelum require: $pageTitle dan $adminActive
 * ('hotel' | 'grooming' | 'products').
 */
require_once __DIR__ . '/functions.php';

$pageTitle   = $pageTitle ?? 'Admin';
$adminActive = $adminActive ?? '';
$adminMenu = [
    'hotel'    => ['🏨 Hotel booking', 'admin/hotel-booking.php'],
    'grooming' => ['✂ Grooming',       'admin/grooming.php'],
    'products' => ['📦 Products',      'admin/products.php'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($pageTitle) ?> | Paw Space</title>
  <link rel="stylesheet" href="<?= url('css/base.css') ?>">
  <link rel="stylesheet" href="<?= url('css/admin.css') ?>">
</head>
<body class="admin">
  <aside class="sidebar">
    <h1>PAW SPACE 🐾</h1>
    <p>Admin Center</p>
    <?php foreach ($adminMenu as $key => [$label, $path]): ?>
    <a class="<?= $key === $adminActive ? 'active' : '' ?>" href="<?= url($path) ?>"><?= e($label) ?></a>
    <?php endforeach; ?>
  </aside>
  <main class="admin-main">
    <div class="admin-top"><input placeholder="Search"><span class="avatar"></span>Admin_name</div>
