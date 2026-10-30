<?php
$pageTitle   = 'Admin Hotel Booking';
$adminActive = 'hotel';
require __DIR__ . '/../includes/admin-header.php';

// Kolom tabel. Isi $rows dengan data dari database: [['Nama','0812...', ...], ...]
$columns = [
    'Client name',
    'Phone number',
    'Home address',
    'Pet',
    'Room',
    'Add ons',
    'Check in',
    'Check out',
    'Duration of stay',
    'Total',
    'Payment method',
];
$rows = [];

render_admin_table($columns, $rows);

require __DIR__ . '/../includes/admin-footer.php';
