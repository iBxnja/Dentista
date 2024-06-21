@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Listado de notas</span>
@endsection
@section('contenido')
<section class="w-full h-full flex items-center justify-center flex-col">
  <div class="w-11/12 h-full flex items-center cel:justify-around">
    <a href="/inicio/notas-nuevo">
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
    <a href="/inicio/cliente-listar">
      <button class="cel:my-4 cel:w-20 bg-green-400 cel:rounded-2xl cel:h-14
                  md:my-4 md:w-20 md:rounded-2xl md:h-12 md:ml-10
                  lg:my-4 lg:w-20 lg:rounded-2xl lg:h-14 lg:ml-10
                  xl:my-4 xl:w-20 xl:rounded-3xl xl:h-14 xl:ml-10 xl:text-lg
                  grid place-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-6 h-6 text-white">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
        </svg>
      </button>
    </a>
  </div>
  <form action="" class="w-full h-full flex items-center flex-col justify-center">
    <div class="shadow-md shadow-neutral-500 w-11/12 h-20 bg-teal-300 flex items-center justify-start cel:justify-center">
      <input type="text" name="buscarpor" id="buscarpor" class="text-center cel:w-7/12 w-1/4 h-10 cel:ml-0 ml-5 rounded-lg border-2 border-black" placeholder="Buscar una titulo" value="{{ $buscarpor }}">
      <button type="submit" class="cel:w-20 w-40 h-10 bg-green-500 text-white ml-5 rounded-lg">Buscar</button>
    </div>
    
    
    
    <div class="w-11/12 h-full flex items-center justify-around mt-3 flex-wrap cel:justify-center cel:flex-col">
      <!--foreach-->
      @foreach ($aNota as $nota)
          <div class="w-96 cel:w-full h-56 mt-4 mb-4 bg-neutral-100 text-black border-2 border-neutral-600 shadow-md shadow-neutral-500 flex items-center justify-center flex-col">
            <div class="w-full h-12  overflow-hidden">
              <h2 class="text-base font-normal mt-2 ml-2">{{ $nota->cliente->nombre }} {{ $nota->cliente->apellido }}</h2>
            </div>
            <div class="w-full h-14  overflow-hidden">
              <h2 class="text-xl ml-2">{{ $nota->titulo }}</h2>
            </div>
            <div class="w-full h-6 mb-2">
              <span class="font-thin ml-2">Numero de sesión: {{ $nota->numeroSesion }}</span>
            </div>
            <div class="w-full h-14 flex items-center justify-start">
              <a href="/inicio/notas-mostrar/{{ $nota->idNota }}" class="ml-2"><img src="{{ asset('imagenes/ojo.png') }}" class="w-8"></a>
              <a href="{{ route('notas.eliminar', ['id' => $nota->idNota]) }}" class="ml-8" ><img src="{{ asset('imagenes/eliminar.png') }}" class="w-5"></a>
            </div>
          </div>
      @endforeach
      <!--endforeach-->
  </div>
  </form>
</section>
@endsection


{{-- 
  {{ $nota->numeroSesion }}
  <a href="{{ route('notas.eliminar', ['id' => $nota->idNota]) }}" class="absolute bg-white border-2 border-teal-400 w-12 h-12 rounded-tl-3xl rounded-br-3xl top-5 right-5 text-white text-2xl font-bold grid place-items-center" ></a>
  {{ $nota->numeroSesion }}
|  {{ $nota->cliente->nombre }} {{ $nota->cliente->apellido }}
|  {{ $nota->titulo }}
                <a href="/inicio/notas-mostrar/{{ $nota->idNota }}" class="decoration-transparent text-white w-11/12 bg-teal-400 border-2 border-teal-500 grid place-items-center h-12 absolute bottom-4">Leer la nota</a>
  --}}