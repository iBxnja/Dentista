
@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Nuevo odontograma</span>
@endsection
@section('contenido')
{{-- @dump($aClientes) --}}
<section class="w-full h-full flex items-center justify-center flex-col">
    <div class="w-full text-center">
        <h2 class="text-4xl text-teal-400">Nuevo odontograma</h2>
    </div>
   <form id="miFormulario" method="post" class="w-full h-full flex items-center justify-center flex-col">
        @csrf
        <input type="hidden" name="id" value="{{ isset($odontograma) ? $odontograma->idOdontograma : '0' }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="w-11/12 h-full my-10 py-10 flex shadow-md shadow-neutral-400 items-center justify-center bg-white border-l-8 border-l-teal-500 border-r-4 border-r-teal-500">
            <div class="w-2/12 bg-red-500 h-40"></div>
            <div class="w-9/12 h-full flex items-center justify-center">
                <div class="h-40 ml-5 w-3/12 bg-teal-400 grid place-items-center text-center">
                    <span class="text-2xl font-bold text-white">CIRCULO<br/>ODONTOLÓGICO<br/>CONCORDIA</span>
                </div>
                <div class="w-9/12 h-full flex items-start justify-center flex-col gap-8">
                    <div class="ml-10 flex flex-col w-72">
                        <label for="">OBRA SOCIAL:</label>
                        <input placeholder="IOSPE" class="border-transparent border-b-2 border-b-black py-1 focus:outline-none text-black" type="text" name="obraSocial" id="">
                    </div>
                    <div class="ml-10 flex flex-col w-72">
                        <label for="">CODIGO N°:</label>
                        <input placeholder="3333333" class="border-transparent border-b-2 border-b-black py-1 focus:outline-none text-black" type="text" name="codigo" id="">
                    </div>
                </div>
            </div>
        </div>

        @include('odontograma.odontograma1')
        @include('odontograma.odontograma2')
        @include('odontograma.odontograma3')
        @include('odontograma.odontograma4')
        @include('odontograma.crearOdontograma')



        <button type="submit" class="bg-teal-400 text-white shadow-md shadow-neutral-500 w-64 h-14 my-8 rounded-2xl" onclick="obtenerDatos()">Agregar</button>
   </form>
</section>





@endsection