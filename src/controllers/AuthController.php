<?php
// src/controllers/AuthController.php
require_once __DIR__ . '/../models/user.php';

class AuthController {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    public function login() {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function register() {
        require __DIR__ . '/../views/auth/register.php';
    }

    public function doLogin() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $user = User::findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header('location: /?url=books/index');
            exit;
        }
        $_SESSION['flash'] = 'usuario o contraseña incorrectos';
        header('location: /?url=auth/login');
        exit;
    }

    public function doRegister() {
        $email = $_POST['email'] ?? '';
        $pass = $_POST['password'] ?? '';
        if ($email === '' || $pass === '') {
            $_SESSION['flash'] = 'rellena todos los campos';
            header('location: /?url=auth/register');
            exit;
        }
        if (User::findByEmail($email)) {
            $_SESSION['flash'] = 'el email ya existe';
            header('location: /?url=auth/register');
            exit;
        }
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        User::create($email, $hash);
        $_SESSION['flash'] = 'usuario creado, inicia sesión';
        header('location: /?url=auth/login');
        exit;
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        unset($_SESSION['user']);
        session_destroy();
        header('location: /?url=home/index');
        exit;
    }
}
