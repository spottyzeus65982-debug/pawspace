<?php
/**
 * Loads everything a page needs. Every page starts with:
 *   require_once __DIR__ . '/<path to>/includes/core/bootstrap.php';
 * After that, PROJECT_ROOT can be used to include layouts and components.
 */

define('PROJECT_ROOT', dirname(__DIR__, 2));

require_once __DIR__ . '/helper.php';
require_once __DIR__ . '/data.php';
