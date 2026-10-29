<?php
$host     = $_ENV['DB_HOST']     ?? getenv('DB_HOST')     ?: 'localhost';
$user     = $_ENV['DB_USERNAME'] ?? getenv('DB_USERNAME') ?: 'root';
$pass     = $_ENV['DB_PASSWORD'] ?? getenv('DB_PASSWORD') ?: '';
$db       = $_ENV['DB_DATABASE'] ?? getenv('DB_DATABASE') ?: 'db_wedding_jewepe';
$useSSL   = filter_var($_ENV['DB_SSL'] ?? getenv('DB_SSL') ?: 'false', FILTER_VALIDATE_BOOLEAN);

$conn = mysqli_init();

if ($useSSL) {
    mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
    mysqli_real_connect($conn, $host, $user, $pass, $db, 4000, NULL, MYSQLI_CLIENT_SSL);
} else {
    mysqli_real_connect($conn, $host, $user, $pass, $db);
}

if (mysqli_connect_errno()) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
?>
