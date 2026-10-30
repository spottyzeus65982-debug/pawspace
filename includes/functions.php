<?php
/**
 * Fungsi bantu Paw Space.
 * BASE_URL dihitung otomatis dari lokasi skrip, jadi situs bisa ditaruh di
 * root (http://localhost/) maupun subfolder (http://localhost/paw-space/).
 */

$__script = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
define('BASE_URL', rtrim(preg_replace('#/(pages|admin)$#', '', $__script), '/'));

/** Escape teks sebelum ditampilkan (cegah XSS). */
function e($text): string
{
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

/** URL absolut dari root situs, contoh: url('pages/hotel.php'). */
function url(string $path = ''): string
{
    return BASE_URL . '/' . ltrim($path, '/');
}

/** Format angka ke rupiah: 150000 => Rp150.000 */
function rupiah(int $amount): string
{
    return 'Rp' . number_format($amount, 0, ',', '.');
}

/** Tampilkan bagian hero dengan foto latar dari css/photos.css (.hero--{variant}). */
function hero(string $variant, string $title, string $text, string $extraHtml = ''): void
{
    echo '<section class="hero hero--' . e($variant) . '">' . "\n";
    echo '  <h1>' . e($title) . '</h1>' . "\n";
    echo '  <p>' . e($text) . '</p>' . "\n";
    if ($extraHtml !== '') {
        echo '  ' . $extraHtml . "\n";
    }
    echo '</section>' . "\n";
}

/** Kotak foto yang gambarnya diatur lewat CSS (css/photos.css). */
function photo(string $name, string $label = '', string $extraClass = ''): string
{
    $class = trim('photo photo-' . $name . ' ' . $extraClass);
    return '<div class="' . e($class) . '" role="img" aria-label="' . e($label) . '"></div>';
}

/**
 * Kalender bulanan.
 *   $avail    = tanggal bertanda paw per bulan, contoh ['2026-10' => [3, 22, 25]]
 *   $selected = tanggal terpilih format 'YYYY-MM-DD' (opsional)
 * Bulan dipilih lewat ?cal=YYYY-MM (tidak valid => bulan ini).
 */
function render_calendar(array $avail = [], ?string $selected = null, string $param = 'cal'): string
{
    $raw = $_GET[$param] ?? '';
    if (!preg_match('/^(\d{4})-(0[1-9]|1[0-2])$/', (string) $raw, $m)) {
        $m = [null, date('Y'), date('m')];
    }
    $first = new DateTimeImmutable(sprintf('%04d-%02d-01', (int) $m[1], (int) $m[2]));
    $prev = $first->modify('-1 month');
    $next = $first->modify('+1 month');

    $link = function (DateTimeImmutable $d) use ($param): string {
        return '?' . http_build_query(array_merge($_GET, [$param => $d->format('Y-m')]));
    };

    $ym = $first->format('Y-m');
    $markedDays = $avail[$ym] ?? [];
    $startDow = (int) $first->format('w');       // 0 = Minggu
    $daysInMonth = (int) $first->format('t');
    $prevDays = (int) $prev->format('t');

    $cells = [];
    for ($i = $startDow - 1; $i >= 0; $i--) {
        $cells[] = ['d' => $prevDays - $i, 'class' => 'mute'];
    }
    for ($d = 1; $d <= $daysInMonth; $d++) {
        $class = '';
        if (in_array($d, $markedDays, true)) {
            $class = 'avail';
        }
        if ($selected === sprintf('%s-%02d', $ym, $d)) {
            $class .= ' sel';
        }
        $cells[] = ['d' => $d, 'class' => trim($class)];
    }
    for ($d = 1; count($cells) % 7 !== 0; $d++) {
        $cells[] = ['d' => $d, 'class' => 'mute'];
    }

    $html = '<table class="calendar">';
    $html .= '<caption><div class="cal-nav">'
        . '<a href="' . e($link($prev)) . '" aria-label="Previous month">‹</a>'
        . '<span>' . e($first->format('F Y')) . '</span>'
        . '<a href="' . e($link($next)) . '" aria-label="Next month">›</a>'
        . '</div></caption>';
    $html .= '<thead><tr>';
    foreach (['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'] as $dayName) {
        $html .= '<th>' . $dayName . '</th>';
    }
    $html .= '</tr></thead><tbody>';
    foreach (array_chunk($cells, 7) as $week) {
        $html .= '<tr>';
        foreach ($week as $cell) {
            $html .= '<td' . ($cell['class'] ? ' class="' . $cell['class'] . '"' : '') . '><span>' . $cell['d'] . '</span></td>';
        }
        $html .= '</tr>';
    }
    $html .= '</tbody></table>';
    return $html;
}

/** Tabel admin. Baris kosong diisi "-" agar tampilan sama dengan desain. */
function render_admin_table(array $columns, array $rows = [], int $minRows = 10): void
{
    echo '<table class="table"><thead><tr>';
    foreach ($columns as $col) {
        echo '<th>' . e($col) . '</th>';
    }
    echo '</tr></thead><tbody>';
    $total = max($minRows, count($rows));
    $last = count($columns) - 1;
    for ($r = 0; $r < $total; $r++) {
        echo '<tr>';
        foreach ($columns as $i => $col) {
            $value = $rows[$r][$i] ?? '-';
            if ($i === $last) {
                echo '<td class="actions-cell">' . e($value) . '&nbsp;&nbsp;'
                    . '<button type="button" title="Edit">✎</button>'
                    . '<button type="button" title="Hapus">🗑</button></td>';
            } else {
                echo '<td>' . e($value) . '</td>';
            }
        }
        echo '</tr>';
    }
    echo '</tbody></table>';
}

/** Ubah 'YYYY-MM-DD' ke 'mm/dd/YYYY'; jika tidak valid pakai $default. */
function fmt_date(?string $iso, string $default): string
{
    $d = $iso ? DateTimeImmutable::createFromFormat('!Y-m-d', $iso) : false;
    return $d ? $d->format('m/d/Y') : $default;
}
