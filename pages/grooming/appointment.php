<?php
require_once __DIR__ . '/../../includes/core/bootstrap.php';
$pageTitle = 'Create Appointment';
$navLinks  = [];

// Package selected on the Paw Grooms page (?package=index)
$packageIndex = (int) ($_GET['package'] ?? 0);
$package      = $packages[$packageIndex] ?? $packages[0];
$packageIndex = isset($packages[$packageIndex]) ? $packageIndex : 0;

require PROJECT_ROOT . '/includes/layouts/site/header.php';

render_hero(
    'appointment',
    'Create Appointment',
    'Match your pet with a dedicated stylist who speaks their language—bringing patience, gentle hands, and personalized care to every single appointment'
);
?>

<section class="container narrow selected-service">
  <h2>Selected Service</h2>
  <div class="card">
    <div class="row">
      <span class="tag"><?= escape_html($package['label']) ?></span>
      <span><?= (int) $package['minutes'] ?> min</span>
    </div>
    <h3><?= escape_html($package['name']) ?></h3>
    <p><?= escape_html($package['description']) ?></p>
    <p style="text-align:right"><a href="<?= url('pages/grooming/grooms.php#packages') ?>" style="color:var(--brown)">Edit</a></p>
  </div>
</section>

<section class="container narrow">
  <h2>Pick a Stylist</h2>
  <div class="grid cols-3">
    <?php foreach ($stylists as $stylist): ?>
    <article class="stylist">
      <?= render_photo($stylist['photo'], $stylist['name']) ?>
      <h3><?= escape_html($stylist['name']) ?></h3>
      <p><?= escape_html($stylist['role']) ?></p>
      <p><?= escape_html($stylist['rating']) ?></p>
    </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="container narrow">
  <h2>Set Time &amp; Date</h2>
  <form action="<?= url('pages/grooming/checkout-grooming.php') ?>" method="get">
    <input type="hidden" name="package" value="<?= $packageIndex ?>">
    <input type="hidden" name="date" value="2026-10-03">
    <div class="booking-layout">
      <div class="calendar-box">
        <?= render_calendar(['2026-10' => [3, 22, 25]], '2026-10-03') ?>
      </div>
      <div class="slots">
        <?php foreach ($timeSlots as $slot): ?>
        <label class="slot">
          <input type="radio" name="time" value="<?= escape_html($slot) ?>"<?= $slot === '01:00 PM' ? ' checked' : '' ?>>
          <?= escape_html($slot) ?>
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

<?php require PROJECT_ROOT . '/includes/layouts/site/footer.php'; ?>
