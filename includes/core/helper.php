<?php
/**
 * Paw Space helper functions.
 * BASE_URL is calculated automatically from the script location, so the site
 * can live in the web root (http://localhost/) or in a subfolder
 * (http://localhost/paw-space/), and pages can be nested in any depth under
 * the "pages" and "admin" folders.
 */

$scriptDirectory = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
define('BASE_URL', rtrim(preg_replace('#/(pages|admin)(/.*)?$#', '', $scriptDirectory), '/'));

/** Escape text before printing it (prevents XSS). */
function escape_html($text): string
{
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

/** Absolute URL from the site root, e.g. url('pages/hotel/hotel.php'). */
function url(string $path = ''): string
{
    return BASE_URL . '/' . ltrim($path, '/');
}

/** Format a number as rupiah: 150000 => Rp150.000 */
function format_rupiah(int $amount): string
{
    return 'Rp' . number_format($amount, 0, ',', '.');
}

/** Print a hero section with the background photo from css/photos.css (.hero--{variant}). */
function render_hero(string $variant, string $title, string $text, string $extraHtml = ''): void
{
    echo '<section class="hero hero--' . escape_html($variant) . '">' . "\n";
    echo '  <h1>' . escape_html($title) . '</h1>' . "\n";
    echo '  <p>' . escape_html($text) . '</p>' . "\n";
    if ($extraHtml !== '') {
        echo '  ' . $extraHtml . "\n";
    }
    echo '</section>' . "\n";
}

/** Photo box whose image is set through CSS (css/photos.css). */
function render_photo(string $name, string $label = '', string $extraClass = ''): string
{
    $class = trim('photo photo-' . $name . ' ' . $extraClass);
    return '<div class="' . escape_html($class) . '" role="img" aria-label="' . escape_html($label) . '"></div>';
}

/**
 * Monthly calendar.
 *   $availableDays = days marked with a paw per month, e.g. ['2026-10' => [3, 22, 25]]
 *   $selectedDate  = selected date in 'YYYY-MM-DD' format (optional)
 * The month is chosen with ?month=YYYY-MM (invalid value => current month).
 */
function render_calendar(array $availableDays = [], ?string $selectedDate = null, string $queryParameter = 'month'): string
{
    $rawMonth = $_GET[$queryParameter] ?? '';
    if (!preg_match('/^(\d{4})-(0[1-9]|1[0-2])$/', (string) $rawMonth, $matches)) {
        $matches = [null, date('Y'), date('m')];
    }
    $firstDay = new DateTimeImmutable(sprintf('%04d-%02d-01', (int) $matches[1], (int) $matches[2]));
    $previousMonth = $firstDay->modify('-1 month');
    $nextMonth = $firstDay->modify('+1 month');

    $buildMonthLink = function (DateTimeImmutable $month) use ($queryParameter): string {
        return '?' . http_build_query(array_merge($_GET, [$queryParameter => $month->format('Y-m')]));
    };

    $yearMonth = $firstDay->format('Y-m');
    $markedDays = $availableDays[$yearMonth] ?? [];
    $startDayOfWeek = (int) $firstDay->format('w');   // 0 = Sunday
    $daysInMonth = (int) $firstDay->format('t');
    $daysInPreviousMonth = (int) $previousMonth->format('t');

    $cells = [];
    for ($offset = $startDayOfWeek - 1; $offset >= 0; $offset--) {
        $cells[] = ['day' => $daysInPreviousMonth - $offset, 'class' => 'mute'];
    }
    for ($day = 1; $day <= $daysInMonth; $day++) {
        $class = '';
        if (in_array($day, $markedDays, true)) {
            $class = 'avail';
        }
        if ($selectedDate === sprintf('%s-%02d', $yearMonth, $day)) {
            $class .= ' sel';
        }
        $cells[] = ['day' => $day, 'class' => trim($class)];
    }
    for ($day = 1; count($cells) % 7 !== 0; $day++) {
        $cells[] = ['day' => $day, 'class' => 'mute'];
    }

    $html = '<table class="calendar">';
    $html .= '<caption><div class="cal-nav">'
        . '<a href="' . escape_html($buildMonthLink($previousMonth)) . '" aria-label="Previous month">‹</a>'
        . '<span>' . escape_html($firstDay->format('F Y')) . '</span>'
        . '<a href="' . escape_html($buildMonthLink($nextMonth)) . '" aria-label="Next month">›</a>'
        . '</div></caption>';
    $html .= '<thead><tr>';
    foreach (['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'] as $dayName) {
        $html .= '<th>' . $dayName . '</th>';
    }
    $html .= '</tr></thead><tbody>';
    foreach (array_chunk($cells, 7) as $week) {
        $html .= '<tr>';
        foreach ($week as $cell) {
            $html .= '<td' . ($cell['class'] ? ' class="' . $cell['class'] . '"' : '') . '><span>' . $cell['day'] . '</span></td>';
        }
        $html .= '</tr>';
    }
    $html .= '</tbody></table>';
    return $html;
}

/** Admin table. Empty cells are filled with "-" so the layout matches the design. */
function render_admin_table(array $columns, array $rows = [], int $minimumRows = 10): void
{
    echo '<table class="table"><thead><tr>';
    foreach ($columns as $column) {
        echo '<th>' . escape_html($column) . '</th>';
    }
    echo '</tr></thead><tbody>';
    $totalRows = max($minimumRows, count($rows));
    $lastColumnIndex = count($columns) - 1;
    for ($rowIndex = 0; $rowIndex < $totalRows; $rowIndex++) {
        echo '<tr>';
        foreach ($columns as $columnIndex => $column) {
            $value = $rows[$rowIndex][$columnIndex] ?? '-';
            if ($columnIndex === $lastColumnIndex) {
                echo '<td class="actions-cell">' . escape_html($value) . '&nbsp;&nbsp;'
                    . '<button type="button" title="Edit">✎</button>'
                    . '<button type="button" title="Delete">🗑</button></td>';
            } else {
                echo '<td>' . escape_html($value) . '</td>';
            }
        }
        echo '</tr>';
    }
    echo '</tbody></table>';
}

/** Convert 'YYYY-MM-DD' to 'mm/dd/YYYY'; use $default when the value is invalid. */
function format_date(?string $isoDate, string $default): string
{
    $date = $isoDate ? DateTimeImmutable::createFromFormat('!Y-m-d', $isoDate) : false;
    return $date ? $date->format('m/d/Y') : $default;
}
