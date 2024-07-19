@extends('plantilla')
@section('contenido')
    <section class="w-full h-full flex flex-col items-center justify-around">
        @if(isset($mensaje))
        <div class="w-11/12 cel:mt-5 cel:mb-2 cel:rounded-2xl h-16 bg-green-500 grid place-items-center mt-4 overflow-hidden">
            <h2 class="cel:text-sm text-sm text-white">{!! $mensaje !!}</h2>
        </div>
        @endif
        @if(isset($mensajeRojo))
        <div class="w-11/12 cel:mt-5 cel:mb-2 cel:rounded-2xl h-16 bg-red-500 grid place-items-center mt-4 overflow-hidden">
            <h2 class="cel:text-sm text-white">{!! $mensajeRojo !!}</h2>
        </div>
        @endif
        @if(isset($error))
        <div class="w-11/12 cel:mt-5 cel:mb-2 cel:rounded-2xl h-16 bg-red-500 grid place-items-center mt-4 overflow-hidden">
            <h2 class="cel:text-sm text-white">{!! $error !!}</h2>
        </div>
        @endif
        
        @if(isset($bienvenido))
        <div class="w-11/12 cel:mt-5 cel:mb-2 cel:rounded-2xl h-16 bg-green-500 grid place-items-center mt-4 overflow-hidden">
            <h2 class="cel:text-base text-white">{{ session('bienvenido') }}</h2>
        </div>
        @endif
        @if(session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        @if(session('bienvenido'))
            <div class="alert alert-success">
                {{ session('bienvenido') }}
            </div>
        @endif
        <div class="w-full cel:h-full md:h-full lg:h-screen xl:h-screen 2xl:h-screen flex items-center justify-center cel:flex-col cel:text-center md:flex-col md:text-center">
            <div class="cel:w-11/12 w-6/12 flex cel:items-center items-start justify-center flex-col md:items-center">
                <h2 class="uppercase cel:ml-0 md:ml-0 ml-10 cel:text-6xl text-9xl cel:mt-5 text-teal-400 font-bold">Clínica</h2>
                <h2 class="uppercase cel:ml-0 md:ml-0 ml-12 cel:text-5xl text-7xl text-sky-500 cel:mt-0 lg:mt-2 xl:mt-2 2xl:mt-2 font-bold">Odontológica</h2>
                <p class="cel:ml-0 md:ml-0 ml-12 text-xl font-normal mt-1 italic text-sky-500">La odontología es una profesión que requiere de aquellos que tienen el sentido estético de un artista, la destreza manual de un cirujano, el conocimiento científico de un médico y la paciencia de un monje.</p>
                <div class="flex items-start justify-center">
                    <a href="{{route('cliente-listar')}}" class="cel:ml-0 md:ml-0 ml-12 mt-2 grid place-items-center w-52 h-12 bg-teal-500 text-white rounded-sm lg:hover:text-lg xl:hover:text-lg 2xl:hover:text-lg duration-100 ease-in-out decoration-transparent">Agendar un clientes</a>
                    <a href="{{route('cita-listar')}}" class="cel:ml-0 md:ml-0 ml-12 mt-2 grid place-items-center w-52 h-12 border-2 border-sky-500 text-sky-500 rounded-sm lg:hover:text-lg xl:hover:text-lg 2xl:hover:text-lg duration-100 ease-in-out decoration-transparent">Programar una cita</a>
                </div>
            </div>
            <div class="cel:w-full w-5/12 grid place-items-center">
                <img src="{{ asset('imagenes/dentista.png') }}" alt="Dentista Logo" class="cel:hidden w-full">
            </div>
        </div>
    </section>
<section id="arrancar" class="w-full h-full flex items-center justify-center flex-col mb-5">
    <div class="w-full text-center">
        <h2>Visitar una sección</h2>
    </div>
    <div class="grid grid-cols-3 place-items-center w-full h-full">
        <div class="flex items-center justify-center flex-col w-11/12 h-96">
            <div class="relative w-full h-48 flex items-center justify-center">
                <span class="w-28 h-28 bg-teal-500 absolute left-32 rounded-full"></span>
                <span class="w-28 h-28 bg-white absolute rounded-full grid place-items-center">
                    <i class="fa-solid fa-user-group text-teal-500 text-5xl"></i>
                </span>
            </div>
            <div class="w-full h-64  flex items-center mt-3 justify-start flex-col">
                <span class="text-3xl">1. Interfaz de clientes</span>
                <p class="w-11/12 text-center font-extralight text-xl">Llevar un buen orden de los clientes ayuda a agilizar los trabajos, registros y no omitir ninguna tarea importante.</p>
                <a href="{{route('cliente-listar')}}" class="decoration-transparent text-lg text-teal-500">Ir a la seccion de clientes <i class="ml-2 fa-solid fa-chevron-right text-sm"></i></a>
            </div>
        </div>
        <div class="flex items-center justify-center flex-col w-11/12 h-96">
            <div class="relative w-full h-48 flex items-center justify-center">
                <span class="w-28 h-28 bg-teal-500 absolute left-32 rounded-full"></span>
                <span class="w-28 h-28 bg-white absolute rounded-full grid place-items-center">
                    <i class="fa-solid fa-image text-teal-500 text-5xl"></i>
                </span>
            </div>
            <div class="w-full h-64  flex items-center mt-3 justify-start flex-col">
                <span class="text-3xl">2. Interfaz de notas</span>
                <p class="w-11/12 text-center font-extralight text-xl">Llevar un buen orden de los clientes ayuda a agilizar los trabajos, registros y no omitir ninguna tarea importante.</p>
                <a href="{{route('notas-listar')}}" class="decoration-transparent text-lg text-teal-500">Ir a la seccion de notas <i class="ml-2 fa-solid fa-chevron-right text-sm"></i></a>
            </div>
        </div>
        <div class="flex items-center justify-center flex-col w-11/12 h-96">
            <div class="relative w-full h-48 flex items-center justify-center">
                <span class="w-28 h-28 bg-teal-500 absolute left-32 rounded-full"></span>
                <span class="w-28 h-28 bg-white absolute rounded-full grid place-items-center">
                    <i class="fa-solid fa-address-card text-teal-500 text-5xl"></i>
                </span>
            </div>
            <div class="w-full h-64  flex items-center mt-3 justify-start flex-col">
                <span class="text-3xl">3. Interfaz de imagenes</span>
                <p class="w-11/12 text-center font-extralight text-xl">Llevar un buen orden de los clientes ayuda a agilizar los trabajos, registros y no omitir ninguna tarea importante.</p>
                <a href="{{route('imagenes')}}" class="decoration-transparent text-lg text-teal-500">Ir a la seccion de imagenes <i class="ml-2 fa-solid fa-chevron-right text-sm"></i></a>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 place-items-center w-full h-full">
        <div class="flex items-center justify-center flex-col w-11/12 h-96">
            <div class="relative w-full h-48 flex items-center justify-center">
                <span class="w-28 h-28 bg-teal-500 absolute left-4 rounded-full" style="left: 228px;"></span>
                <span class="w-28 h-28 bg-white absolute rounded-full grid place-items-center">
                    <i class="fa-solid fa-user-group text-teal-500 text-5xl"></i>
                </span>
            </div>
            <div class="w-full h-64  flex items-center mt-3 justify-start flex-col">
                <span class="text-3xl">4. Interfaz de citas</span>
                <p class="w-8/12 text-center font-extralight text-xl">Llevar un buen orden de los clientes ayuda a agilizar los trabajos, registros y no omitir ninguna tarea importante.</p>
                <a href="{{route('cita-listar')}}" class="decoration-transparent text-lg text-teal-500">Ir a la seccion de citas <i class="ml-2 fa-solid fa-chevron-right text-sm"></i></a>
            </div>
        </div>
        <div class="flex items-center justify-center flex-col w-11/12 h-96">
            <div class="relative w-full h-48 flex items-center justify-center">
                <span class="w-28 h-28 bg-teal-500 absolute left-4 rounded-full" style="left: 228px;"></span>
                <span class="w-28 h-28 bg-white absolute rounded-full grid place-items-center">
                    <i class="fa-solid fa-image text-teal-500 text-5xl"></i>
                </span>
            </div>
            <div class="w-full h-64  flex items-center mt-3 justify-start flex-col">
                <span class="text-3xl">5. Interfaz de odontograma</span>
                <p class="w-8/12 text-center font-extralight text-xl">Llevar un buen orden de los clientes ayuda a agilizar los trabajos, registros y no omitir ninguna tarea importante.</p>
                <a href="{{route('odontograma-listar')}}" class="decoration-transparent text-lg text-teal-500">Ir a la seccion de odontograma <i class="ml-2 fa-solid fa-chevron-right text-sm"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection
