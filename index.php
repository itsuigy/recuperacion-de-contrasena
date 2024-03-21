<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Practico 4. Recuperación de contraseña</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="index.css">
</head>

<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Ejercicio Practico 4. Recuperación de contraseña</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" onclick="github()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">GitHub</button>
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Abrir menú</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
    </div>
  </nav>

<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-96">
            <form id="loginForm" class="slide-in" action="login.php" method="POST">
                <h2 class="text-2xl font-bold mb-4">Iniciar sesión</h2>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo electrónico:</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <a href="#" class="text-blue-500 hover:underline" onclick="showForgotPasswordForm()">¿Olvidaste tu contraseña?</a>
                    <a href="#" class="text-blue-500 hover:underline" onclick="showRegistrationForm()">Registrarse</a>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Iniciar sesión</button>
            </form>
            <form id="registrationForm" style="display: none;" class="slide-in" action="register.php" method="POST">
                <h2 class="text-2xl font-bold mb-4">Registrarse</h2>
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo electrónico:</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="contrasena" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <a href="#" class="text-blue-500 hover:underline" onclick="showLoginForm()">Iniciar sesión</a>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Registrarse</button>
            </form>
            <form id="forgotPasswordForm" style="display: none;" class="slide-in" action="forgot.php" method="POST">
                <h2 class="text-2xl font-bold mb-4">Recuperar contraseña</h2>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo electrónico:</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="newPassword" class="block text-gray-700 text-sm font-bold mb-2">Nueva contraseña:</label>
                    <input type="password" id="newPassword" name="newPassword" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="confirmPassword" class="block text-gray-700 text-sm font-bold mb-2">Confirmar contraseña:</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <a href="#" class="text-blue-500 hover:underline" onclick="showLoginForm()">Iniciar sesión</a>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Recuperar contraseña</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>