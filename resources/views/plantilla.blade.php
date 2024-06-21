<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dentista</title>
    <link rel="shortcut icon" href="{{ asset('imagenes/diente.png') }}" type="image/x-icon">
    <!-- Incluye Vite -->
    @vite('resources/css/app.css')

    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">

    <!-- jQuery UI - Asegúrate de incluirlo después de cargar jQuery -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Otros scripts que puedas necesitar -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')
</head>
<body class="flex items-center justify-center flex-col">
    <div class="fixed inset-0 -z-10 h-full w-full bg-white bg-[linear-gradient(to_right,#f0f0f0_1px,transparent_1px),linear-gradient(to_bottom,#f0f0f0_1px,transparent_1px)] bg-[size:6rem_4rem]"></div>    
    
    @include('header')
    <div class="w-11/12 h-10 flex items-center justify-start mt-3">
        @yield('breadcrumb')
    </div>

    <main class="w-full h-full">
        @yield('contenido')
    </main>

    @include('footer')
</body>
</html>
