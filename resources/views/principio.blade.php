<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clinica</title>
    <link rel="shortcut icon" href="{{ asset('imagenes/diente.png') }}" type="image/x-icon">

    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset('imagenes/diente.png') }}" type="image/x-icon">
</head>
<body id="principio" class="w-full h-screen flex items-center justify-center">
    <section class="w-full h-screen flex items-center justify-center flex-col">
    <div class="w-36 h-36 mb-2 bg-white rounded-full grid place-items-center border-teal-700 border-4">
        <img src="{{ asset('imagenes/diente2.png') }}" alt="" class="w-24 ">
    </div>
    <div class="w-6/12 cel:w-full h-36 mt-5 text-center flex items-center justify-center flex-col mb-5">
        <h2 class="font-bold text-white text-7xl cel:text-2xl md:text-3xl">Clínica odontológica</h2>
        <span class="text-2xl text-white mt-3">¡Hoy es un gran día para trabajar y sacarles una linda sonrisa a los clientes!.</span>
    </div>
    <a href="{{ route('login.index')}}" class="mt-10 w-56 h-14 rounded-full bg-gradient-to-r text-white text-xl from-emerald-500 to-teal-500 border-2 border-teal-700 grid place-items-center">Ir al login</a>
</section>
</body>
</html>