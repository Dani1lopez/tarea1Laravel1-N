<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CDN tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN FontAwesome -->
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" 
    />
    <title>@yield('titulo')</title>
</head>
<body class="min-h-screen bg-gradient-to-br from-cyan-300 via-blue-200 to-indigo-300  flex flex-col">
    <!-- Título de la página / cabecera -->
    <header class="text-center mb-8">
        <h3 class="text-4xl font-extrabold text-indigo-900 drop-shadow-xl uppercase tracking-wide">
            @yield('cabecera')
        </h3>
    </header>

    <!-- Contenido principal -->
    <main class="w-full max-w-5xl mx-auto bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl p-8 flex-grow">
        @yield('contenido')
    </main>

    <!-- Sección de alertas (debajo, para que salgan estilo notificación) -->
    <section class="mt-4">
        <alertas>
            @yield('alertas')
        </alertas>
    </section>
</body>
</html>
