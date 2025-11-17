<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8">
  <title>Inici · My Library</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-blue-50 to-blue-200 min-h-screen flex flex-col">

  <!-- HEADER -->
  <header class="px-8 py-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-blue-700">My library</h1>
    <nav class="hidden sm:flex gap-6 text-blue-700 font-medium">
      <a href="?url=auth/login" class="hover:text-blue-900">Inicia sessió</a>
      <a href="?url=auth/register" class="hover:text-blue-900">Registra’t</a>
    </nav>
  </header>

  <!-- HERO -->
  <section class="mt-6 flex flex-col lg:flex-row items-center justify-center gap-12 flex-1 px-10 text-center lg:text-left">

    <!-- Text -->
    <div class="max-w-xl">
      <h2 class="text-5xl font-extrabold text-gray-900 leading-tight">
        Organitza i descobreix la teva <span class="text-blue-700">Biblioteca Digital</span>
      </h2>

      <p class="text-gray-700 text-lg mt-4">
        Guarda els teus llibres, consulta’ls  i gestiona la teva col·lecció d’una manera senzilla i elegant.
      </p>

      <div class="mt-8 flex gap-6 justify-center lg:justify-start">
        <a href="?url=auth/login"
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg transition transform hover:scale-105">
          Inicia sessió
        </a>

        <a href="?url=auth/register"
           class="bg-white text-blue-700 border border-blue-400 hover:bg-blue-100 px-6 py-3 rounded-xl shadow-md transition transform hover:scale-105">
          Registra’t
        </a>
      </div>
    </div>

    <!-- Imagen -->
    <img src="https://cdn-icons-png.freepik.com/512/43/43876.png"
         alt="il·lustració de biblioteca"
         class="w-80 drop-shadow-xl animate-fadeIn">
  </section>

  <!-- CARDS INFO -->
  <section class="bg-white/60 backdrop-blur-lg py-10 mt-10">
    <h3 class="text-center text-2xl font-bold text-gray-800 mb-8">Què pots fer amb My Library?</h3>

    <div class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-10 px-6">

      <div class="bg-white p-5 rounded-2xl shadow hover:shadow-xl transition">
        <h4 class="font-bold text-lg text-blue-700">Gestiona els teus llibres</h4>
        <p class="text-gray-600 text-sm mt-2">Afegeix, consulta i organitza els teus llibres fàcilment.</p>
      </div>

      <div class="bg-white p-5 rounded-2xl shadow hover:shadow-xl transition">
        <h4 class="font-bold text-lg text-blue-700">Accés segur</h4>
        <p class="text-gray-600 text-sm mt-2">Només pots editar si tens sessió iniciada.</p>
      </div>

    </div>
  </section>
  <footer class="text-center text-gray-500 py-4 mt-1 border-t border-gray-300 ">
  <p>© <?= date('Y'); ?> My Library · creat per <span class="font-semibold text-blue-700">Alex</span></p>
</footer>

</body>

</html>

