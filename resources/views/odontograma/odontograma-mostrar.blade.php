@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Mostrar odontograma seleccionado</span>
@endsection
@section('contenido')


{{-- @php
dd($odontograma, $datosJson);
@endphp --}}
    <section clasS="w-full h-full flex-col flex items-center justify-center text-white">
        <h2 class="my-5 text-black">Odontograma digital</h2>

        <div class="flex cel:flex-col bg-teal-300 shadow-md shadow-neutral-500 items-center justify-center w-11/12 h-full py-2">
            <div class="w-full h-96 grid place-items-center">
                <img src="{{ asset('imagenes/diente2.png') }}" alt="Cliente" class="cel:w-10/12 w-6/12">
            </div>
            <div class="w-3/4 cel:text-center cel:w-full h-full cel:flex-col flex items-start justify-center cel:items-center">
              <div class="cel:mb-5 w-2/4 cel:w-11/12 h-full flex items-start justify-center flex-col cel:items-center">
                <h4 class="cel:ml-0 text-xl font-bold ml-10">Nombre del paciente:</h4>
                <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->cliente->nombre }} {{ $odontograma->cliente->apellido }}</span>
                <h4 class="cel:ml-0 text-xl font-bold ml-10 mt-3">Obra social:</h4>
                <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->obraSocial }}</span>
                <h4 class="cel:ml-0 text-xl font-bold ml-10 mt-3">Codigo:</h4>
                <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->codigo }}</span>
              </div>
              <div class="w-2/4 cel:text-center cel:w-11/12 h-full flex items-start justify-center flex-col cel:items-center">
                <h4 class="cel:ml-0 text-xl font-bold ml-10">Titular:</h4>
                <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->titular }}</span>
                <h4 class="cel:ml-0 text-xl font-bold ml-10 mt-3">Grupo familiar:</h4>
                <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->grupoFamiliar }}</span>
                <h4 class="cel:ml-0 text-xl font-bold ml-10 mt-3">Parentesco:</h4>
                <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->parentesco }}</span>

              </div>
            </div>
        </div>
        
        <div class="cel:flex-col flex bg-teal-300 shadow-md shadow-neutral-500 items-center justify-center w-11/12 h-full py-5 mt-5">
          <div class="cel:mb-4 cel:items-center cel:text-center w-2/4 h-full flex items-start justify-center flex-col">
            <h4 class="cel:ml-0 text-xl font-bold ml-10 mt-3">Lugar de trabajo del titular:</h4>
            <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->lugarTitular }}</span>
            <h4 class="cel:ml-0 text-xl font-bold ml-10 mt-3">Domicilio:</h4>
            <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->domicilio }}</span>
            <h4 class="cel:ml-0 text-xl font-bold ml-10 mt-3">Fecha de nacimiento:</h4>
            <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->fechaNac }}</span>
            <h4 class="cel:ml-0 text-xl font-bold ml-10 mt-3">Mes:</h4>
            <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->mes }}</span>
          </div>
          <div class="cel:items-center cel:text-center w-2/4 h-full flex items-start justify-center flex-col">
            <h4 class="cel:ml-0 text-xl font-bold ml-10 mt-3">Afiliado:</h4>
            <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->afiliado }}</span>
            <h4 class="cel:ml-0 text-xl font-bold ml-10 mt-3">Plan:</h4>
            <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->plan }}</span>
            <h4 class="cel:ml-0 text-xl font-bold ml-10 mt-3">Año:</h4>
            <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->anio }}</span>
            <h4 class="cel:ml-0 text-xl font-bold ml-10 mt-3">Edad:</h4>
            <span class="cel:ml-0 text-lg ml-10 ">{{ $odontograma->edad }}</span>
          </div>
          
        </div>
        
        <div class="w-11/12 h-full bg-teal-300 shadow-md shadow-neutral-500 cel:flex-col flex items-center justify-center my-5 py-10">
            <div class="cel:w-11/12 w-1/4 h-96 flex items-center justify-center flex-col">
              <h4 class="text-lg">Informe general de dientes</h4>
              <div class="w-full h-full  flex items-center justify-center flex-col">
                
                <div class="w-full flex items-center justify-center mb-4 mt-4">
                  <label for="cariado" class="w-2/4 text-center">Cariados</label>
                  <span class="w-2/4 border-b-2 border-white bg-transparent text-center" style="color: blawhiteck;">{{ $odontograma->cariado }}</span>
                </div>
                
                <div class="w-full flex items-center justify-center mt-4 mb-4">
                  <label for="obturado" class="w-2/4 text-center">Obturados</label>
                  <span type="text" name="obturado" class="w-2/4 border-b-2 border-white bg-transparent text-center" style="color: white;">{{ $odontograma->obturado }}</span>
                </div>
                
                <div class="w-full flex items-center justify-center mt-4 mb-4">
                  <label for="perdida" class="w-2/4 text-center">Perdida por caries</label>
                  <span type="text" name="perdida" class="w-2/4 border-b-2 border-white bg-transparent text-center" style="color: white;">{{ $odontograma->perdida }}</span>
                </div>
        
                <div class="w-full flex items-center justify-center mt-4 mb-4">
                  <label for="extraccion" class="w-2/4 text-center">Extracciones</label>
                  <span type="text" name="extraccion" class="w-2/4 border-b-2 border-white bg-transparent text-center" style="color: white;">{{ $odontograma->extraccion }}</span>
                </div>
        
                <div class="w-full flex items-center justify-center mt-4 mb-4">
                  <label for="sano" class="w-2/4 text-center">Sanos</label>
                  <span type="text" name="sano" class="w-2/4 border-b-2 border-white bg-transparent text-center" style="">{{ $odontograma->sano }}</span>
                </div>
        
              </div>
            </div>
        
            <div class="cel:w-11/12 cel:ml-0 ml-5 w-8/12 h-full flex items-start justify-center flex-col">
              <div class="shadow-neutral-400 bg-white shadow-md resize-none h-96 w-full overflow-auto text-black">
                
                <textarea class="w-full h-96 bg-white resize-none" disabled>{{ $odontograma->observacion }}</textarea>
              </div>
            </div>
        
          </div>
          <div class="cel:w-full w-11/12 h-full flex items-center justify-center mb-5">
            <table class="cel:w-11/12 w-full cel:flex cel:items-center cel:justify-center cel:flex-col bg-white border border-gray-300 shadow-md shadow-neutral-500 rounded-md">
                <thead class="w-full h-14 bg-teal-300 cel:text-center flex items-center justify-center">
                    <tr class="w-full h-full flex items-center justify-center">
                        <th class="w-2/12 cel:text-sm grid place-items-center h-14 cel:hidden">Tipo de Diente</th>
                        <th class="w-2/12 cel:text-sm grid place-items-center h-14 cel:hidden">Estado de Diente</th>
                        <th class="w-2/12 cel:text-sm grid place-items-center h-14 cel:hidden">Corona Superior</th>
                        <th class="w-2/12 cel:text-sm grid place-items-center h-14 cel:hidden">Corona Inferior</th>
                        <th class="w-2/12 cel:text-sm grid place-items-center h-14 cel:hidden">Corona Izquierda</th>
                        <th class="w-2/12 cel:text-sm grid place-items-center h-14 cel:hidden">Corona Central</th>
                        <th class="w-2/12 cel:text-sm grid place-items-center h-14 cel:hidden">Corona Derecha</th>
                        <th class="hidden cel:block">Dientes cargados</th>
                    </tr>
                </thead>
                <tbody id="odontogramaJSON" class="w-11/12 h-full text-center">
                    @foreach ($datosJson as $diente)
                    <tr class="w-full h-full flex cel:flex-col items-center justify-center text-black cel:border-b-2 cel:border-t-2 cel:border-teal-400 cel:my-5">
                        <th class="hidden cel:text-sm cel:w-full cel:grid cel:place-items-center h-6 cel:mt-5">Tipo de Diente</th>
                        <td class="w-2/12 cel:w-full cel:text-sm grid place-items-center h-14 cel:mb-5">{{ $diente['tipoDiente'] }}</td>
                        <th class="hidden cel:text-sm cel:w-full cel:grid cel:place-items-center h-6 ">Estado de Diente</th>
                        <td class="w-2/12 cel:w-full cel:text-sm grid place-items-center h-14 cel:mb-5">{{ $diente['estadoDiente'] }}</td>
                        <th class="hidden cel:text-sm cel:w-full cel:grid cel:place-items-center h-6 ">Corona Superior</th>
                        <td class="w-2/12 cel:w-full cel:text-sm grid place-items-center h-14 cel:mb-5">{{ $diente['coronaSuperior'] }}</td>
                        <th class="hidden cel:text-sm cel:w-full cel:grid cel:place-items-center h-6 ">Corona Inferior</th>
                        <td class="w-2/12 cel:w-full cel:text-sm grid place-items-center h-14 cel:mb-5">{{ $diente['coronaInferior'] }}</td>
                        <th class="hidden cel:text-sm cel:w-full cel:grid cel:place-items-center h-6 ">Corona Izquierda</th>
                        <td class="w-2/12 cel:w-full cel:text-sm grid place-items-center h-14 cel:mb-5">{{ $diente['coronaIzquierda'] }}</td>
                        <th class="hidden cel:text-sm cel:w-full cel:grid cel:place-items-center h-6 ">Corona Central</th>
                        <td class="w-2/12 cel:w-full cel:text-sm grid place-items-center h-14 cel:mb-5">{{ $diente['coronaCentral'] }}</td>
                        <th class="hidden cel:text-sm cel:w-full cel:grid cel:place-items-center h-6 ">Corona Derecha</th>
                        <td class="w-2/12 cel:w-full cel:text-sm grid place-items-center h-14">{{ $diente['coronaDerecha'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>

    </section>
@endsection