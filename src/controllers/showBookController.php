<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$stmt = $db->prepare("SELECT * FROM books WHERE id = :id");
$stmt->execute(['id' => $id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt2 = $db->prepare("
    SELECT comments.comment_text
    FROM comments
    INNER JOIN books ON books.id = comments.book_id
    WHERE books.id = :id
");
$stmt2->execute(['id' => $id]);
$comments = $stmt2->fetchAll(PDO::FETCH_COLUMN);

return view('showbook', [
    'book' => $book,
    'comments' => $comments
]);
