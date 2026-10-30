<?php
$pageTitle = 'Create Appointment';
$navLinks  = [];

// Paket yang dipilih dari halaman Paw Grooms (?package=indeks)
$pkgIndex = (int) ($_GET['package'] ?? 0);
$package  = $packages[$pkgIndex] ?? $packages[0];
$pkgIndex = isset($packages[$pkgIndex]) ? $pkgIndex : 0;

require __DIR__ . '/../includes/header.php';

hero(
    'appointment',
    'Create Appointment',
    'Match your pet with a dedicated stylist who speaks their language—bringing patience, gentle hands, and personalized care to every single appointment'
);
?>

<section class="container narrow selected-service">
  <h2>Selected Service</h2>
  <div class="card">
    <div class="row">
      <span class="tag"><?= e($package['label']) ?></span>
      <span><?= (int) $package['minutes'] ?> min</span>
    </div>
    <h3><?= e($package['name']) ?></h3>
    <p><?= e($package['desc']) ?></p>
    <p style="text-align:right"><a href="<?= url('pages/grooms.php#packages') ?>" style="color:var(--brown)">Edit</a></p>
  </div>
</section>

<section class="container narrow">
  <h2>Pick a Stylist</h2>
  <div class="grid cols-3">
    <?php foreach ($stylists as $s): ?>
    <article class="stylist">
      <?= photo($s['photo'], $s['name']) ?>
      <h3><?= e($s['name']) ?></h3>
      <p><?= e($s['role']) ?></p>
      <p><?= e($s['rating']) ?></p>
    </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="container narrow">
  <h2>Set Time &amp; Date</h2>
  <form action="<?= url('pages/checkout-grooming.php') ?>" method="get">
    <input type="hidden" name="package" value="<?= $pkgIndex ?>">
    <input type="hidden" name="date" value="2026-10-03">
    <div class="booking-layout">
      <div class="calendar-box">
        <?= render_calendar(['2026-10' => [3, 22, 25]], '2026-10-03') ?>
      </div>
      <div class="slots">
        <?php foreach ($timeSlots as $slot): ?>
        <label class="slot">
          <input type="radio" name="time" value="<?= e($slot) ?>"<?= $slot === '01:00 PM' ? ' checked' : '' ?>>
          <?= e($slot) ?>
        </label>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="actions">
      <a class="btn btn-green" href="<?= url('index.php') ?>">Continue Browsing</a>
      <button class="btn btn-brown" type="submit">Continue to Check Out</button>
    </div>
  </form>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
