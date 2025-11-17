<?php


// src/models/book.php
require_once __DIR__ . '/db.php';

class Book {
    static function all(): array {
        return db()->query("select * from books order by id desc")->fetchAll();
    }

    static function find(int $id) {
        $stmt = db()->prepare("select * from books where id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    static function create( array $data) {
        $stmt = db()->prepare("insert into books (title,author,year) values (?, ?, ?)");
        return $stmt->execute([$data['title'], $data['author'], $data['year'] ?? null]);
    }

    static function update(int $id, array $data) {
        $stmt = db()->prepare("update books set title=?, author=?, year=? where id=?");
        return $stmt->execute([$data['title'], $data['author'], $data['year'] ?? null, $id]);
    }

    static function delete(int $id) {
        $stmt = db()->prepare("delete from books where id=?");
        return $stmt->execute([$id]);
    }
    
}
