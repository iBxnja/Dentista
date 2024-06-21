@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Mostrar nota seleccionada</span>
@endsection
@section('contenido')
<section class="w-full h-full flex items-center justify-center flex-col pb-5">
    <div class="w-11/12 overflow-auto text-center h-full border-b-2 border-black my-4 grid place-items-center">
        <h2 class="text-xl py-3">{{ $nota->titulo }}</h2>
    </div>
    <div class="w-11/12 h-full cel:flex-col cel:text-center bg-teal-300 flex items-center justify-center shadow-md shadow-neutral-500">
        <div class="w-2/4 cel:w-full h-80 flex cel:items-center items-start justify-center flex-col text-white">
            <span class="cel:ml-0 ml-7 cel:text-2xl text-3xl mb-3 font-semibold">Datos correspondiente de la nota seleccionada.</span>
            <span class="cel:ml-0 ml-7 text-2xl font-semibold">Nombre:</span>
            <h4 class="cel:ml-0 ml-7 text-base mb-4">{{ $nota->cliente->nombre }}</h4>
            <span class="cel:ml-0 ml-7 text-2xl font-semibold">Apellido:</span>
            <h4 class="cel:ml-0 ml-7 text-base">{{ $nota->cliente->apellido }}</h4>
        </div>
        <div class="w-2/4 cel:w-full h-80 flex items-center justify-center flex-col text-white">
            <span class="font-medium text-2xl">Numero de sesión</span>
            <h2 class="text-9xl">{{ $nota->numeroSesion }}</h2>
        </div>
    </div>
    <div class="w-11/12 h-full bg-teal-300 flex items-start flex-col justify-center mt-5 shadow-md shadow-neutral-500">
        <span class="text-xl font-semibold py-3 ml-7 text-white">Texto correspondiente a la nota seleccionada.</span>
        <div class="w-full h-full bg-white">
            <p class="ml-7 mr-7 mb-7 mt-7">{{ $nota->texto }}</p>
        </div>
    </div>
</section>
@endsection
{{-- <h2>{{ $nota->titulo }}</h2>
<h2>{{ $nota->numeroSesion }}</h2>
<h2>{{ $nota->cliente->nombre }} {{ $nota->cliente->apellido }}</h2>
<p>{{ $nota->texto }}</p> --}}