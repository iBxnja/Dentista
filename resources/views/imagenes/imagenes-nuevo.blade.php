@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Nueva imagen</span>
@endsection
@section('contenido')
<section class="w-full h-full grid place-items-center pb-10">
        @if(isset($error))
        <div class="w-11/12 cel:mt-5 cel:mb-2 cel:rounded-2xl h-16 bg-red-500 grid place-items-center">
            <h2 class="cel:text-base text-white">{{ $error }}</h2>
        </div>
        @endif
        @if(isset($mensaje))
        <div class="w-11/12 cel:mt-5 cel:mb-2 cel:rounded-2xl h-16 bg-green-500 grid place-items-center">
            <h2 class="cel:text-base text-white">{{ $mensaje }}</h2>
        </div>
        @endif
    <form id="" method="POST" enctype="multipart/form-data" class="w-11/12 h-full flex items-center justify-center flex-col mt-10">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="id" value="{{ isset($imagenes) ? $imagenes->idImagen : '0' }}">
        <h2 class="text-4xl text-teal-400">Nueva Imagen</h2>
        <div class="w-11/12 h-full flex items-center justify-center flex-col mt-10">
            <div class="w-full h-full flex flex-col items-center justify-around">
                <div class="flex flex-col justify-center items-center w-5/12 cel:w-full">
                    <label for="lstfk_idCliente" class="text-xl mb-4">Cliente</label>
                    <select name="lstfk_idCliente" id="lstfk_idCliente" class="w-full h-8 border-b-2 border-black focus:outline-none appearance-none text-center">
                        <option value="" disabled selected>Selecciona un cliente</option>
                        @foreach ($aCliente as $cliente)
                            <option value="{{ $cliente->idCliente }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                        @endforeach
                    </select>   
                </div>
                <div class="flex flex-col justify-center items-center w-5/12 mt-7 cel:w-full">
                    <label for="txtTitulo" class="text-xl mb-4">Titulo</label>
                    <input type="text" name="txtTitulo" id="txtTitulo" class="w-full h-8 border-b-2 border-black focus:outline-none text-center" placeholder="Escribe el titulo de la imagen">
                </div>
                <div class="flex flex-col justify-center items-center w-5/12 mt-7 cel:w-full">
                    <label for="txtTexto" class="text-xl mb-4">Observación</label>
                    <textarea type="text" name="txtTexto" id="txtTexto" class="w-full h-40 resize-none rounded-lg border-2 border-black text-center" placeholder="Escribe la observación de la imagen"></textarea>
                </div>
                <div class="flex flex-col justify-center items-center w-5/12 mt-7 cel:w-full">
                    <label for="imagen" class="text-xl mb-4">Selecciona la imagen</label>
                    <input type="file" name="imagen" id="imagen" accept=".jpg, .png, .jpeg" required class="w-full h-8">
                </div>
            </div>            
        </div>
    </div>
    <button type="submit" name="btnAgregar" class="bg-teal-400 shadow-md shadow-neutral-500 text-white w-64 h-20 mt-8 rounded-2xl">Agregar</button>
    </form>
</section>
@endsection