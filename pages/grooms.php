<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/data.php';
$pageTitle = 'Paw Grooms';
$navLinks  = [
    ['Home',     url('index.php')],
    ['Services', '#packages'],
    ['Stylists', '#stylists'],
    ['Gallery',  '#gallery'],
];

// Filter paket: ?type=dog | ?type=cat (selain itu tampil semua)
$filter = $_GET['type'] ?? 'all';
if (!in_array($filter, ['dog', 'cat'], true)) {
    $filter = 'all';
}
$visiblePackages = array_filter($packages, fn ($p) => $filter === 'all' || $p['type'] === $filter);
$tabs = ['all' => 'All Services', 'dog' => 'Dog Grooming', 'cat' => 'Cat Grooming'];

require __DIR__ . '/../includes/header.php';

hero(
    'grooms',
    'Paw Grooms',
    "Every coat, paw, and whisker deserves patient care—we combine gentle handling, premium natural products, and expert techniques to give your pet a soothing spa day they'll actually look forward to."
);
?>

<section id="stylists" class="container narrow">
  <h2>Get to Know Our Stylists</h2>
  <div class="grid cols-3 tall">
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

<section id="packages" class="container narrow">
  <p class="center eyebrow">Tailored Care Packages</p>
  <h2 style="margin-bottom:1rem">Grooming &amp; Spa Treatments</h2>
  <p class="center">Switch between species views to see customized packages specifically crafted for canine energy and feline serenity.</p>

  <nav class="pills" aria-label="Filter packages">
    <?php foreach ($tabs as $key => $label): ?>
    <a class="pill<?= $filter === $key ? ' active' : '' ?>" href="?type=<?= e($key) ?>#packages"><?= e($label) ?></a>
    <?php endforeach; ?>
  </nav>

  <div class="grid cols-2">
    <?php foreach ($visiblePackages as $i => $p): ?>
    <article class="package">
      <header>
        <span class="tag" style="background:var(--brown)"><?= e($p['label']) ?></span>
        <span class="time"><?= (int) $p['minutes'] ?> min</span>
      </header>
      <h3><?= e($p['name']) ?></h3>
      <p><?= e($p['desc']) ?></p>
      <ul>
        <?php foreach ($p['items'] as $item): ?>
        <li><?= e($item) ?></li>
        <?php endforeach; ?>
      </ul>
      <footer>
        <span><?= rupiah($p['price']) ?></span>
        <a class="btn btn-green" href="<?= url('pages/appointment.php?package=' . $i) ?>">Select Package</a>
      </footer>
    </article>
    <?php endforeach; ?>
  </div>
</section>

<section id="gallery" class="container">
  <h2 style="margin-bottom:.5rem">Look At Examples Of Our Works</h2>
  <p class="center" style="margin-bottom:2rem">Browse the gallery</p>
  <div class="gallery">
    <?= photo('gallery-a', 'Shih tzu with a green bandana', 'a') ?>
    <?= photo('gallery-b', 'Fluffy orange cat on a pink background', 'b') ?>
    <?= photo('gallery-c', 'Orange cat raising its paw', 'c') ?>
    <?= photo('gallery-d', 'White terrier after grooming', 'd') ?>
    <?= photo('gallery-e', 'Pomeranian in a grooming salon', 'e') ?>
  </div>
  <p class="center" style="margin-top:1.5rem"><a class="btn btn-green" href="#gallery">View More</a></p>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
