@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Mostrar cliente</span>
@endsection

{{-- @php
dd($cliente);
@endphp --}}
{{-- @php
dd($aClientes);
@endphp --}}

@section('contenido')
<section class="w-full h-screen flex items-center justify-center mb-5">
    <div class="w-8/12 h-screen bg-red-500">   
        <div class="w-11/12 h-full flex items-center justify-center flex-col ">
            <div class="w-full h-full flex items-center justify-around cel:flex-col">
                <div class="flex flex-col justify-center items-start w-5/12 cel:items-center cel:w-11/12">
                    <label for="txtNombre" class="text-white text-xl mb-4 cel:text-sm cel:text-center">Nombre</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="placeholder:text-white w-full h-8 border-b-2 border-black focus:outline-none cel:text-center" placeholder="{{$cliente->nombre}}" disabled>
                </div>            
                <div class="flex flex-col justify-center items-start w-5/12 cel:items-center cel:w-11/12">
                    <label for="txtApellido" class="text-white text-xl mb-4 cel:text-sm cel:text-center">Apellido</label>
                    <input type="text" name="txtApellido" id="txtApellido" class="placeholder:text-white w-full h-8 border-b-2 border-black focus:outline-none cel:text-center" placeholder="{{$cliente->apellido}}" disabled>
                </div>
            </div>
            <div class="w-full h-full  flex items-center justify-around cel:flex-col">
                <div class="flex flex-col justify-center items-start w-5/12 cel:items-center cel:w-11/12">
                    <label for="txtDni" class="text-white text-xl mb-4 cel:text-sm cel:text-center">Dni</label>
                    <input type="text" name="txtDni" id="txtDni" class="placeholder:text-white w-full h-8 border-b-2 border-black focus:outline-none cel:text-center" placeholder="{{$cliente->dni}}" disabled>
                </div>            
                <div class="flex flex-col justify-center items-start w-5/12 cel:items-center cel:w-11/12">
                    <label for="txtEdad" class="text-white text-xl mb-4 cel:text-sm cel:text-center">Edad</label>
                    <input type="text" name="txtEdad" id="txtEdad" class="placeholder:text-white w-full h-8 border-b-2 border-black focus:outline-none cel:text-center" placeholder="{{$cliente->edad}}" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="w-3/12 h-screen bg-teal-300 flex items-center justify-center flex-col">
       <div class="w-11/12 h-14 flex items-center justify-start">
        <span>Otros clientes disponibles</span>
       </div>
        <div class="w-11/12 h-5/6 flex items-start gap-4 justify-start flex-col overflow-y-auto overflow-x-auto">
        @foreach ($aClientes as $item)
            @if ($item->idCliente == $cliente->idCliente)
                <a href="" class="flex items-center justify-center decoration-transparent">
                    <i class="fa-solid fa-circle-user text-5xl text-teal-700"></i></td>
                    <span class="ml-3">{{$cliente->nombre}}</span>
                    <span class="ml-1">{{$cliente->apellido}}</span>
                </a>
            @else
            <a href="/inicio/cliente-mostrar/{{ $item->idCliente }}" class="flex items-center justify-center decoration-transparent">
                <i class="fa-solid fa-circle-user text-4xl text-white"></i></td>
                <span class="ml-3">{{ $item->nombre }}</span>
                <span class="ml-1">{{ $item->apellido }}</span>
            </a>
            @endif

        @endforeach
        </div>
    </div>
</section>
@endsection