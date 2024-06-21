@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Nuevo cliente</span>
@endsection
@section('contenido')
    <section class="w-full h-full grid place-items-center pb-10">
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
        <form id="" method="POST" enctype="multipart/form-data" class="w-11/12 h-full flex items-center justify-center flex-col mt-10 mb-5">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="id" value="{{ isset($cliente) ? $cliente->idCliente : '0' }}">
            <h2 class="text-4xl mt-10 text-teal-400">Nuevo cliente</h2>
            <div class="w-11/12 h-full flex items-center justify-center flex-col mt-10">
                <div class="w-full h-full flex items-center justify-around cel:flex-col">
                    <div class="flex flex-col justify-center items-start w-5/12 cel:items-center cel:w-11/12">
                        <label for="txtNombre" class="text-xl mb-4 cel:text-sm cel:text-center">Nombre</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="w-full h-8 border-b-2 border-black focus:outline-none cel:text-center" placeholder="Escribe el nombre del cliente. Ej: Benjamin">
                    </div>            
                    <div class="flex flex-col justify-center items-start w-5/12 cel:items-center cel:w-11/12">
                        <label for="txtApellido" class="text-xl mb-4 cel:text-sm cel:text-center">Apellido</label>
                        <input type="text" name="txtApellido" id="txtApellido" class="w-full h-8 border-b-2 border-black focus:outline-none cel:text-center" placeholder="Escribe el apellido del cliente. Ej: Gonzalez">
                    </div>
                </div>
                <div class="w-full h-full  flex items-center justify-around cel:flex-col">
                    <div class="flex flex-col justify-center items-start w-5/12 cel:items-center cel:w-11/12">
                        <label for="txtDni" class="text-xl mb-4 cel:text-sm cel:text-center">Dni</label>
                        <input type="text" name="txtDni" id="txtDni" class="w-full h-8 border-b-2 border-black focus:outline-none cel:text-center" placeholder="Escribe el dni del cliente. Ej: 11222333">
                    </div>            
                    <div class="flex flex-col justify-center items-start w-5/12 cel:items-center cel:w-11/12">
                        <label for="txtEdad" class="text-xl mb-4 cel:text-sm cel:text-center">Edad</label>
                        <input type="text" name="txtEdad" id="txtEdad" class="w-full h-8 border-b-2 border-black focus:outline-none cel:text-center" placeholder="Escribe la edad del cliente. Ej: 20">
                    </div>
                </div>
            <button type="submit" name="btnAgregar" class="bg-teal-400 text-white w-64 h-40 mt-8 rounded-2xl shadow-md shadow-neutral-500">Agregar</button>
        </form>







        {{-- <form method="POST" class="flex items-center justify-center flex-col cel:w-11/12 h-full mt-5">
            @csrf
            <h2 class="cel:text-4xl cel:font-semibold text-purple-700 cel:my-5">Nuevo cliente</h2>
            <div class="flex items-center justify-center flex-col w-full">
                <label for="txtNombreCompleto" class="text-black cel:mt-10 cel:text-lg cel:mb-2 font-light">Nombre completo</label>
                <input type="text" name="txtNombreCompleto" class="text-center w-10/12 h-10 border-b-2 border-black bg-transparent focus:border-blue-500 outline-none" id="txtNombreCompleto">                        
                <input type="hidden" name="id" value="{{ isset($cliente) ? $cliente->idCliente : '0' }}">
            </div>
            <div class="flex items-center justify-center flex-col w-full">
                <label for="txtApellido" class="text-black cel:text-lg cel:mb-2 font-light cel:mt-10">Apellido</label>
                <input type="text" name="txtApellido" class="text-center w-10/12 h-10 border-b-2 border-black bg-transparent focus:border-blue-500 outline-none" id="txtApellido">                        
            </div>
            <div class="flex items-center justify-center flex-col w-full">
                <label for="txtEdad" class="text-black cel:text-lg cel:mb-2 font-light cel:mt-10">Edad</label>
                <input type="number" name="txtEdad" class="text-center w-10/12 h-10 border-b-2 border-black bg-transparent focus:border-blue-500 outline-none" id="txtEdad">           
            </div>
            <button type="submit" name="btnAgregar" class="bg-purple-700 text-white w-32 h-12 mt-8 rounded-2xl">Agregar</button>
        </form> --}}
    </section>
@endsection