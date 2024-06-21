@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Nueva cita</span>
@endsection
@section('contenido')
    <section class="w-full h-full flex items-center justify-center flex-col">
        <!-- formulario en la vista 'cita-nuevo' -->
        <form id="formulario-cita" action="{{ route('cita-nuevo-crear') }}" method="POST" class="w-11/12 h-full flex items-center justify-center flex-col">
            @csrf
            <h2 class="text-4xl mt-10 text-teal-400">Nueva cita</h2>
            <div class="w-full h-full flex items-center justify-center flex-col my-5">
                <label for="nombre" class="text-xl cel:text-sm cel:text-center">Nombre completo</label>
                <input type="text" name="nombre" required placeholder="Escribe el nombre del cliente. Ej: Daniela Mercedes" class="w-5/12 h-8 border-b-2 border-black focus:border-teal-500 mt-4 text-center focus:outline-none">
            </div>
            <div class="w-full h-full flex items-center justify-center flex-col ">
                <label for="fecha" class="text-xl cel:text-sm cel:text-center">Fecha de la cita</label>
                <input type="datetime-local" name="fecha" required class="cel:w-11/12 mt-4 text-center w-5/12 mb-5 h-8 border-b-2 border-black cel:text-center focus:outline-none">
            </div>
            <button type="submit" onclick="crearCita()" class="bg-teal-400 text-white shadow-md shadow-neutral-500 w-64 h-14 rounded-2xl mb-4">Agendar Cita</button>
        </form>
    </section>
@endsection

