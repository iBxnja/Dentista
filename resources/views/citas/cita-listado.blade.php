@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Listado de citas</span>
@endsection
@section('contenido')
<section class="w-full h-full flex items-center justify-center flex-col">
<div class="w-11/12 h-full flex items-center cel:justify-around">
    <a href="/inicio/cita-nuevo">
                <button class="cel:my-4 cel:w-20 bg-green-400 cel:rounded-2xl cel:h-14
                md:my-4 md:w-20 md:rounded-2xl md:h-12
                lg:my-4 lg:w-20 lg:rounded-2xl lg:h-14
                xl:my-4 xl:w-20 xl:rounded-3xl xl:h-14 xl:text-lg
                grid place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                  </svg>
                </button>
            </a>
            <a href="/inicio/cita-listar" class="decoration-transparent text-white">
                <button class="cel:my-4 cel:w-36 bg-green-400 cel:rounded-2xl cel:h-14
                md:my-4 md:w-36 md:rounded-2xl md:h-12 md:ml-10
                lg:my-4 lg:w-36 lg:rounded-2xl lg:h-14 lg:ml-10
                xl:my-4 xl:w-36 xl:rounded-3xl xl:h-14 xl:ml-10 xl:text-lg
                grid place-items-center">
                <span>Ver calendario</span>
                </button>
            </a>
        </div>
<form class="w-full h-full flex items-center justify-center flex-col" action="{{ url('/inicio/cita-listado') }}">
    <div class="w-11/12 h-20 bg-teal-300 shadow-md shadow-neutral-500 flex items-center justify-start cel:justify-center">
        <input type="text" name="buscarpor" id="buscarpor" class="text-center cel:w-7/12 w-1/4 h-10 cel:ml-0 ml-5 rounded-lg border-2 border-black" placeholder="Buscar un cliente..." value="{{ $buscarpor }}">
        <button type="submit" class="cel:w-20 w-40 h-10 bg-green-500 text-white ml-5 rounded-lg">Buscar</button>
    </div>
    <div class="w-11/12 h-20">
        <table class="w-full flex items-center justify-center flex-col">
            <thead class="w-full flex items-center justify-center bg-teal-300 shadow-md shadow-neutral-500 mt-3 mb-3 h-24 cel:hidden">
                <tr class="w-full flex items-center justify-center text-center">
                    <th class="w-1/12 cel:text-sm text-2xl cel:hidden"></th>
                    <th class="w-4/12 cel:text-sm text-2xl ">Nombre completo</th>
                    <th class="w-5/12 cel:text-sm text-2xl ">Cita</th>
                    <th class="w-2/12 cel:text-sm text-2xl"></th>
                </tr>
            </thead>
            <tbody class="w-full flex items-center justify-center flex-col mt-">
                @foreach ($aCalendario as $calendar)
                <tr class="shadow-md shadow-neutral-500 w-full cel:text-center flex cel:flex-col cel:h-full items-center justify-center text-center bg-teal-200 my-3 h-20">
                    <td class="cel:w-full cel:py-3 w-1/12 cel:text-sm text-lg font-normal bg-teal-400 h-full grid place-items-center"><img src="{{ asset('imagenes/cliente.png') }}" alt="Cliente" class="cel:w-10 w-10"></td>
                    <td class="cel:w-full w-4/12 cel:text-sm text-lg font-normal cel:block cel:mt-2">{{ $calendar->nombre}}</td>
                    <td class="cel:w-full w-5/12 cel:text-sm text-lg font-normal  cel:block cel:mt-3">{{ $calendar->fecha }} Hs</td>
                    <td class="cel:w-full w-2/12 cel:text-sm text-lg font-normal grid place-items-center cel:my-3">
                        <a href="{{ isset($calendar->idCalendario) ? route('cita.eliminar', ['id' => $calendar->idCalendario]) : '' }}" class="w-12 h-12 hover:w-14 hover:h-14 ease-in-out duration-100 cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full bg-white grid place-items-center cel:text-base text-3xl" name="btnEliminarCliente">
                            <img src="{{ asset('imagenes/eliminar.png') }}" alt="" class="w-5 text-white">
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>
@endsection