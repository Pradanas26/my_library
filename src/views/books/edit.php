<?php require __DIR__ . '/../partials/header.php'; 
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-300 p-6">
  <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-lg">
    <h1 class="text-3xl font-extrabold text-blue-700 mb-6 text-center">
      <?= isset($book) ? '✏️ Editar Llibre' : '📘 Afegir Llibre' ?>
    </h1>

    <form action="/?url=books/update/<?= $book['id'] ?>" method="post" class="space-y-5">
      <input type="text" name="title" placeholder="Títol" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition" value="<?= htmlspecialchars($book['title'] ?? '') ?>">

      <input type="text" name="author" placeholder="Autor" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition" value="<?= htmlspecialchars($book['author'] ?? '') ?>">

      <input type="number" name="year" placeholder="Any" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition" value="<?= htmlspecialchars($book['year'] ?? '') ?>">

      <div class="flex justify-between mt-6">
        <a href="/?url=books/index" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium px-5 py-2 rounded-lg transition">⬅ Tornar</a>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg transition">
          💾 Actualitzar
        </button>
      </div>
    </form>
  </div>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>
