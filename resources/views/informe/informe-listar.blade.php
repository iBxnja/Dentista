@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Informe general</span>
@endsection
@section('contenido')
    <section class="w-full h-full flex items-center justify-center flex-col text-white mb-20">
        <div class="w-8/12 h-full flex items-center justify-center flex-col text-center my-5">
            <h2 class="text-teal-500 text-7xl font-bold">Informe de los registros totales del usuario</h2>
            <p class="text-neutral-500 text-center text-3xl font-light">El informe de los registros totales del usuario es importante para tener un numero total
                de los registros realizados.
            </p>
        </div>
        <div class="w-11/12 h-full items-center justify-center grid grid-cols-3 grid-rows-2 gap-20">
            <a href="{{route('cliente-listar')}}" class=" overflow-hidden decoration-transparent w-full/12 h-full bg-gradient-to-r text-white text-xl from-emerald-500 to-teal-500 rounded-xl border-4 border-teal-600 flex items-center justify-center flex-col py-5">
                <span class="text-2xl">Clientes totales: {{ $totalClientes }}</span>
            </a>                       
            <a href="{{route('notas-listar')}}" class=" overflow-hidden decoration-transparent w-full/12 h-full bg-gradient-to-r text-white text-xl from-emerald-500 to-teal-500 rounded-xl border-4 border-teal-600 flex items-center justify-center flex-col py-5">
                <span class="text-2xl">Notas totales: {{ $totalNotas }}</span>
            </a>                       
            <a href="{{route('imagenes')}}" class=" overflow-hidden decoration-transparent w-full/12 h-full bg-gradient-to-r text-white text-xl from-emerald-500 to-teal-500 rounded-xl border-4 border-teal-600 flex items-center justify-center flex-col py-5">
                <span class="text-2xl">Imagenes totales: {{ $totalImagenes }}</span>
            </a>                       
            <a href="{{route('cita-listar')}}" class=" overflow-hidden decoration-transparent w-full/12 h-full bg-gradient-to-r text-white text-xl from-emerald-500 to-teal-500 rounded-xl border-4 border-teal-600 flex items-center justify-center flex-col py-5">
                <span class="text-2xl">Citas totales: {{ $totalCalendario }}</span>
            </a>                       
            <a href="{{route('odontograma-listar')}}" class=" overflow-hidden decoration-transparent w-full/12 h-full bg-gradient-to-r text-white text-xl from-emerald-500 to-teal-500 rounded-xl border-4 border-teal-600 flex items-center justify-center flex-col py-5">
                <span class="text-2xl">Odontogramas totales: {{ $totalOdontograma }}</span>
            </a>                                            
            <div class="w-full/12 h-full bg-gradient-to-r text-white text-xl from-emerald-500 to-teal-500 rounded-xl border-4 border-teal-600 flex items-center justify-center flex-col py-5">
                @if(auth()->check())
                <span class="text-2xl font-semibold">Usuario</span>
                <span class="text-2xl font-semibold overflow-hidden ">{{ auth()->user()->name }}</span>
                @else
                <span class="text-2xl font-semibold overflow-hidden ">Usuario: Invitado</span>
                @endif
            </div>                       
        </div>
    </section>
@endsection

{{-- OLD SECTION --}}
{{-- <div class="shadow-md shadow-neutral-500 border-4 border-red-500 mt-5 mx-10 w-80 h-40 bg-red-400 rounded-xl flex items-center justify-center flex-col overflow-hidden">
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
</div> --}}