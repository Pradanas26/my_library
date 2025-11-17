<?php require __DIR__ . '/../partials/header.php'; ?>

<main class="min-h-screen bg-gradient-to-br from-blue-100 via-blue-200 to-blue-300 text-blue-900">
  <div class="p-10 max-w-5xl mx-auto">
    <h1 class="text-4xl font-bold text-center mb-8">Els teus llibres</h1>

    <?php if(isset($_SESSION['user'])): ?>
      <div class="text-center mb-8">
        <a href="/?url=books/create" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition transform hover:scale-105">
          Afegir llibre
        </a>
      </div>
    <?php endif; ?>

    <div class="grid gap-6">
      <?php foreach($books as $b): ?>
        <div class="bg-white/90 backdrop-blur-md p-6 rounded-xl shadow-md hover:shadow-lg transition-all">
          <h3 class="font-bold text-2xl mb-2"><?= htmlspecialchars($b['title']) ?></h3>
          <p class="text-gray-700 mb-3"><?= htmlspecialchars($b['author']) ?> — <?= htmlspecialchars($b['year']) ?></p>
          <div class="flex gap-4">
            <a class="text-blue-600 hover:underline" href="/?url=books/show/<?= $b['id'] ?>">Veure</a>
            <?php if(isset($_SESSION['user'])): ?>
              <a class="text-green-600 hover:underline" href="/?url=books/edit/<?= $b['id'] ?>">Editar</a>
              <a class="text-red-600 hover:underline" href="/?url=books/delete/<?= $b['id'] ?>">Eliminar</a>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>