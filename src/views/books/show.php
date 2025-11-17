<?php require __DIR__ . '/../partials/header.php'; 
$user = $_SESSION['user'] ?? null;

if(!$book) {
    echo "<p class='text-red-500 text-center mt-10'>Llibre no trobat.</p>";
    require __DIR__ . '/../partials/footer.php';
    exit;
}
?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-blue-200 to-blue-300 p-6">

  <div class="bg-white/70 backdrop-blur-xl border border-white/40 p-10 rounded-3xl shadow-2xl w-full max-w-3xl">

    <!-- TÍTOL + AUTOR -->
    <h1 class="text-4xl font-extrabold text-blue-800 mb-2 text-center drop-shadow">
      <?= htmlspecialchars($book['title']) ?>
    </h1>

    <p class="text-center text-gray-700 mb-10 text-lg font-medium">
      <?= htmlspecialchars($book['author']) ?> · <?= htmlspecialchars($book['year']) ?>
    </p>

    <!-- COMENTARIS -->
    <h2 class="text-2xl font-bold text-blue-700 mb-5">Comentaris</h2>

    <div class="space-y-4 mb-10">
      <?php if(!empty($comments)): ?>
        <?php foreach($comments as $c): ?>
          <div class="bg-white/80 p-4 rounded-xl shadow border border-gray-200">
            <p class="text-gray-800 leading-relaxed">
              <span class="font-semibold text-blue-700"><?= htmlspecialchars($c['email']) ?>:</span>
              <?= htmlspecialchars($c['description']) ?>
            </p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-gray-500 italic">Encara no hi ha comentaris.</p>
      <?php endif; ?>
    </div>

    <!-- FORMULARI PER AFEGIR COMENTARI -->
    <?php if(isset($_SESSION['user'])): ?>
      <form action="/?url=comments/store" method="post" class="space-y-6">
        <input type="hidden" name="book_id" value="<?= $book['id'] ?>">

        <div>
          <label class="text-blue-900 font-semibold">Afegeix un comentari</label>
          <textarea
            name="description"
            placeholder="escriu un comentari..."
            class="mt-1 w-full border border-gray-300 px-4 py-3 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none transition resize-none"
          ></textarea>
        </div>

        <div class="flex justify-between pt-4">
          <a href="/?url=books/index"
             class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium px-6 py-3 rounded-xl shadow transition transform hover:scale-105">
            ⬅ Tornar
          </a>

          <button
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition transform hover:scale-105 hover:-translate-y-1">
            Afegir comentari
          </button>
        </div>
      </form>

    <?php else: ?>
      <p class="text-gray-700 text-center mt-6 font-medium">
        Inicia sessió per afegir comentaris.
      </p>
    <?php endif; ?>

  </div>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>
