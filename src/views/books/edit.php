<?php require __DIR__ . '/../partials/header.php'; 
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-blue-200 to-blue-300 p-6">

  <div class="bg-white/70 backdrop-blur-xl border border-white/40 p-10 rounded-3xl shadow-2xl w-full max-w-xl">

    <!-- título -->
    <h1 class="text-4xl font-extrabold text-blue-800 mb-8 text-center drop-shadow">
      <?= isset($book) ? '✏️ Editar llibre' : ' Afegir llibre' ?>
    </h1>

    <!-- formulario -->
    <form action="/?url=books/update/<?= $book['id'] ?? '' ?>" method="post" class="space-y-6">

      <!-- campo: título -->
      <div>
        <label class="text-blue-900 font-semibold">Títol</label>
        <input 
          type="text" name="title"
          class="mt-1 w-full border border-gray-300 px-4 py-3 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
          placeholder="nom del llibre"
          value="<?= htmlspecialchars($book['title'] ?? '') ?>"
        >
      </div>

      <!-- campo: autor -->
      <div>
        <label class="text-blue-900 font-semibold">Autor</label>
        <input 
          type="text" name="author"
          class="mt-1 w-full border border-gray-300 px-4 py-3 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
          placeholder="nom de l'autor"
          value="<?= htmlspecialchars($book['author'] ?? '') ?>"
        >
      </div>

      <!-- campo: año -->
      <div>
        <label class="text-blue-900 font-semibold">Any</label>
        <input 
          type="number" name="year"
          class="mt-1 w-full border border-gray-300 px-4 py-3 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition"
          placeholder="XXXX"
          value="<?= htmlspecialchars($book['year'] ?? '') ?>"
        >
      </div>

      <!-- botones -->
      <div class="flex justify-between pt-6">

        <a href="/?url=books/index"
           class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium px-6 py-3 rounded-xl shadow transition transform hover:scale-105">
          ⬅ Tornar
        </a>

        <button 
          type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition transform hover:scale-105 hover:-translate-y-1">
          <?= isset($book) ? 'Actualitzar' : 'Guardar' ?>
        </button>

      </div>

    </form>
  </div>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>
