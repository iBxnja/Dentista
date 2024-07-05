@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Listado de clientes</span>
@endsection
@section('contenido')
    <section class="w-full h-full flex items-center justify-center flex-col">
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
            <a href="/inicio/cliente-nuevo">
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
                    <a href="/inicio/cliente-listar">
                        <button class="cel:my-4 cel:w-20 bg-green-400 cel:rounded-2xl cel:h-14
                        md:my-4 md:w-20 md:rounded-2xl md:h-12 md:ml-10
                        lg:my-4 lg:w-20 lg:rounded-2xl lg:h-14 lg:ml-10
                        xl:my-4 xl:w-20 xl:rounded-3xl xl:h-14 xl:ml-10 xl:text-lg
                        grid place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                          </svg>
                        </button>
                    </a>
                </div>
            <form class="w-full h-full flex items-center justify-center flex-col mb-5">
                <div class="w-11/12 h-20 bg-teal-300 flex items-center justify-start cel:justify-center shadow-md shadow-neutral-500">
                    <input type="text" name="buscarpor" id="buscarpor" class=" text-center cel:w-7/12 w-1/4 h-10 cel:ml-0 ml-5 rounded-lg border-2 border-black" placeholder="Buscar un cliente..." value="{{ $buscarpor }}">
                    <button type="submit" class="cel:w-20 w-40 h-10 bg-green-500 text-white ml-5 rounded-lg">Buscar</button>
                </div>
                <div class="w-11/12 h-full grid cel:grid-cols-1 place-items-center grid-cols-2 items-center justify-center">
                    @foreach ($aClientes as $clientes)
                            <div class="cel:w-full w-11/12 mt-5 cel:h-full h-72 text-white shadow-md shadow-neutral-500 flex flex-col items-start justify-center bg-gradient-to-tr from-teal-500 via-teal-300 to-teal-600 rounded-xl"> 
                                <h4 class="ml-8 text-4xl font-extrabold uppercase">{{$clientes->nombre}}</h4>
                                <h4 class="ml-8 text-4xl font-extrabold uppercase">{{$clientes->apellido}}</h4>
                                <span class="ml-8 font-thin text-lg my-1">Benjavallory@hotmail.com</span>
                                <span class="ml-8 font-thin text-lg">3454053077</span>
                                <div class="ml-8 flex w-full items-center justify-start cel:flex-col">
                                    <a href="" class="w-6/12 decoration-transparent text-white text-sm h-10 grid place-items-center rounded-lg bg-gradient-to-tr from-teal-600 via-teal-400 to-teal-600">VER HISTORIAL DEL CLIENTE</a>
                                    <span class="w-2/12 text-wihte text-sm h-10 grid place-items-center bg-gradient-to-tr from-teal-600 via-teal-400 to-teal-600 rounded-lg text-white ml-2">{{$clientes->dni}}</span>
                                    <span class="w-2/12 text-wihte text-sm h-10 grid place-items-center bg-gradient-to-tr from-teal-600 via-teal-400 to-teal-600 rounded-lg text-white ml-2">{{$clientes->edad}} AÑOS</span>
                                </div>
                                <div class="ml-8 mt-4 w-3/12 flex gap-5 items-center justify-start">
                                    <a href="{{ isset($clientes->idCliente) ? route('cliente.eliminar', ['id' => $clientes->idCliente]) : '' }}" class="cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full grid place-items-center cel:text-base text-3xl" name="btnEliminarCliente">
                                        <i class="fa-solid fa-trash text-white text-xl"></i>
                                    </a>
                                    <a href="/inicio/cliente-mostrar/{{ $clientes->idCliente }}" class="decoration-transparent cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full grid place-items-center cel:text-base text-3xl" name="btnEliminarCliente">
                                        <i class="fa-solid fa-eye text-white text-xl"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                    </table>
                </div>



            </form>
            
    </section>
    @endsection