<?php
$pageTitle   = 'Admin Grooming';
$adminActive = 'grooming';
require __DIR__ . '/../includes/admin-header.php';

// Kolom tabel. Isi $rows dengan data dari database: [['Nama','0812...', ...], ...]
$columns = [
    'Client name',
    'Phone number',
    'Home address',
    'Pet',
    'Package',
    'Add ons',
    'Total',
    'Payment method',
];
$rows = [];

render_admin_table($columns, $rows);

require __DIR__ . '/../includes/admin-footer.php';
