<?php
// src/models/comment.php
require_once __DIR__ . '/db.php';

class Comment {

    // Obtenir comentaris d’un llibre amb el mail de l’usuari
    static function byBook(int $bookId): array {
        $stmt = db()->prepare("
            SELECT c.*, u.email 
            FROM comments c 
            JOIN users u ON c.user_id = u.id
            WHERE c.book_id = ? 
            ORDER BY c.id DESC
        ");
        $stmt->execute([$bookId]);
        return $stmt->fetchAll();
    }

    // Crear un comentari associat a un usuari
    static function create(int $bookId, int $userId, string $description) {
        $stmt = db()->prepare("
            INSERT INTO comments (description, book_id, user_id) 
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$description, $bookId, $userId]);
    }

    // Esborrar tots els comentaris d’un llibre (si cal)
    static function deleteByBook(int $bookId) {
        $stmt = db()->prepare("DELETE FROM comments WHERE book_id = ?");
        return $stmt->execute([$bookId]);
    }
}
