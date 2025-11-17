<?php
// src/controllers/BooksController.php
require_once __DIR__ . '/../models/book.php';
require_once __DIR__ . '/../models/comment.php';

class BooksController {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    private function adminOnly() {
        if (!isset($_SESSION['user'])) {
            header('location: /?url=auth/login');
            exit;
        }
    }

    public function index() {
        $books = Book::all();
        require __DIR__ . '/../views/books/list.php';
    }

    public function show($id) {

    // $id ve del tercer segment de la URL
        $book = Book::find((int)$id);
        if(!$book) {
            echo "<div class='min-h-screen flex items-center justify-center text-red-500 text-2xl font-bold'>Llibre no trobat</div>";
            return;
        }

        $comments = Comment::byBook((int)$id);
        require __DIR__ . '/../views/books/show.php';
    }


    public function create() {
        $this->adminOnly();
        require __DIR__ . '/../views/books/create.php';
    }

    public function store() {
        $this->adminOnly();
        Book::create($_POST);
        header('location: /?url=books/index');
    }

    public function edit($id) {
        $this->adminOnly();
        $book = Book::find((int)$id);
        require __DIR__ . '/../views/books/edit.php';
    }

    public function update($id) {
        $this->adminOnly();

        // $id ve del tercer segment de la URL
        $bookId = (int)$id;

        // $_POST conté title, author, year
        Book::update($bookId, $_POST);

        // redirigeix a la llista de llibres
        header('location: /?url=books/index');
        exit;
    }


    public function delete($id) {
        $this->adminOnly();
        Comment::deleteByBook((int)$id);
        Book::delete((int)$id);
        header('location: /?url=books/index');
    }
}
