<?php
// src/models/db.php
// función db() devuelve PDO único

function env($key, $default = null) {
    static $env = null;
    if ($env === null) {
        $env = [];
        $path = __DIR__ . '/../../.env';
        if (file_exists($path)) {
            $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) continue;
                [$k, $v] = array_map('trim', explode('=', $line, 2) + [1 => null]);
                $env[$k] = $v;
            }
        }
    }
    return $env[$key] ?? $default;
}

function db() : PDO {
    static $pdo = null;
    if ($pdo) return $pdo;

    $driver = env('DB_DRIVER', 'sqlite');
    if ($driver === 'sqlite') {
        $path = env('DB_PATH', __DIR__ . '/../../db/library.db');
        // ruta absoluta
        $full = realpath(__DIR__ . '/../../') . '/' . ltrim($path, './');
        // si DB_PATH ya es absoluta, usarla
        if (file_exists($path)) $full = $path;
        $pdo = new PDO('sqlite:' . $full);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // activar claves foraneas
        $pdo->exec('PRAGMA foreign_keys = ON;');
        return $pdo;
    } else {
        // aquí podrías añadir mysql usando DSN, USER, PASS
        throw new Exception('driver no soportado');
    }
}
