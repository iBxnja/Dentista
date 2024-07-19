@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Nuevo cliente</span>
@endsection
@section('contenido')
{{-- ('Cita','Odontograma','nota','imagen', 'cliente') --}}
@php
    // print_r($cliente);
    // dd($Cita);
    // dd($Odontograma);
    // dd($nota);
    // dd($imagen);
@endphp

<section class="w-full h-screen flex items-center justify-center mb-5">
    <div class="w-full flex items-center justify-center ">
        <div class="w-7/12 h-5/6 flex items-start justify-center flex-col">
            <div class="w-full flex items-center justify-start text-black">
                <i class="fa-solid fa-circle-user text-7xl text-teal-500"></i>
                <h4 class="mx-2 uppercase">{{$cliente->nombre}}</h4>
                <h4 class="mr-5 uppercase">{{$cliente->apellido}}</h4>
                <span class="w-auto px-2 mb-1 py-1 border-2 border-teal-600 rounded-xl bg-teal-500 text-white">Viendo a este cliente</span>
            </div>
            <div class="w-full flex items-start justify-center flex-col text-black">
                <h4 class="mt-3 text-xl text-teal-500">Observación</h4>
                <p class="font-light text-lg w-11/12 h-24 overflow-y-scroll">{{$cliente->observacion}}</p>
            </div>

            <div class="w-full flex items-start justify-center flex-col text-black">
                <h4 class="mt-3 text-xl text-teal-500">Correo electronico</h4>
                <span class="font-light text-lg">
                    <i class="fa-solid fa-envelope text-teal-500"></i>
                    <span class="ml-2">{{$cliente->correo}}</span>
                </span>
            </div>
            <div class="w-full mt-3 flex items-start justify-center flex-col text-black">
                <h4 class="mt-3 text-xl text-teal-500">Documento</h4>
                <span class="font-light text-lg">
                    <i class="fa-solid fa-id-card-clip text-teal-500"></i>
                    <span class="ml-2">{{$cliente->dni}}</span>
                </span>
            </div>
            <div class="w-full mt-3 flex items-start justify-center flex-col text-black">
                <h4 class="mt-3 text-xl text-teal-500">Celular</h4>
                <span class="font-light text-lg">
                    <i class="fa-solid fa-phone text-teal-500"></i>
                    <span class="ml-2">{{$cliente->celular}}</span>
                </span>
            </div>
        </div>
        <div class="w-3/12 h-5/6 flex items-start justify-center flex-col">
            <div class="w-full flex items-start justify-center flex-col text-black">
                <h4 class="text-xl text-teal-500">Edad</h4>
                <span class="font-light text-lg">
                    <i class="fa-solid fa-pager text-teal-500"></i>
                    <span class="ml-2">{{$cliente->edad}} Años</span>
                </span>
            </div>
            <div class="mt-5 w-full flex items-start justify-center flex-col text-black">
                <h4 class="mt-2 text-xl text-teal-500">Ver otro cliente</h4>
                <div class="w-full h-80 overflow-y-scroll overflow-x-clip flex flex-col">
                    @php $activoMostrado = false; @endphp
                    @foreach ($aClientes as $item)
                        @if ($item->idCliente == $cliente->idCliente)
                            @php $activoMostrado = true; @endphp
                            <a href="/inicio/cliente-mostrar/{{ $item->idCliente }}" class="text-sm text-white w-11/12 min-h-10 max-h-10 rounded-full shadow-md shadow-neutral-300 hover:bg-teal-700 bg-teal-600 overflow-x-clip flex items-center justify-start decoration-transparent mt-4">
                                <span class="ml-3">{{$item->nombre}}</span>
                                <span class="ml-1">{{$item->apellido}}</span>
                            </a>
                        @else
                            <a href="/inicio/cliente-mostrar/{{ $item->idCliente }}" class="text-sm text-white w-10/12 min-h-8 max-h-8 rounded-full shadow-md shadow-neutral-300 hover:bg-teal-500 bg-teal-400 overflow-x-clip flex items-center justify-start decoration-transparent mt-4">
                                <span class="ml-3">{{$item->nombre}}</span>
                                <span class="ml-1">{{$item->apellido}}</span>
                            </a>
                        @endif
                    @endforeach
                    @if (!$activoMostrado)
                        <a href="/inicio/cliente-mostrar/{{ $cliente->idCliente }}" class="text-sm text-white w-11/12 min-h-10 max-h-10 rounded-full shadow-md shadow-neutral-300 hover:bg-teal-700 bg-teal-600 overflow-x-clip flex items-center justify-start decoration-transparent mt-4">
                            <span class="ml-3">{{$cliente->nombre}}</span>
                            <span class="ml-1">{{$cliente->apellido}}</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w-full h-full flex items-center justify-center mb-5">
    


    
</section>
@endsection