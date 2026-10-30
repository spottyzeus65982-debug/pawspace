<?php
$pageTitle = 'Home';
$showCart  = true;
$navLinks  = [
    ['Home',     url('index.php')],
    ['Services', url('index.php#services')],
    ['Products', url('index.php#products')],
    ['Reviews',  url('index.php#reviews')],
    ['About Us', url('index.php#about')],
];
require __DIR__ . '/includes/header.php';

hero(
    'home',
    'We Take Care of Your Fur Friends',
    "Top-tier grooming and cozy hotel suites under one roof. Leave your pets in loving hands while you're away or just away for the day.",
    '<a class="btn btn-green" href="#services">Our services ⌄</a>'
);
?>

<section id="services" class="container narrow">
  <h2>PAW SPACE Services</h2>
  <div class="grid cols-2">
    <div class="card service">
      <h3>✂ Paw Grooms</h3>
      <p>Professional styling, deep-cleaning baths, and full-service pet spa packages crafted to keep your dog or cat healthy, happy, and beautifully groomed.</p>
      <a class="btn btn-green" href="<?= url('pages/grooms.php') ?>">View page ›</a>
    </div>
    <div class="card service">
      <h3>🏨 Paw Hotel</h3>
      <p>Spacious suites, personal care, and round-the-clock attention: a safe, cozy home away from home where your cats and dogs can rest, play, and thrive while you're away.</p>
      <a class="btn btn-green" href="<?= url('pages/hotel.php') ?>">View page ›</a>
    </div>
  </div>
</section>

<section class="container">
  <h2>Your pet is in safe hands!</h2>
  <div class="safe-hands">
    <?= photo('home-cat', 'Orange kitten holding a toy mouse', 'tall-l') ?>
    <?= photo('home-kitten', 'White kitten being groomed', 'top-m') ?>
    <?= photo('home-yorkie', 'Yorkshire terrier getting a haircut', 'bot-m') ?>
    <?= photo('home-dachshund', 'Dachshund looking up at the camera', 'tall-r') ?>
  </div>
</section>

<section id="products" class="container">
  <h2>Our Products</h2>
  <div class="grid cols-4">
    <?php foreach ($products as $product): ?>
    <article class="product">
      <img src="<?= url('images/' . $product['img']) ?>" alt="<?= e($product['name']) ?>">
      <h3><?= e($product['name']) ?></h3>
      <div class="price"><span><?= rupiah($product['price']) ?></span><span>★ <?= (int) $product['rating'] ?></span></div>
      <button class="btn btn-green" type="button">Add to Cart</button>
    </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="container">
  <div class="promo">
    <div>
      <h2><span>Pamper your</span>Pet: Expert Paw Grooming</h2>
      <p>Look fresh, feel great. Our certified groomers provide gentle care, design-specific styling, and complete wellness services.</p>
      <a class="btn btn-green" href="<?= url('pages/grooms.php') ?>">View grooming services ⌄</a>
    </div>
    <div class="promo-photos">
      <?= photo('banner-bath', 'Small dog being bathed') ?>
      <?= photo('banner-bubble', 'Golden retriever with bubbles on its head') ?>
      <?= photo('banner-nails', 'Nail clipping') ?>
      <?= photo('banner-golden', 'Golden retriever with grooming product') ?>
      <div class="dots" aria-hidden="true"><i></i><i></i><i></i><i></i></div>
    </div>
  </div>
</section>

<section id="about" class="container">
  <div class="about">
    <?= photo('about-1', 'Madison Miller, founder of Paw Space') ?>
    <div class="center">
      <h2>About Us</h2>
      <p>"Paw Grooms &amp; Paw Hotel wasn't just built as a business; it was born out of pure love for my pet dog. As a dedicated dog parent, I knew how crucial it was to find groomers who lead with patience and truly feel like family. When I couldn't find a place that checked every box, I decided to build one. I created this space to offer a cozy, stress-free haven where every cat and dog receives the same royal treatment, gentle touch, and boundless affection I give my own companion every day."</p>
      <p><strong>▪ Madison Miller, 2023.</strong></p>
    </div>
    <?= photo('about-2', 'Small dog sitting on a sofa') ?>
  </div>
</section>

<section id="reviews" class="container">
  <p class="eyebrow">Parents Piece of Mind</p>
  <h2>What our fur parents say</h2>
  <?php foreach ($reviews as $review): ?>
  <div class="review">
    <div class="review-head">
      <div class="who">
        <span class="dot"></span>
        <div><strong><?= e($review['name']) ?></strong><br><small><?= e($review['role']) ?></small></div>
      </div>
      <span class="stars">★★★★★</span>
    </div>
    <p><?= e($review['text']) ?></p>
  </div>
  <?php endforeach; ?>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
