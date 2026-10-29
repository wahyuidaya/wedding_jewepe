<?php
/**
 * Vercel PHP Serverless Entrypoint - Wedding Jewepe
 */

$uri  = $_SERVER['REQUEST_URI'];
$path = ltrim(parse_url($uri, PHP_URL_PATH), '/');
$root = dirname(__DIR__);

if (empty($path)) $path = 'index.php';

$fullPath = $root . '/' . $path;

if (is_dir($fullPath)) {
    $fullPath = rtrim($fullPath, '/') . '/index.php';
    $path     = rtrim($path, '/')     . '/index.php';
}

if (file_exists($fullPath) && pathinfo($fullPath, PATHINFO_EXTENSION) === 'php') {
    chdir(dirname($fullPath));
    require $fullPath;
} elseif (file_exists($fullPath)) {
    $ext = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    $mime = [
        'css'  => 'text/css', 'js' => 'application/javascript',
        'png'  => 'image/png', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg',
        'gif'  => 'image/gif', 'svg' => 'image/svg+xml', 'ico' => 'image/x-icon',
        'woff' => 'font/woff', 'woff2' => 'font/woff2', 'ttf' => 'font/ttf',
    ];
    if (isset($mime[$ext])) header('Content-Type: ' . $mime[$ext]);
    readfile($fullPath);
} else {
    chdir($root);
    require $root . '/index.php';
}
