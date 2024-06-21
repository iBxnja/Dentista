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
            <form class="w-full h-full flex items-center justify-center flex-col">
                <div class="w-11/12 h-20 bg-teal-300 flex items-center justify-start cel:justify-center shadow-md shadow-neutral-500">
                    <input type="text" name="buscarpor" id="buscarpor" class=" text-center cel:w-7/12 w-1/4 h-10 cel:ml-0 ml-5 rounded-lg border-2 border-black" placeholder="Buscar un cliente..." value="{{ $buscarpor }}">
                    <button type="submit" class="cel:w-20 w-40 h-10 bg-green-500 text-white ml-5 rounded-lg">Buscar</button>
                </div>
                <div class="w-11/12 h-20">
                    <table class="w-full flex items-center justify-center flex-col">
                        <thead class="w-full flex items-center justify-center bg-teal-300 shadow-md shadow-neutral-500 mt-3 mb-3 h-24 cel:hidden">
                            <tr class="w-full flex items-center justify-center text-center">
                                <th class="w-1/12 cel:text-sm text-2xl cel:hidden"></th>
                                <th class="w-3/12 cel:text-sm text-2xl ">Nombre</th>
                                <th class="w-3/12 cel:text-sm text-2xl ">Apellido</th>
                                <th class="w-2/12 cel:text-sm text-2xl ">Dni</th>
                                <th class="w-1/12 cel:text-sm text-2xl ">Edad</th>
                                <th class="w-2/12 cel:text-sm text-2xl"></th>
                            </tr>
                        </thead>
                        <tbody class="w-full flex items-center justify-center flex-col mt-">
                            @foreach ($aClientes as $clientes)
                            <tr class="shadow-md shadow-neutral-500 w-full flex cel:flex-col cel:h-full items-center justify-center text-center bg-teal-200 my-3 h-20">
                                <td class="cel:w-full cel:py-3 w-1/12 cel:text-sm text-lg font-normal bg-teal-300 h-full grid place-items-center"><img src="{{ asset('imagenes/cliente.png') }}" alt="Cliente" class="cel:w-10 w-10"></td>
                                <td class="cel:w-full w-3/12 cel:text-sm text-lg font-bold hidden cel:block cel:mt-2">Nombre:</td>
                                <td class="cel:w-full w-3/12 cel:text-sm text-lg font-normal ">{{$clientes->nombre}}</td>
                                <td class="cel:w-full w-3/12 cel:text-sm text-lg font-bold hidden cel:block cel:mt-3">Apellido:</td>
                                <td class="cel:w-full w-3/12 cel:text-sm text-lg font-normal ">{{$clientes->apellido}}</td>
                                <td class="cel:w-full w-2/12 cel:text-sm text-lg font-bold hidden cel:block cel:mt-3">Dni:</td>
                                <td class="cel:w-full w-2/12 cel:text-sm text-lg font-normal ">{{$clientes->dni}}</td>
                                <td class="cel:w-full w-1/12 cel:text-sm text-lg font-bold hidden cel:block cel:mt-3">Edad:</td>
                                <td class="cel:w-full w-1/12 cel:text-sm text-lg font-normal ">{{$clientes->edad}}</td>
                                <td class="cel:w-full w-2/12 cel:text-sm text-lg font-normal grid place-items-center cel:my-3">
                                    <a href="{{ isset($clientes->idCliente) ? route('cliente.eliminar', ['id' => $clientes->idCliente]) : '' }}" class="w-12 h-12 hover:w-14 hover:h-14 ease-in-out duration-100 cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full bg-white grid place-items-center cel:text-base text-3xl" name="btnEliminarCliente">
                                        <img src="{{ asset('imagenes/eliminar.png') }}" alt="" class="w-5">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </form>


        {{-- <form class="w-full h-full flex items-center justify-center flex-col">
        

        <div class="w-10/12 h-20 bg-red-500 flex items-center justify-start mt-5">
            <input type="text" name="buscarpor" id="buscarpor" class="w-1/4 h-10 ml-5 rounded-lg border-2 border-black" value="{{ $buscarpor }}">
            <button type="submit" class="w-40 h-10 bg-blue-500 ml-5 rounded-lg">Search</button>
        </div>

        @foreach ($aClientes as $clientes)
        <div class="flex items-center justify-center w-10/12 my-5 h-24 bg-gradient-to-tr from-teal-300 via-teal-400 to-teal-300">
            <div class="w-6/12 h-16 flex items-start justify-center flex-col text-white">
                <h2 class="cel:ml-2 md:ml-5 lg:ml-5 xl:ml-7 text-sm font-thin">{{$clientes->nombre}}</h2>
                <h2 class="cel:ml-2 md:ml-5 lg:ml-5 xl:ml-7 text-3xl font-semibold">{{$clientes->apellido}}</h2>
            </div>
            <div class="w-2/12 h-16 grid place-items-center text-white">
                <h2 class="text-2xl font-semibold">{{$clientes->edad}}</h2>
            </div>
            
            <div class="w-4/12 h-16 flex items-center justify-around ">
                <a href="{{ isset($clientes->idCliente) ? route('cliente.eliminar', ['id' => $clientes->idCliente]) : '' }}" class="w-12 h-12 xl:hover:w-14 xl:hover:h-14 ease-in-out duration-100 xl:hover:bg-red-500  xl:hover:text-black rounded-full bg-white grid place-items-center cel:text-base text-3xl" name="btnEliminarCliente">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </a>
                <a href="" class="cel:text-base text-3xl" name="btnEliminarCliente">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                      </svg>
                      
                </a>
            </div>
        </div>
        @endforeach
        </form> --}}
    </section>
    @endsection