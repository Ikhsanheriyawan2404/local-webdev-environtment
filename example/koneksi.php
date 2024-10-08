<?php

// Konfigurasi database
$dbConfig = [
    'mysql' => [
        'host' => 'mysql', // Nama service di docker-compose.yml
        'db'   => 'example',
        'user' => 'root', // Ganti sesuai dengan username MySQL
        'pass' => 'asintel' // Ganti sesuai dengan password MySQL
    ],
    'pgsql' => [
        'host' => 'pgsql', // Nama service di docker-compose.yml
        'db'   => 'example',
        'user' => 'postgres', // Ganti dengan username PostgreSQL
        'pass' => 'asintel' // Ganti dengan password PostgreSQL
    ]
];

// Fungsi untuk menguji koneksi
function testConnection($dbConfig, $dbType) {
    try {
        if ($dbType === 'mysql') {
            $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['db']}";
            $pdo = new PDO($dsn, $dbConfig['user'], $dbConfig['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Koneksi MySQL berhasil!<br>";
        } elseif ($dbType === 'pgsql') {
            $dsn = "pgsql:host={$dbConfig['host']};dbname={$dbConfig['db']}";
            $pdo = new PDO($dsn, $dbConfig['user'], $dbConfig['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Koneksi PostgreSQL berhasil!<br>";
        }
    } catch (PDOException $e) {
        echo "Koneksi {$dbType} gagal: " . $e->getMessage() . "<br>";
    }
}

// Menguji koneksi untuk MySQL dan PostgreSQL
testConnection($dbConfig['mysql'], 'mysql');
testConnection($dbConfig['pgsql'], 'pgsql');
