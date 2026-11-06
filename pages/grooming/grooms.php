<?php
require_once __DIR__ . '/../../includes/core/bootstrap.php';
$pageTitle = 'Paw Grooms';
$navLinks  = [
    ['Home',     url('index.php')],
    ['Services', '#packages'],
    ['Stylists', '#stylists'],
    ['Gallery',  '#gallery'],
];

// Package filter: ?type=dog | ?type=cat (anything else shows all packages)
$filter = $_GET['type'] ?? 'all';
if (!in_array($filter, ['dog', 'cat'], true)) {
    $filter = 'all';
}
$visiblePackages = array_filter($packages, fn ($package) => $filter === 'all' || $package['type'] === $filter);
$tabs = ['all' => 'All Services', 'dog' => 'Dog Grooming', 'cat' => 'Cat Grooming'];

require PROJECT_ROOT . '/includes/layouts/site/header.php';

render_hero(
    'grooms',
    'Paw Grooms',
    "Every coat, paw, and whisker deserves patient care—we combine gentle handling, premium natural products, and expert techniques to give your pet a soothing spa day they'll actually look forward to."
);
?>

<section id="stylists" class="container narrow">
  <h2>Get to Know Our Stylists</h2>
  <div class="grid cols-3 tall">
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

<section id="packages" class="container narrow">
  <p class="center eyebrow">Tailored Care Packages</p>
  <h2 style="margin-bottom:1rem">Grooming &amp; Spa Treatments</h2>
  <p class="center">Switch between species views to see customized packages specifically crafted for canine energy and feline serenity.</p>

  <nav class="pills" aria-label="Filter packages">
    <?php foreach ($tabs as $key => $label): ?>
    <a class="pill<?= $filter === $key ? ' active' : '' ?>" href="?type=<?= escape_html($key) ?>#packages"><?= escape_html($label) ?></a>
    <?php endforeach; ?>
  </nav>

  <div class="grid cols-2">
    <?php foreach ($visiblePackages as $packageIndex => $package): ?>
    <article class="package">
      <header>
        <span class="tag" style="background:var(--brown)"><?= escape_html($package['label']) ?></span>
        <span class="time"><?= (int) $package['minutes'] ?> min</span>
      </header>
      <h3><?= escape_html($package['name']) ?></h3>
      <p><?= escape_html($package['description']) ?></p>
      <ul>
        <?php foreach ($package['items'] as $item): ?>
        <li><?= escape_html($item) ?></li>
        <?php endforeach; ?>
      </ul>
      <footer>
        <span><?= format_rupiah($package['price']) ?></span>
        <a class="btn btn-green" href="<?= url('pages/grooming/appointment.php?package=' . $packageIndex) ?>">Select Package</a>
      </footer>
    </article>
    <?php endforeach; ?>
  </div>
</section>

<section id="gallery" class="container">
  <h2 style="margin-bottom:.5rem">Look At Examples Of Our Works</h2>
  <p class="center" style="margin-bottom:2rem">Browse the gallery</p>
  <div class="gallery">
    <?= render_photo('gallery-a', 'Shih tzu with a green bandana', 'a') ?>
    <?= render_photo('gallery-b', 'Fluffy orange cat on a pink background', 'b') ?>
    <?= render_photo('gallery-c', 'Orange cat raising its paw', 'c') ?>
    <?= render_photo('gallery-d', 'White terrier after grooming', 'd') ?>
    <?= render_photo('gallery-e', 'Pomeranian in a grooming salon', 'e') ?>
  </div>
  <p class="center" style="margin-top:1.5rem"><a class="btn btn-green" href="#gallery">View More</a></p>
</section>

<?php require PROJECT_ROOT . '/includes/layouts/site/footer.php'; ?>
