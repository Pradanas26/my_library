<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<header class="bg-white/80 backdrop-blur-md shadow-md">
  <div class="container mx-auto flex justify-between items-center py-4 px-6">
    <a href="/?url=home/index" class="text-2xl font-bold text-blue-700 hover:text-blue-800 transition">My Library</a>
    <nav class="flex gap-4 text-gray-700 font-medium">
      <a href="/?url=books/index" class="hover:text-blue-600 transition">Llibres</a>
      <?php if(isset($_SESSION['user'])): ?>
        <a href="/?url=auth/logout" class="hover:text-red-600 transition">Tancar sessió</a>
      <?php else: ?>
        <a href="/?url=auth/login" class="hover:text-blue-600 transition">Inicia sessió</a>
        <a href="/?url=auth/register" class="hover:text-green-600 transition">Registra’t</a>
      <?php endif; ?>
    </nav>
  </div>
</header>
