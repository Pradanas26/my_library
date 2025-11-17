<?php
// src/models/user.php
require_once __DIR__ . '/db.php';

class User {
    static function findByEmail(string $email) {
        $stmt = db()->prepare("select * from users where email = ? limit 1");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    static function create(string $email, string $hash) {
        $stmt = db()->prepare("insert into users (email,password) values (?, ?)");
        return $stmt->execute([$email, $hash]);
    }
}
