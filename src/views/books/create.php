<?php require __DIR__ . '/../partials/header.php'; ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<main class="min-h-screen bg-gradient-to-br from-blue-50 via-blue-100 to-blue-200 flex items-center justify-center p-8">
  <div class="bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-lg w-full max-w-lg">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800"><?= isset($book) ? 'Editar Llibre' : 'Afegir Llibre' ?></h1>

    <form action="/?url=books/store" method="post" class="space-y-4">
      <input type="text" name="title" placeholder="Títol" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $book['title'] ?? '' ?>">
      <input type="text" name="author" placeholder="Autor" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $book['author'] ?? '' ?>">
      <input type="number" name="year" placeholder="Any" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $book['year'] ?? '' ?>">
      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold shadow-md transition"><?= isset($book) ? 'Actualitzar' : 'Afegir' ?></button>
    </form>
  </div>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
