@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Listado de odontogramas</span>
@endsection
@section('contenido')
<div class="w-full h-full flex items-center justify-center flex-col">
    @if(isset($mensaje))
    <div class="w-11/12 cel:mt-5 cel:mb-2 cel:rounded-2xl h-16 bg-green-500 grid place-items-center">
        <h2 class="cel:text-base text-white">{{ $mensaje }}</h2>
    </div>
    @endif
    @if(isset($error))
    <div class="w-11/12 cel:mt-5 cel:mb-2 cel:rounded-2xl h-16 bg-red-500 grid place-items-center">
        <h2 class="cel:text-base text-white">{{ $error }}</h2>
    </div>
    @endif
    <div class="w-11/12 h-full flex items-center cel:justify-around">
        <a href="/inicio/odontograma-nuevo">
            <button class="cel:my-4 cel:w-20 bg-green-400 cel:rounded-2xl cel:h-14
                    md:my-4 md:w-20 md:rounded-2xl md:h-12
                    lg:my-4 lg:w-20 lg:rounded-2xl lg:h-14
                    xl:my-4 xl:w-20 xl:rounded-3xl xl:h-14 xl:text-lg
                    grid place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </button>
        </a>
        <a href="/inicio/odontograma-listar">
            <button class="cel:my-4 cel:w-20 bg-green-400 cel:rounded-2xl cel:h-14
                    md:my-4 md:w-20 md:rounded-2xl md:h-12 md:ml-10
                    lg:my-4 lg:w-20 lg:rounded-2xl lg:h-14 lg:ml-10
                    xl:my-4 xl:w-20 xl:rounded-3xl xl:h-14 xl:ml-10 xl:text-lg
                    grid place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
            </button>
        </a>
    </div>
    <form class="w-full h-full flex items-center justify-center flex-col">
        <div class="w-11/12 h-20 bg-teal-300 shadow-md shadow-neutral-500 flex items-center justify-start cel:justify-center">
            <input type="text" name="buscarpor" id="buscarpor"
                class=" text-center cel:w-7/12 w-1/4 h-10 cel:ml-0 ml-5 rounded-lg border-2 border-black"
                placeholder="Buscar un cliente..." value="{{ $buscarpor }}">
            <button type="submit" class="cel:w-20 w-40 h-10 bg-green-500 text-white ml-5 rounded-lg">Buscar</button>
        </div>
        <div class="w-11/12 h-20">
            <table class="w-full flex items-center justify-center flex-col">
                <thead
                    class="w-full flex items-center justify-center bg-teal-300 shadow-md shadow-neutral-500 mt-3 mb-3 h-24 cel:hidden">
                    <tr class="w-full flex items-center justify-center text-center">
                        <th class="w-1/12 cel:text-sm text-2xl cel:hidden"></th>
                        <th class="w-3/12 cel:text-sm text-2xl ">Cliente</th>
                        <th class="w-2/12 cel:text-sm text-2xl ">N° Odontograma</th>
                        <th class="w-4/12 cel:text-sm text-2xl ">Titular</th>
                        {{-- <th class="w-1/12 cel:text-sm text-2xl ">Piezas</th> --}}
                        <th class="w-2/12 cel:text-sm text-2xl"></th>
                    </tr>
                </thead>
                <tbody class="w-full flex items-center justify-center flex-col mt-">
                    @foreach ($aOdontograma as $odontograma)
                    <tr
                        class="shadow-md shadow-neutral-500 w-full flex cel:flex-col cel:h-full items-center justify-center text-center bg-teal-200 my-3 h-20">
                        <td
                            class="cel:w-full cel:py-3 w-1/12 cel:text-sm text-lg font-normal bg-teal-300 h-full grid place-items-center">
                            <img src="{{ asset('imagenes/cliente.png') }}" alt="Cliente" class="cel:w-10 w-10"></td>
                        <td class="cel:w-full w-3/12 cel:text-sm text-lg font-normal "> {{ $odontograma->cliente->nombre }} {{ $odontograma->cliente->apellido }}</td>
                        <td class="cel:w-full w-2/12 cel:text-sm text-lg font-normal ">{{$odontograma->numeroOdontograma}}</td>
                        <td class="cel:w-full w-4/12 cel:text-sm text-lg font-normal ">{{$odontograma->titular}}</td>
                        {{-- <td class="cel:w-full w-1/12 cel:text-sm text-lg font-normal ">{{$odontograma->piezasPadecientes}}</td> --}}
                        <td class="cel:w-full w-1/12 cel:text-sm text-lg font-normal grid place-items-center cel:my-3">
                            <a href="{{ isset($odontograma->idOdontograma) ? route('odontograma.eliminar', ['id' => $odontograma->idOdontograma]) : '' }}"
                                class="w-12 h-12 hover:w-14 hover:h-14 ease-in-out duration-100 cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full bg-white grid place-items-center cel:text-base text-3xl"
                                name="btnEliminarCliente">
                                <img src="{{ asset('imagenes/eliminar.png') }}" alt="" class="w-5">
                            </a>
                        </td>
                        <td class="cel:w-full w-1/12 cel:text-sm text-lg font-normal grid place-items-center cel:my-3">
                            <a href="/inicio/odontograma-mostrar/{{ $odontograma->idOdontograma }}" class="w-12 h-12 hover:w-14 hover:h-14 ease-in-out duration-100 cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full bg-white grid place-items-center cel:text-base text-3xl">
                                <img src="{{ asset('imagenes/ojo.png') }}" alt="" class="w-5">
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



    </form>
</div>

@endsection