<?php

/**
 * Root entry point for shared hosting (InfinityFree).
 * Redirects all requests to the public/ folder without
 * relying on mod_rewrite/htaccess.
 */

// Fix SERVER vars so Laravel generates correct URLs
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/public/index.php';
$_SERVER['SCRIPT_NAME']     = '/index.php';
$_SERVER['PHP_SELF']        = '/index.php';

// Change working directory to public
chdir(__DIR__ . '/public');

// Load Laravel's entry point
require __DIR__ . '/public/index.php';
