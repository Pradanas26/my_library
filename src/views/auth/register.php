<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8">
  <title>Registrar-se · My Library</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-200 via-blue-300 to-blue-400 flex items-center justify-center h-screen">
  <form action="?url=auth/doRegister" method="post" class="bg-white/90 backdrop-blur-md p-8 rounded-2xl shadow-lg w-96">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Crear compte</h1>
    <input type="email" name="email" placeholder="Correu" class="w-full p-3 border border-gray-300 rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    <input type="password" name="password" placeholder="Contrasenya" class="w-full p-3 border border-gray-300 rounded-lg mb-6 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    <button class="bg-blue-700 hover:bg-blue-800 text-white py-3 rounded-lg w-full font-semibold shadow-md transition">Registrar</button>
    <p class="mt-4 text-center text-sm text-gray-600">Ja tens un compte? <a href="?url=auth/login" class="text-blue-700 hover:underline">Inicia sessió</a></p>
  </form>
</body>
</html>
