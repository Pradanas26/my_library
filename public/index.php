<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// iniciar sesión
if (session_status() === PHP_SESSION_NONE) session_start();

// tailwind
echo '<script src="https://cdn.tailwindcss.com"></script>';

// obtener URL
$url = $_GET['url'] ?? 'home/index';
$parts = explode('/', trim($url, '/'));

$controllerName = ucfirst(strtolower($parts[0])) . 'Controller';
$method = $parts[1] ?? 'index';
$param = $parts[2] ?? null;

// ruta correcta dels controllers des de public/
$controllerFile = __DIR__ . '/../src/controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require $controllerFile;
    $controller = new $controllerName();

    if (method_exists($controller, $method)) {
        $controller->$method($param);
        exit;
    } else {
        http_response_code(404);
        echo "<div class='min-h-screen flex items-center justify-center text-red-600 text-3xl font-bold'>404 - Método no encontrado: $method</div>";
        exit;
    }
} else {
    http_response_code(404);
    echo "<div class='min-h-screen flex items-center justify-center text-red-600 text-3xl font-bold'>404 - Controlador no encontrado: $controllerName</div>";
    exit;
}
