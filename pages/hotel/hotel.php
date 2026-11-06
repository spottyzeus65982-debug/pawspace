<?php
require_once __DIR__ . '/../../includes/core/bootstrap.php';
$pageTitle = 'Paw Hotel';
$navLinks  = [
    ['Home',         url('index.php')],
    ['Services',     '#rooms'],
    ['Reservations', '#reserve'],
    ['Live Webcam',  '#webcam'],
];
require PROJECT_ROOT . '/includes/layouts/site/header.php';

render_hero(
    'hotel',
    'Paw Hotel',
    "More than just a stay—we provide a climate-controlled, cozy sanctuary where your cats and dogs enjoy private suites, daily playtime, and round-the-clock affection so they feel completely at home while you're away."
);
?>

<section id="reserve" class="container">
  <div class="grid cols-2">
    <div class="hotel-lead">
      <p class="kicker">5-star rated pet boarding &amp; spa</p>
      <h2>5-Star Luxury Stays &amp; Pampering For <em>Cats &amp; Dogs</em></h2>
      <p>Spacious climate-controlled suites, separate serene feline quarters, 24/7 webcams, and organic spa treatments designed for your pet's complete relaxation and happiness.</p>
      <div class="badges">
        <span class="badge">🎥 24/7 HD Live Webcam</span>
        <span class="badge">🍃 Organic spa treatments</span>
      </div>
    </div>

    <form class="card res-form" action="<?= url('pages/hotel/checkout-hotel.php') ?>" method="get">
      <p><strong>Quick Reservation Search</strong></p>
      <div class="toggle" style="margin-top:12px"><span class="on">Dog Guest</span><span>Cat Guest</span></div>
      <label for="service">Select Required Service</label>
      <select id="service" name="service" style="margin-bottom:16px"><option>Hotel Boarding Suite</option></select>
      <div class="field-row">
        <div><label for="check-in">Check-in Date</label><input id="check-in" type="date" name="check_in"></div>
        <div><label for="check-out">Check-out Date</label><input id="check-out" type="date" name="check_out"></div>
      </div>
      <div class="field-row">
        <div><label for="pets">Number of Pets</label><input id="pets" type="number" min="1" value="1" name="pets"></div>
        <div><label for="size">Pet Size Tier</label><select id="size" name="size"><option>Small (under 5kg)</option></select></div>
      </div>
      <button class="btn btn-green" type="submit">Check Available Suites &amp; Slots</button>
    </form>
  </div>
</section>

<section id="rooms" class="container">
  <p class="center eyebrow">Overnight Luxury</p>
  <h2 style="margin-bottom:1rem">Resort Hotel Accommodations</h2>
  <p class="center" style="max-width:36em;margin:0 auto 2.5rem">Separate wings for dogs and cats. Climate-controlled, sound-insulated suites equipped with organic orthopedic bedding and live webcams.</p>
  <div class="grid cols-3">
    <?php foreach ($rooms as $room): ?>
    <article class="card room">
      <?= render_photo($room['photo'], $room['name']) ?>
      <div>
        <h3><?= escape_html($room['name']) ?></h3>
        <p><?= escape_html($roomDescription) ?></p>
        <strong><?= format_rupiah($room['price']) ?>/night</strong>
      </div>
    </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="container">
  <div class="calendar-box">
    <div class="cal-title-wrap">
      <span class="cal-icon">📅</span>
      <div>
        <h3 class="cal-title">Paw Hotel Calendar</h3>
        <p>Check for availability during your month of choosing</p>
      </div>
    </div>
    <?= render_calendar() ?>
    <p style="text-align:right"><a class="btn btn-green" href="<?= url('pages/hotel/checkout-hotel.php') ?>">Book Now</a></p>
  </div>
</section>

<section id="webcam" class="webcam">
  <div class="container">
    <span class="live-badge">Live Webcam Review</span>
    <h2>Watch Our Guests<br>Play in Real-Time</h2>
    <?= render_photo('webcam', 'Live webcam view of a kitten playing on a cat tree') ?>
  </div>
</section>

<?php require PROJECT_ROOT . '/includes/layouts/site/footer.php'; ?>
