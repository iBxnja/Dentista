@extends('plantilla')
@section('breadcrumb')
<a href="/inicio" class="decoration-transparent">Inicio</a>
<span class="ml-5">/</span>
<span class="ml-5">Mostrar odontograma seleccionado</span>
@endsection
@section('contenido')
{{-- @php
dd($datosJson);
@endphp --}}
{{-- $odontograma, --}}





<section class="w-full h-full flex items-center justify-center flex-col">
    <form id="miFormulario" method="post" class="w-full h-full flex items-center justify-center flex-col mb-5">
        @csrf
        {{-- <input type="hidden" name="id" value="{{ isset($odontograma) ? $odontograma->idOdontograma : '0' }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
        <div
            class="w-11/12 h-full my-10 py-10 flex shadow-md shadow-neutral-400 items-center justify-center bg-white border-l-8 border-l-teal-500 border-r-4 border-r-teal-500">
            <div class="w-2/12 bg-red-500 h-40"></div>
            <div class="w-9/12 h-full flex items-center justify-center">
                <div class="h-40 ml-5 w-3/12 bg-teal-400 grid place-items-center text-center">
                    <span class="text-2xl font-bold text-white">CIRCULO<br />ODONTOLÓGICO<br />CONCORDIA</span>
                </div>
                <div class="w-9/12 h-full flex items-start justify-center flex-col gap-8">
                    <div class="ml-10 flex flex-col w-72">
                        <label for="">OBRA SOCIAL:</label>
                        <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" value="{{$odontograma->obraSocial}}" name="obraSocial" id="">
                    </div>
                    <div class="ml-10 flex flex-col w-72">
                        <label for="">CODIGO N°:</label>
                        <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" value="{{$odontograma->codigo}}" name="codigo" id="">
                    </div>
                </div>
            </div>
        </div>


        {{--
        -----------------------------------------------------------------------------------------------------------------------
        --}}
            

                    {{-- ESTO ES PARA CUANDO TENGAMOS QUE AGREGAR EL EDITAR --}}
                    {{-- <select name="mes">
                        <option disabled>Mes seleccionado</option>
                        <option disabled selected>{{$odontograma->mes}}</option>
                        <option disabled>---------------------</option>
                        <option class="text-black" value="Enero">Enero</option>
                        <option class="text-black" value="Febrero">Febrero</option>
                        <option class="text-black" value="Marzo">Marzo</option>
                        <option class="text-black" value="Abril">Abril</option>
                        <option class="text-black" value="Mayo">Mayo</option>
                        <option class="text-black" value="Junio">Junio</option>
                        <option class="text-black" value="Julio">Julio</option>
                        <option class="text-black" value="Agosto">Agosto</option>
                        <option class="text-black" value="Septiembre">Septiembre</option>
                        <option class="text-black" value="Septiembre">Septiembre</option>
                        <option class="text-black" value="Octubre">Octubre</option>
                        <option class="text-black" value="Noviembre">Noviembre</option>
                        <option class="text-black" value="Diciembre">Diciembre</option>
                    </select> --}}
           





        <div
        class="w-11/12 h-full mb-10 py-10 flex shadow-md shadow-neutral-400 items-center justify-center bg-white border-l-8 border-l-teal-500 border-r-4 border-r-teal-500">
        <div class="w-6/12 h-full flex items-start justify-center flex-col gap-16">
            <div class="ml-10 flex flex-col w-72">
                <label for="">PACIENTE:</label>
                <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" value="{{ $odontograma->cliente->nombre}} {{ $odontograma->cliente->apellido}}" name="fk_idCliente" id="">
            </div>
            <div class="ml-10 flex flex-col w-72">
                <label for="">AFILIADO N°:</label>
                <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" value="{{$odontograma->afiliado}}" name="afiliado" id="">
            </div>
            <div class="ml-10 flex flex-col w-72">
                <label for="">MES:</label>
                <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" name="" id="" value="{{$odontograma->mes}}">
            </div>
        </div>

        <div class="w-5/12 h-full flex items-start justify-center flex-col gap-16">
            <div class="ml-10 flex flex-col w-72">
                <label for="">AÑO:</label>
                <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" name="anio" id="" value="{{$odontograma->anio}}">
            </div>
            <div class="ml-10 flex flex-col w-72">
                <label for="">EDAD:</label>
                <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="number" name="edad" id="" value="{{$odontograma->edad}}">
            </div>
            <div class="ml-10 flex flex-col w-72">
                <label for="">PLAN:</label>
                <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" value="{{$odontograma->plan}}" name="plan" id="">
            </div>
        </div>
    </div>







        {{--
        -----------------------------------------------------------------------------------------------------------------------
        --}}












        {{--
        -----------------------------------------------------------------------------------------------------------------------
        --}}
        <div
            class="w-11/12 h-full mb-10 py-10 flex shadow-md shadow-neutral-400 items-center justify-center bg-white border-l-8 border-l-teal-500 border-r-4 border-r-teal-500">
            <div class="w-6/12 h-full flex items-start justify-center flex-col gap-16">
                <div class="ml-10 flex flex-col w-72">
                    <label for="">TITULAR:</label>
                    <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" name="titular" id="" value="{{$odontograma->titular}}">
                </div>
                <div class="ml-10 flex flex-col w-72">
                    <label for="">FECHA DE NACIMIENTO:</label>
                    <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" name="fechaNac" id="" value="{{$odontograma->fechaNac}}">
                </div>
                <div class="ml-10 flex flex-col w-72">
                    <label for="">DOMICILIO:</label>
                    <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" name="domicilio" id="" value="{{$odontograma->domicilio}}">
                </div>
            </div>

            <div class="w-5/12 h-full flex items-start justify-center flex-col gap-16">
                <div class="ml-10 flex flex-col w-72">
                    <label for="">PARENTESCO:</label>
                    <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" name="parentesco" id="" value="{{$odontograma->parentesco}}">
                </div>
                <div class="ml-10 flex flex-col w-72">
                    <label for="">GRUPO FAMILIAR:</label>
                    <input  class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabledtype="text" name="grupoFamiliar" id="" value="{{$odontograma->grupoFamiliar}}">
                </div>
                <div class="ml-10 flex flex-col w-72">
                    <label for="">LOCALIDAD:</label>
                    <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" name="localidad" id="" value="{{$odontograma->localidad}}">
                </div>
            </div>
        </div>
        {{--
        -----------------------------------------------------------------------------------------------------------------------
        --}}








        {{--
        -----------------------------------------------------------------------------------------------------------------------
        --}}
        <div
            class="w-11/12 h-full mb-10 py-10 flex shadow-md shadow-neutral-400 items-center justify-center bg-white border-l-8 border-l-teal-500 border-r-4 border-r-teal-500">
            <div class="w-6/12 h-full flex items-start justify-center flex-col gap-8">
                <div class="ml-10 flex flex-col w-72">
                    <label for="">LUGAR DE TRABAJO DEL TITULAR:</label>
                    <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" name="lugarTitular" id="" value="{{$odontograma->lugarTitular}}">
                </div>
                <div class="ml-10 flex flex-col w-72">
                    <label for="">ODONTOLOGO:</label>
                    <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" name="odontologo" id="" value="{{$odontograma->odontologo}}">
                </div>
            </div>
            <div class="w-5/12 h-full flex items-start justify-center flex-col gap-8">
                <div class="ml-10 flex flex-col w-72">
                    <label for="">DOCUMENTO N°:</label>
                    <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="number" name="numeroOdontograma" id="" value="{{$odontograma->numeroOdontograma}}">
                </div>
                <div class="ml-10 flex flex-col w-72">
                    <label for="">MATRICULA PROFESIONAL N°:</label>
                    <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none text-neutral-500" disabled type="text" name="matricula" id="" value="{{$odontograma->matricula}}">
                </div>
            </div>
        </div>
        {{--
        -----------------------------------------------------------------------------------------------------------------------
        --}}
















        {{--
        -----------------------------------------------------------------------------------------------------------------------
        --}}

        <div
            class="w-11/12 h-full py-20 border-l-8 border-l-teal-500 bg-white flex flex-col items-center justify-center border-r-4 border-r-teal-500 shadow-md shadow-neutral-500">
                <div class="w-9/12 flex items-center justify-center border-b-4 border-b-neutral-400">
                    @include('odontograma.mostrarOdontograma.parte1')
                    <span class="mx-3 h-full w-1 bg-neutral-400"></span>
                    @include('odontograma.mostrarOdontograma.parte2')
                </div>





                <div class="w-9/12 flex items-center justify-center ">
                    @include('odontograma.mostrarOdontograma.parte3')
                    <span class="mx-3 h-full w-1 bg-neutral-400"></span>
                    @include('odontograma.mostrarOdontograma.parte4')
                </div>







                <div class="w-6/12 flex items-center justify-center border-b-4 border-b-neutral-400 mt-5">
                    @include('odontograma.mostrarOdontograma.parte5')
                    <span class="mx-3 h-full w-1 bg-neutral-400"></span>
                    @include('odontograma.mostrarOdontograma.parte6')
                </div>








                <div class="w-9/12 flex items-center justify-center ">
                    @include('odontograma.mostrarOdontograma.parte7')
                    <span class="mx-3 h-full w-1 bg-neutral-400"></span>
                    @include('odontograma.mostrarOdontograma.parte8')
                </div>



            </div>
        </div>
        {{--
        -----------------------------------------------------------------------------------------------------------------------
        --}}
        {{-- <button>Editarr</button> --}}
    </form>
</section>








@endsection