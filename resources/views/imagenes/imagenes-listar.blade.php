@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Listado de imagenes</span>
@endsection
@section('contenido')
    <section class="w-full h-full grid place-items-center">
        <div class="w-11/12 h-full flex items-center justify-center flex-col ">
            <div class="w-full h-full flex items-center cel:justify-around">
                <a href="/inicio/imagenes-nuevo">
                    <button class="cel:my-4 cel:w-20 bg-green-400 cel:rounded-2xl cel:h-14
                  md:my-4 md:w-20 md:rounded-2xl md:h-12
                  lg:my-4 lg:w-20 lg:rounded-2xl lg:h-14
                  xl:my-4 xl:w-20 xl:rounded-3xl xl:h-14 xl:text-lg
                  grid place-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-6 h-6 text-white">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
      </button>
                </a>
                <a href="/inicio/imagenes-listar">
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
            <form action="" class="w-full h-full flex items-center flex-col justify-center">
                <div class="shadow-md shadow-neutral-500 w-full h-20 bg-teal-300 flex items-center justify-start cel:justify-center">
                    <input type="text" name="buscarpor" id="buscarpor" class="text-center cel:w-7/12 w-1/4 h-10 cel:ml-0 ml-5 rounded-lg border-2 border-black" placeholder="Buscar un el titulo de una imagen..." value="{{ $buscarpor }}">
                    <button type="submit" class="cel:w-20 w-40 h-10 bg-green-500 text-white ml-5 rounded-lg">Buscar</button>
                </div>
            <div class="grid grid-cols-3 place-items-center justify-center items-center">
                <!--foreach-->
                @foreach ($aImagenes as $imagenes)   
                <div class="relative cel:text-center w-11/12 h-4/12 flex items-center justify-center flex-col my-10 border-b-2 border-black overflow-hidden">
                    <h2 class="mb-4 mt-2 text-xl font-medium shadow-md shadow-neutral-500 text-white bg-teal-300 w-full border-2 border-black tracking-widest rounded-lg h-16 grid place-items-center">{{ $imagenes->cliente->nombre }} {{ $imagenes->cliente->apellido }}</h2>
                    <h2 class="mb-2 font-semibold text-3xl text-teal-300 text-center ">{{ $imagenes->titulo }}</h2>
                    <p class="text-center w-full mb-2 font-thin">{{ $imagenes->texto }}</p>
                    <img src="{{asset($imagenes->imagen)}}" class="border-8 border-white w-full h-full">
                    <a href="{{ route('imagenes.eliminar', ['id' => $imagenes->idImagen]) }}" class="decoration-transparent absolute cel:bottom-4 cel:right-4 bottom-10 right-10 cel:text-base text-3xl cel:w-10 cel:h-10 w-14 h-14 ease-in-out duration-100 lg:hover:text-white xl:hover:text-white 2xl:hover:text-white rounded-full bg-white grid place-items-center border-2 border-black" name="btnEliminarCliente">
                        <i class=" fa-solid fa-trash text-black text-xl"></i>
                    </a>
                </div>
                @endforeach
            <!--endforeach-->
            </div>
        </form>
        </div>
    </section>
@endsection


{{-- <div class="relative cel:text-center cel:w-11/12 w-5/12 h-4/12 flex items-center justify-center flex-col my-10 border-b-2 border-black overflow-hidden">
                    <h2 class="mb-4 mt-2 text-xl font-medium shadow-md shadow-neutral-500 text-white bg-teal-300 w-full border-2 border-black tracking-widest rounded-lg h-16 grid place-items-center">{{ $imagenes->cliente->nombre }} {{ $imagenes->cliente->apellido }}</h2>
                    <h2 class="mb-2 font-semibold text-3xl text-teal-300 text-center ">{{ $imagenes->titulo }}</h2>
                    <p class="text-center w-full mb-2 font-thin">{{ $imagenes->texto }}</p>
                    <img src="{{asset($imagenes->imagen)}}" class="border-8 border-white w-full h-full">
                    <a href="{{ route('imagenes.eliminar', ['id' => $imagenes->idImagen]) }}" class="decoration-transparent absolute cel:bottom-4 cel:right-4 bottom-10 right-10 cel:text-base text-3xl cel:w-10 cel:h-10 w-14 h-14 ease-in-out duration-100 lg:hover:text-white xl:hover:text-white 2xl:hover:text-white rounded-full bg-white grid place-items-center border-2 border-black" name="btnEliminarCliente">
                        <i class=" fa-solid fa-trash text-black text-xl"></i>
                    </a>
                </div> --}}