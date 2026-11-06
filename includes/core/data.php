<?php
/**
 * Paw Space sample data. These arrays can later be replaced with database
 * query results without changing how the pages look.
 */

$products = [
    ['image' => 'product-1.jpg', 'name' => 'Lamb & Brown Rice Puppy Recipe', 'price' => 150000, 'rating' => 5],
    ['image' => 'product-2.jpg', 'name' => 'Cat Pate Variety Pack',          'price' => 200000, 'rating' => 5],
    ['image' => 'product-3.jpg', 'name' => 'Yo-Gut Bites with Oats',         'price' => 85000,  'rating' => 5],
    ['image' => 'product-4.jpg', 'name' => 'Grain Free Salmon Cat Food',     'price' => 180000, 'rating' => 5],
];

$cartItems = [
    ['image' => 'cart-1.jpg', 'category' => 'Dry dog food', 'name' => 'Lamb & Brown Rice Puppy Recipe',            'price' => 150000, 'quantity' => 1],
    ['image' => 'cart-2.jpg', 'category' => 'Wet cat food', 'name' => 'Chicken & Green Pea Pate',                  'price' => 92000,  'quantity' => 1],
    ['image' => 'cart-3.jpg', 'category' => 'Wet dog food', 'name' => 'Sweet Potato & Salmon Small Breed Cup Recipe', 'price' => 65000,  'quantity' => 1],
    ['image' => 'cart-4.jpg', 'category' => 'Dry dog food', 'name' => 'Beef & Brown Rice Recipe',                  'price' => 170000, 'quantity' => 1],
];

$stylists = [
    ['photo' => 'stylist-1', 'name' => 'Ellie Rhodes',   'role' => 'Dog & Cat Specialist', 'rating' => '★ 4.9 (100+ Reviews)'],
    ['photo' => 'stylist-2', 'name' => 'Cody Wilson',    'role' => 'Senior Breed Stylist', 'rating' => '★ 5 (207+ Reviews)'],
    ['photo' => 'stylist-3', 'name' => 'Samantha Lynn',  'role' => 'De-shedding Expert',   'rating' => '★ 4.8'],
];

$packages = [
    ['type' => 'dog', 'label' => 'Dog Grooming', 'minutes' => 60, 'name' => 'Essential Bath & Brush',
     'description' => 'Ideal for short coats needing deep coat cleansing, nail maintenance, and fresh scent.',
     'items' => ['Organic hypoallergenic shampoo bath', 'Gentle blow-dry & thorough coat brushing', 'Nail clipping & ear canal cleaning', 'Signature blueberry scent spritz'],
     'price' => 55000],
    ['type' => 'dog', 'label' => 'Dog Grooming', 'minutes' => 90, 'name' => 'Full Style & Breed Trim',
     'description' => 'Ideal for medium to long coats requiring complete styling, precision haircut, and total coat makeover.',
     'items' => ['Hydro-massage bath & deep conditioning', 'Gentle blow-dry & dematting / brush-out', 'Nail trimming & paw pad shaving', 'Full-body haircut or breed-standard trim'],
     'price' => 135000],
    ['type' => 'cat', 'label' => 'Cat Grooming', 'minutes' => 45, 'name' => 'Gentle Feline Bath & Brush',
     'description' => 'A stress-free, quiet bath ideal for short-haired cats needing coat refreshment and shed control.',
     'items' => ['Cat-safe hypoallergenic shampoo bath', 'Quiet blow-dry & soft coat brushing', 'Claw clipping & soft paw wipe', 'Gentle ear canal & eye cleaning'],
     'price' => 60000],
    ['type' => 'cat', 'label' => 'Cat Grooming', 'minutes' => 30, 'name' => 'Sanitary & Express Pamper',
     'description' => 'A quick, waterless, low-stress maintenance session tailored for sensitive or bath-averse felines.',
     'items' => ['No-rinse waterless foam cleansing bath', 'Sanitary area & paw pad hair trim', 'Gentle claw trimming', 'Soft coat comb-through & shed removal'],
     'price' => 45000],
];

$rooms = [
    ['photo' => 'room-1', 'name' => 'Deluxe Room',    'price' => 200000],
    ['photo' => 'room-2', 'name' => 'Executive Room', 'price' => 300000],
    ['photo' => 'room-3', 'name' => 'Suite Room',     'price' => 200000],
];
$roomDescription = 'Comfortable private enclosure featuring raised kuranda orthopedic bed and twice daily play sessions.';

$reviews = [
    ['name' => 'Seteven Collins', 'role' => 'Golden Retriever Parent',
     'text' => 'The webcam access was a lifesaver while I was away on business! Barnaby was so happy playing in the courtyard, and his groom post-stay made him look like a show dog.'],
    ['name' => 'Natalie Rosier', 'role' => 'Persian Cat Parent',
     'text' => "Finding a genuinely quiet cat boarding area that doesn't smell or hear barking dogs was tough until Paws & Whiskers. Cleo was calm and purring when I picked her up!"],
];

$groomingAddons = [
    ['name' => 'Premium vegan dog bath bubble',        'price' => 70000],
    ['name' => 'Aromatic bath salt',                   'price' => 40000],
    ['name' => 'Tropical facial spa (passionfruit fa...', 'price' => 100000],
    ['name' => 'Blooming soak ( milk & flower bath )', 'price' => 130000],
];
$hotelAddons = [
    ['name' => 'Cat nip & climbing lounge', 'price' => 60000],
    ['name' => 'Calming smart-bed pad',     'price' => 90000],
    ['name' => 'Private pool',              'price' => 50000],
];

$timeSlots = ['08:00 AM', '01:00 PM', '09:00 AM', '02:00 PM', '10:00 AM', '03:00 PM', '11:00 AM', '04:00 PM', '12:00 PM', '05:00 PM'];
