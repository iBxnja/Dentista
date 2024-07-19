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
    <form class="w-full h-full flex items-center justify-center flex-col ">
        <div class="w-11/12 h-20 bg-teal-300 shadow-md shadow-neutral-500 flex items-center justify-start cel:justify-center">
            <input type="text" name="buscarpor" id="buscarpor"
                class=" text-center cel:w-7/12 w-1/4 h-10 cel:ml-0 ml-5 rounded-lg border-2 border-black"
                placeholder="Buscar un cliente..." value="{{ $buscarpor }}">
            <button type="submit" class="cel:w-20 w-40 h-10 bg-green-500 text-white ml-5 rounded-lg">Buscar</button>
        </div>
        <section class="flex items-center justify-center w-full h-full">
            <div class="h-full min-h-screen w-11/12 mt-5 pt-12 p-4">
                <div class="grid grid-cols-3 gap-14 md:grid-cols-3 md:gap-5">
                    @foreach ($aOdontograma as $odontograma)
                    <div class="rounded-xl bg-white p-6 text-center flex items-center justify-center flex-col shadow-md shadow-neutral-400">
                        <div class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full bg-teal-400 shadow-md shadow-neutral-400">
                            <svg viewBox="0 0 33 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white">
                            <path
                          d="M24.75 23H8.25V28.75H24.75V23ZM32.3984 9.43359L23.9852 0.628906C23.5984 0.224609 23.0742 0 22.5242 0H22V11.5H33V10.952C33 10.3859 32.7852 9.83789 32.3984 9.43359ZM19.25 12.2188V0H2.0625C0.919531 0 0 0.961328 0 2.15625V43.8438C0 45.0387 0.919531 46 2.0625 46H30.9375C32.0805 46 33 45.0387 33 43.8438V14.375H21.3125C20.1781 14.375 19.25 13.4047 19.25 12.2188ZM5.5 6.46875C5.5 6.07164 5.80766 5.75 6.1875 5.75H13.0625C13.4423 5.75 13.75 6.07164 13.75 6.46875V7.90625C13.75 8.30336 13.4423 8.625 13.0625 8.625H6.1875C5.80766 8.625 5.5 8.30336 5.5 7.90625V6.46875ZM5.5 12.2188C5.5 11.8216 5.80766 11.5 6.1875 11.5H13.0625C13.4423 11.5 13.75 11.8216 13.75 12.2188V13.6562C13.75 14.0534 13.4423 14.375 13.0625 14.375H6.1875C5.80766 14.375 5.5 14.0534 5.5 13.6562V12.2188ZM27.5 39.5312C27.5 39.9284 27.1923 40.25 26.8125 40.25H19.9375C19.5577 40.25 19.25 39.9284 19.25 39.5312V38.0938C19.25 37.6966 19.5577 37.375 19.9375 37.375H26.8125C27.1923 37.375 27.5 37.6966 27.5 38.0938V39.5312ZM27.5 21.5625V30.1875C27.5 30.9817 26.8847 31.625 26.125 31.625H6.875C6.11531 31.625 5.5 30.9817 5.5 30.1875V21.5625C5.5 20.7683 6.11531 20.125 6.875 20.125H26.125C26.8847 20.125 27.5 20.7683 27.5 21.5625Z"
                          fill="white"></path></svg>
                        </div>
                        <h4 class="w-10/12 max-h-16 text-darken mb-3 text-2xl font-medium lg:px-14 overflow-hidden">{{ $odontograma->cliente->nombre}} {{ $odontograma->cliente->apellido}}</h4>
                        <p class="text-gray-500 w-full">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo iure inventore amet modi accusantium vero perspiciatis, incidunt dicta sed aspernatur!</p>
                        <div class="w-full flex gap-5 items-center justify-center">
                            <a href="/inicio/odontograma-mostrar/{{ $odontograma->idOdontograma }}" class="decoration-transparent cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full grid place-items-center cel:text-base text-3xl" name="btnEliminarCliente">
                                <i class="fa-solid fa-eye text-black text-xl"></i>
                            </a>
                            <a href="{{ isset($odontograma->idOdontograma) ? route('odontograma.eliminar', ['id' => $odontograma->idOdontograma]) : '' }}" class="decoration-transparent cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full grid place-items-center cel:text-base text-3xl" name="btnEliminarCliente">
                                <i class="fa-solid fa-trash text-black text-xl"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>  
            </div>
        </section>
    </form>
</div>
@endsection




{{-- 


<div class="w-11/12 h-full grid grid-cols-3 place-items-center items-center mb-10">
            @foreach ($aOdontograma as $odontograma)
            <div class="relative shadow-md shadow-neutral-500 w-11/12 h-96 bg-gradient-to-tr from-teal-500 via-teal-300 to-teal-600 rounded-xl mt-4 flex items-start justify-center flex-col">
                <span class="absolute top-5 right-5 w-auto px-3 py-2 border-2 border-teal-600 rounded-full bg-green-400  text-white">{{$odontograma->numeroOdontograma}}</span>
                <h4 class="ml-3 mt-3 text-white">Nombre del cliente:</h4>
                @if ($odontograma->cliente)
                    <h4 class="ml-3 font-light text-xl text-white">{{ $odontograma->cliente->nombre}} {{ $odontograma->cliente->apellido}}</h4>
                @else
                    <h4 class="ml-3 font-light text-xl text-white">Cliente no encontrado</h4>
                @endif
                <h6 class="ml-3 mt-3 text-white">Grupo familiar:</h6>
                <h6 class="ml-3 font-light text-xl text-white">{{$odontograma->grupoFamiliar}}</h6>
                <h6 class="ml-3 font-light mt-3 text-white">Datos del paciente:</h6>
                <div class="flex items-center justify-Start">
                    <span class="ml-3 w-auto px-2 mb-1 py-1 border-2 border-teal-600 rounded-xl bg-emerald-400 text-white">{{$odontograma->edad}} Años</span>
                    {{-- <span class="ml-3 w-auto px-2 mb-1 py-1 border-2 border-teal-600 rounded-xl bg-teal-500 text-white">{{$odontograma->localidad}}</span> --}}
                    {{-- <span class="ml-3 w-auto px-2 mb-1 py-1 border-2 border-teal-600 rounded-xl bg-emerald-500 text-white">Concordia</span>
                </div>
                <div class="ml-3 mt-4 flex gap-4 items-center justify-start">
                    <a href="{{ isset($odontograma->idOdontograma) ? route('odontograma.eliminar', ['id' => $odontograma->idOdontograma]) : '' }}"
                        class="decoration-transparent w-12 h-12 cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full bg-white grid place-items-center cel:text-base text-3xl"
                        name="btnEliminarCliente">
                        <i class="fa-solid fa-trash text-black text-xl"></i>
                    </a>   
                    <a href="/inicio/odontograma-mostrar/{{ $odontograma->idOdontograma }}" class="decoration-transparent w-12 h-12 cel:rounded-none cel:w-11/12 cel:border-2 cel:border-neutral-500 rounded-full bg-white grid place-items-center cel:text-base text-3xl">
                        <i class="fa-solid fa-eye text-black text-xl"></i>
                    </a>
                </div>



            </div>
            @endforeach --}}
        {{-- </div> --}}