<?php
$pageTitle   = 'Admin Products';
$adminActive = 'products';
require __DIR__ . '/../includes/admin-header.php';

// Kolom tabel. Isi $rows dengan data dari database: [['Nama','0812...', ...], ...]
$columns = [
    'Client name',
    'Phone number',
    'Home address',
    'Product',
    'Quantity',
    'Total',
    'Payment method',
    'Delivery status',
];
$rows = [];

render_admin_table($columns, $rows);

require __DIR__ . '/../includes/admin-footer.php';
