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
    <form class="w-full h-full flex items-center justify-center flex-col mb-5" action="{{ url('/inicio/cita-listado') }}">
        <div class="w-11/12 h-20 bg-teal-300 shadow-md shadow-neutral-500 flex items-center justify-start cel:justify-center">
            <input type="text" name="buscarpor" id="buscarpor" class="text-center cel:w-7/12 w-1/4 h-10 cel:ml-0 ml-5 rounded-lg border-2 border-black" placeholder="Buscar un cliente..." value="{{ $buscarpor }}">
            <button type="submit" class="cel:w-20 w-40 h-10 bg-green-500 text-white ml-5 rounded-lg">Buscar</button>
        </div>
        <div class="w-11/12 h-full grid cel:grid-cols-1 place-items-center grid-cols-2 items-center justify-center">
            @foreach ($aCalendario as $calendar)
            <div class="cel:w-full w-11/12 mt-5 cel:h-full relative h-52 text-white shadow-md shadow-neutral-500 flex flex-col items-start justify-center bg-gradient-to-tr from-teal-500 via-teal-300 to-teal-600 rounded-xl"> 
                <span class="ml-8 uppercase text-3xl font-bold">{{ $calendar->nombre}}</span>
                <span class="ml-8 uppercase font-semibold">{{ $calendar->fecha }} Hs</span>
                <span class="absolute top-6 right-6 w-14 h-14 bg-green-400 rounded-full grid place-items-center"><i class="fa-solid fa-calendar-days text-3xl"></i></span>
                <div class="ml-8 mt-4 w-3/12 flex gap-5 items-center justify-start">
                    <a href="{{ isset($calendar->idCalendario) ? route('cita.eliminar', ['id' => $calendar->idCalendario]) : '' }}" class="cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full grid place-items-center cel:text-base text-3xl" name="btnEliminarCliente">
                        <i class="fa-solid fa-trash text-white text-xl"></i>
                    </a>
                    <a href="/inicio/cita-listar" class="decoration-transparent cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full grid place-items-center cel:text-base text-3xl" name="btnEliminarCliente">
                        <i class="fa-solid fa-eye text-white text-xl"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </form>
</section>
@endsection
{{-- <tr class="shadow-md shadow-neutral-500 w-full cel:text-center flex cel:flex-col cel:h-full items-center justify-center text-center bg-teal-200 my-3 h-20">
    <td class="cel:w-full cel:py-3 w-1/12 cel:text-sm text-lg font-normal bg-teal-400 h-full grid place-items-center"><i class="fa-solid fa-circle-user text-5xl text-white"></i></td>
    <td class="cel:w-full w-4/12 cel:text-sm text-lg font-normal cel:block cel:mt-2">{{ $calendar->nombre}}</td>
    <td class="cel:w-full w-5/12 cel:text-sm text-lg font-normal  cel:block cel:mt-3">{{ $calendar->fecha }} Hs</td>
    <td class="cel:w-full w-2/12 cel:text-sm text-lg font-normal grid place-items-center cel:my-3">
        <a href="{{ isset($calendar->idCalendario) ? route('cita.eliminar', ['id' => $calendar->idCalendario]) : '' }}" class="decoration-transparent w-12 h-12 hover:w-14 hover:h-14 ease-in-out duration-100 cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full bg-white grid place-items-center cel:text-base text-3xl" name="btnEliminarCliente">
            <i class=" fa-solid fa-trash text-black text-xl"></i>
        </a>
    </td>
</tr> --}}