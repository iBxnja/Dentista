@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Informe general</span>
@endsection
@section('contenido')
    <section class="w-full h-full flex items-center justify-center flex-wrap text-white">
        <div class="shadow-md shadow-neutral-500 border-4 border-red-500 mt-5 mx-10 w-80 h-40 bg-red-400 rounded-xl flex items-center justify-center flex-col overflow-hidden">
            <h4 class="text-lg">Clientes Totales:</h4>
            <span class="text-6xl">{{ $totalClientes }}</span>
        </div>
        <div class="shadow-md shadow-neutral-500 border-4 border-blue-500 mt-5 mx-10 w-80 h-40 bg-blue-400 rounded-xl flex items-center justify-center flex-col overflow-hidden">
            <h4 class="text-lg">Notas Totales:</h4>
            <span class="text-6xl">{{ $totalNotas }}</span>
        </div>
        <div class="shadow-md shadow-neutral-500 border-4 border-yellow-500 mt-5 mx-10 w-80 h-40 bg-yellow-400 rounded-xl flex items-center justify-center flex-col overflow-hidden">
            <h4 class="text-lg">Imagenes Totales:</h4>
            <span class="text-6xl">{{ $totalImagenes }}</span>
        </div>
        <div class="shadow-md shadow-neutral-500 border-4 border-green-500 mt-5 mx-10 w-80 h-40 bg-green-400 rounded-xl flex items-center justify-center flex-col overflow-hidden">
            <h4 class="text-lg">Citas Totales:</h4>
            <span class="text-6xl">{{ $totalCalendario }}</span>
        </div>
        <div class="shadow-md shadow-neutral-500 border-4 border-pink-500 mt-5 mx-10 w-80 h-40 bg-pink-400 rounded-xl flex items-center justify-center flex-col overflow-hidden">
            <h4 class="text-lg">Odontogramas Totales:</h4>
            <span class="text-6xl">{{ $totalOdontograma }}</span>
        </div>
        <div class="shadow-md shadow-neutral-500 border-4 border-violet-500 mt-5 cel:mb-10 mx-10 w-80 h-40 bg-violet-400 rounded-xl flex items-center justify-center flex-col overflow-hidden">
            <h4 class="text-lg">Usuario:</h4>
            @if(auth()->check())
            <span class="text-xl font-semibold">{{ auth()->user()->name }}</span>
            @endif
        </div>
    </section>
@endsection