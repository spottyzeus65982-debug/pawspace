<?php
$pageTitle   = 'Admin Hotel Booking';
$adminActive = 'hotel';
require_once __DIR__ . '/../includes/core/bootstrap.php';
require PROJECT_ROOT . '/includes/layouts/admin/header.php';

// Table columns. Fill $rows with database data: [['Name', '0812...', ...], ...]
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

require PROJECT_ROOT . '/includes/layouts/admin/footer.php';
