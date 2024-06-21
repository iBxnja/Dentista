@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Calendario de citas</span>
@endsection
@section('contenido')
    <section class="w-full h-full grid place-items-center pb-5">
        @if(isset($error))
            <div class="w-11/12 cel:mt-5 cel:mb-2 cel:rounded-2xl h-16 bg-red-500 grid place-items-center">
                <h2 class="cel:text-base text-white">{{ $error }}</h2>
            </div>
        @endif
        @if(isset($mensaje))
            <div class="w-11/12 cel:mt-5 cel:mb-2 cel:rounded-2xl h-16 bg-green-500 grid place-items-center">
                <h2 class="cel:text-base text-white">{{ $mensaje }}</h2>
            </div>
        @endif

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
                    <a href="/inicio/cita-listado" class="decoration-transparent">
                        <button class="cel:my-4 cel:w-32 bg-green-400 cel:rounded-2xl cel:h-14
                        md:my-4 md:w-32 md:rounded-2xl md:h-12 md:ml-10
                        lg:my-4 lg:w-32 lg:rounded-2xl lg:h-14 lg:ml-10
                        xl:my-4 xl:w-32 xl:rounded-3xl xl:h-14 xl:ml-10 xl:text-lg
                        grid place-items-center text-white">
                        <span>Ver listado</span>
                        </button>
                    </a>
                </div>
        
        <div id='calendar' class="w-11/12 h-screen mb-5 "></div>
        
    </section>
@endsection

