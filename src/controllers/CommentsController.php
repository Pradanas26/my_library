<?php
// src/controllers/CommentsController.php
require_once __DIR__ . '/../models/comment.php';

class CommentsController {

    public function store() {
        if(session_status() === PHP_SESSION_NONE) session_start();

        if(!isset($_SESSION['user'])) {
            header('location: /?url=auth/login');
            exit;
        }

        $bookId = $_POST['book_id'] ?? null;
        $description = trim($_POST['description'] ?? '');

        if($bookId && $description !== '') {
            Comment::create((int)$bookId, $_SESSION['user']['id'], $description);
        }

        // redirigim passant l'ID com a tercer segment perquè el router el pugui agafar com $param
        header('location: /?url=books/show/' . $bookId);
        exit;
    }
}
