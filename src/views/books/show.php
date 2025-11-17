<?php require __DIR__ . '/../partials/header.php'; 
$user = $_SESSION['user'] ?? null;

if(!$book) {
    echo "<p class='text-red-500 text-center mt-10'>Llibre no trobat.</p>";
    require __DIR__ . '/../partials/footer.php';
    exit;
}
?>


<main class="min-h-screen bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 text-white font-sans">
  <div class="max-w-3xl mx-auto p-10">
    <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl p-8 hover:scale-[1.01] transition-transform">
      
      <h1 class="text-4xl font-bold text-yellow-300 mb-3"><?= htmlspecialchars($book['title']) ?></h1>
      <p class="text-lg text-gray-200"><?= htmlspecialchars($book['author']) ?> — <?= htmlspecialchars($book['year']) ?></p>

      <h2 class="mt-8 text-2xl font-semibold text-yellow-200">Comentaris</h2>
      <div class="mt-4 space-y-3">
        <?php if(!empty($comments)): ?>
          <?php foreach($comments as $c): ?>
            <div class="bg-white/20 p-4 rounded-lg text-gray-100 shadow-sm hover:bg-white/30 transition-all">
              <?= htmlspecialchars($c['email']) . ': ' . htmlspecialchars($c['description']) ?>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-gray-400 italic">Encara no hi ha comentaris.</p>
        <?php endif; ?>
      </div>

      <?php if(isset($_SESSION['user'])): ?>
        <form action="/?url=comments/store" method="post" class="mt-6">
          <input type="hidden" name="book_id" value="<?= $book['id'] ?>"><input type="hidden" name="book_id" value="<?= $book['id'] ?>">
          <textarea name="description" class="w-full p-3 rounded-lg bg-white/10 text-white placeholder-gray-300 focus:ring-2 focus:ring-yellow-400 resize-none" placeholder="Escriu un comentari..."></textarea>
          <div class="flex justify-between mt-6">
            <a href="/?url=books/index" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium px-5 py-2 rounded-lg transition">⬅ Tornar</a>
            <button class="mt-3 bg-yellow-400 text-black px-6 py-2 rounded-lg font-semibold hover:bg-yellow-300 transition transform hover:scale-105 shadow-md">
              Afegir comentari
            </button>
          </div>
        </form>

      <?php else: ?>
        <p class="mt-6 text-gray-300">Inicia sessió per afegir comentaris.</p>
      <?php endif; ?>
    </div>
  </div>
</main>
