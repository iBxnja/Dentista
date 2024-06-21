@extends('plantilla')
@section('breadcrumb')
    <a href="/inicio" class="decoration-transparent">Inicio</a>
    <span class="ml-5">/</span>
    <span class="ml-5">Nuevo odontograma</span>
@endsection
@section('contenido')
  <section class="w-full h-full flex items-center justify-center flex-col">
    <div class="w-11/12 h-full flex items-center justify-center">
      <form action="" method="POST" id="formulario" class="w-full h-full flex items-center justify-center flex-col">
        @csrf
        <input type="hidden" name="id" value="{{ isset($odontograma) ? $odontograma->idOdontograma : '0' }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <h2 class="my-4">Crear odontograma</h2>
      @include('odontograma.perfil')
      @include('odontograma.observacion')

      <div class="w-full h-full flex flex-col items-center justify-center">
        <div class="w-full bg-teal-300 py-5 h-full flex cel:flex-col items-center justify-center mt-5">
            <div class="w-2/4 cel:w-full h-full flex items-center justify-around flex-col">
                <h2 class="mb-5 text-white text-lg font-semibold">Crear Registro</h2>
                <img src="{{ asset('imagenes/diente.png') }}" alt="Cliente" class="cel:w-5/12 w-5/12">
            </div>
            <div class="w-2/4 cel:w-full cel:justify-center h-full flex items-center justify-around flex-col">
                <div class="flex items-center justify-center flex-col w-full mt-4 mr-6 cel:mr-0">
                    <label for="tipoDiente1" class="text-white text-lg font-semibold">Diente</label>
                    <select name="tipoDiente1" id="tipoDiente1" class="cel:w-10/12 w-6/12 text-center border-b-2 border-white focus:outline-none appearance-none bg-transparent text-white">
                        <option class="text-white" value="" selected disabled>Selecciona un diente</option>
                        <option class="text-white" value="" disabled>- - - - Incisivos - - - -</option>
                        <option class="text-black" value="Incisivo central superior derecho">Incisivo central superior derecho</option>
                        <option class="text-black" value="Incisivo central superior izquierdo">Incisivo central superior izquierdo</option>
                        <option class="text-black" value="Incisivo lateral superior derecho">Incisivo lateral superior derecho</option>
                        <option class="text-black" value="Incisivo central superior izquierdo">Incisivo lateral superior izquierdo</option>
                        <option class="text-black" value="Incisivo central inferior derecho">Incisivo central inferior derecho</option>
                        <option class="text-black" value="Incisivo central inferior izquierdo">Incisivo central inferior izquierdo</option>
                        <option class="text-black" value="Incisivo lateral inferior derecho">Incisivo lateral inferior derecho</option>
                        <option class="text-black" value="Incisivo lateral inferior izquierdo">Incisivo lateral inferior izquierdo</option>
                        <option class="text-white" value="" disabled>- - - - Caninos  - - - -</option>
                        <option class="text-black" value="Canino superior derecho">Canino superior derecho</option>
                        <option class="text-black" value="Canino superior izquierdo">Canino superior izquierdo</option>
                        <option class="text-black" value="Canino inferior derecho">Canino inferior derecho</option>
                        <option class="text-black" value="Canino inferior izquierdo">Canino inferior izquierdo</option>
                        <option class="text-white" value="" disabled>- - - - Premolares - - - -</option>
                        <option class="text-black" value="Primer premolar superior derecho">Primer premolar superior derecho</option>
                        <option class="text-black" value="Primer premolar superior izquierdo">Primer premolar superior izquierdo</option>
                        <option class="text-black" value="Segundo  premolar superior derecho">Segundo  premolar superior derecho</option>
                        <option class="text-black" value="Segundo  premolar superior izquierdo">Segundo  premolar superior izquierdo</option>
                        <option class="text-black" value="Primer premolar inferior derecho">Primer premolar inferior derecho</option>
                        <option class="text-black" value="Primer premolar inferior izquierdo">Primer premolar inferior izquierdo</option>
                        <option class="text-black" value="Segundo  premolar inferior derecho">Segundo  premolar inferior derecho</option>
                        <option class="text-black" value="Segundo  premolar inferior izquierdo">Segundo  premolar inferior izquierdo</option>
                        <option class="text-white" value="" disabled>- - - - Molares - - - -</option>
                        <option class="text-black" value="Primer molar superior derecho">Primer molar superior derecho</option>
                        <option class="text-black" value="Primer molar superior izquierdo">Primer molar superior izquierdo</option>
                        <option class="text-black" value="Segundo molar superior derecho">Segundo molar superior derecho</option>
                        <option class="text-black" value="Segundo molar superior izquierdo">Segundo molar superior izquierdo</option>
                        <option class="text-black" value="Tercer molar superior derecho">Tercer molar superior derecho</option>
                        <option class="text-black" value="Tercer molar superior izquierdo">Tercer molar superior izquierdo</option>
                        <option class="text-black" value="Primer molar inferior derecho">Primer molar inferior derecho</option>
                        <option class="text-black" value="Primer molar inferior izquierdo">Primer molar inferior izquierdo</option>
                        <option class="text-black" value="Segundo molar inferior derecho">Segundo molar inferior derecho</option>
                        <option class="text-black" value="Segundo molar inferior izquierdo">Segundo molar inferior izquierdo</option>
                        <option class="text-black" value="Tercer molar inferior derecho">Tercer molar inferior derecho</option>
                        <option class="text-black" value="Tercer molar inferior izquierdo">Tercer molar inferior izquierdo</option>
                    </select>
                </div>
                <div class="flex items-center justify-center flex-col w-full mt-4 mr-6 cel:mr-0">
                    <label for="estadoDiente1" class="text-white text-lg font-semibold">Estado</label>
                    <select name="estadoDiente1" id="estadoDiente1" class="cel:w-10/12 w-6/12 text-center border-b-2 border-white focus:outline-none appearance-none bg-transparent text-white">
                        <option class="text-white" value="" selected disabled>Seleccione un estado</option>
                        <option class="text-black" value="Sano">Sano</option>
                        <option class="text-black" value="Extraccion">Extracción</option>
                        <option class="text-black" value="Careado">Careado</option>
                        <option class="text-black" value="Tratamiento de conducto">Tratamiento de conducto</option>
                        <option class="text-black" value="Empaste">Empaste</option>
                        <option class="text-black" value="Ortodoncia">Ortodoncia</option>
                        <option class="text-black" value="Injerto">Injerto</option>
                        <option class="text-black" value="Blanqueamiento">Blanqueamiento</option>
                        <option class="text-black" value="Periodontitis">Periodontitis</option>
                        <option class="text-black" value="Fractura">Fractura</option>
                        <option class="text-black" value="Implante">Implante</option>
                    </select>
                </div>
                <div class="flex items-center justify-center flex-col w-full mt-4 mr-6 cel:mr-0">
                    <label for="coronaSuperior" class="text-white text-lg font-semibold">Corona Superior</label>
                    <select name="coronaSuperior" id="coronaSuperior" class="cel:w-10/12 w-6/12 text-center border-b-2 border-white focus:outline-none appearance-none bg-transparent text-white">
                        <option value="" selected disabled>Seleccione un estado</option>
                        <option class="text-black" value="Sano">Sano</option>
                        <option class="text-black" value="Extraccion">Extracción</option>
                        <option class="text-black" value="Careado">Careado</option>
                        <option class="text-black" value="Tratamiento de conducto">Tratamiento de conducto</option>
                        <option class="text-black" value="Empaste">Empaste</option>
                        <option class="text-black" value="Ortodoncia">Ortodoncia</option>
                        <option class="text-black" value="Injerto">Injerto</option>
                        <option class="text-black" value="Blanqueamiento">Blanqueamiento</option>
                        <option class="text-black" value="Periodontitis">Periodontitis</option>
                        <option class="text-black" value="Fractura">Fractura</option>
                        <option class="text-black" value="Implante">Implante</option>
                    </select>
                </div>
                <div class="flex items-center justify-center flex-col w-full mt-4 mr-6 cel:mr-0">
                    <label for="coronaInferior" class="text-white text-lg font-semibold">Corona Inferior</label>
                    <select name="coronaInferior" id="coronaInferior" class="cel:w-10/12 w-6/12 text-center border-b-2 border-white focus:outline-none appearance-none bg-transparent text-white">
                        <option value="" selected disabled>Seleccione un estado</option>
                        <option class="text-black" value="Sano">Sano</option>
                        <option class="text-black" value="Extraccion">Extracción</option>
                        <option class="text-black" value="Careado">Careado</option>
                        <option class="text-black" value="Tratamiento de conducto">Tratamiento de conducto</option>
                        <option class="text-black" value="Empaste">Empaste</option>
                        <option class="text-black" value="Ortodoncia">Ortodoncia</option>
                        <option class="text-black" value="Injerto">Injerto</option>
                        <option class="text-black" value="Blanqueamiento">Blanqueamiento</option>
                        <option class="text-black" value="Periodontitis">Periodontitis</option>
                        <option class="text-black" value="Fractura">Fractura</option>
                        <option class="text-black" value="Implante">Implante</option>
                    </select>
                </div>
                <div class="flex items-center justify-center flex-col w-full mt-4 mr-6 cel:mr-0">
                    <label for="coronaIzquierda" class="text-white text-lg font-semibold">Corona Izquierda</label>
                    <select name="coronaIzquierda" id="coronaIzquierda" class="cel:w-10/12 w-6/12 text-center border-b-2 border-white focus:outline-none appearance-none bg-transparent text-white">
                        <option value="" selected disabled>Seleccione un estado</option>
                        <option class="text-black" value="Sano">Sano</option>
                        <option class="text-black" value="Extraccion">Extracción</option>
                        <option class="text-black" value="Careado">Careado</option>
                        <option class="text-black" value="Tratamiento de conducto">Tratamiento de conducto</option>
                        <option class="text-black" value="Empaste">Empaste</option>
                        <option class="text-black" value="Ortodoncia">Ortodoncia</option>
                        <option class="text-black" value="Injerto">Injerto</option>
                        <option class="text-black" value="Blanqueamiento">Blanqueamiento</option>
                        <option class="text-black" value="Periodontitis">Periodontitis</option>
                        <option class="text-black" value="Fractura">Fractura</option>
                        <option class="text-black" value="Implante">Implante</option>
                    </select>
                </div>
                <div class="flex items-center justify-center flex-col w-full mt-4 mr-6 cel:mr-0">
                    <label for="coronaCentral" class="text-white text-lg font-semibold">Corona Central</label>
                    <select name="coronaCentral" id="coronaCentral" class="cel:w-10/12 w-6/12 text-center border-b-2 border-white focus:outline-none appearance-none bg-transparent text-white">
                        <option value="" selected disabled>Seleccione un estado</option>
                        <option class="text-black" value="Sano">Sano</option>
                        <option class="text-black" value="Extraccion">Extracción</option>
                        <option class="text-black" value="Careado">Careado</option>
                        <option class="text-black" value="Tratamiento de conducto">Tratamiento de conducto</option>
                        <option class="text-black" value="Empaste">Empaste</option>
                        <option class="text-black" value="Ortodoncia">Ortodoncia</option>
                        <option class="text-black" value="Injerto">Injerto</option>
                        <option class="text-black" value="Blanqueamiento">Blanqueamiento</option>
                        <option class="text-black" value="Periodontitis">Periodontitis</option>
                        <option class="text-black" value="Fractura">Fractura</option>
                        <option class="text-black" value="Implante">Implante</option>
                    </select>
                </div>
                <div class="flex items-center justify-center flex-col w-full mt-4 mr-6 cel:mr-0">
                    <label for="coronaDerecha" class="text-white text-lg font-semibold">Corona Derecha</label>
                    <select name="coronaDerecha" id="coronaDerecha" class="cel:w-10/12 w-6/12 text-center border-b-2 border-white focus:outline-none appearance-none bg-transparent text-white">
                        <option value="" selected disabled>Seleccione un estado</option>
                        <option class="text-black" value="Sano">Sano</option>
                        <option class="text-black" value="Extraccion">Extracción</option>
                        <option class="text-black" value="Careado">Careado</option>
                        <option class="text-black" value="Tratamiento de conducto">Tratamiento de conducto</option>
                        <option class="text-black" value="Empaste">Empaste</option>
                        <option class="text-black" value="Ortodoncia">Ortodoncia</option>
                        <option class="text-black" value="Injerto">Injerto</option>
                        <option class="text-black" value="Blanqueamiento">Blanqueamiento</option>
                        <option class="text-black" value="Periodontitis">Periodontitis</option>
                        <option class="text-black" value="Fractura">Fractura</option>
                        <option class="text-black" value="Implante">Implante</option>
                    </select>
                </div>
            </div>
        </div>
        </div>
        <div>
          <button type="button" name="btnAgregar" class="w-40 h-12 bg-teal-400 text-white rounded-full mt-4 shadow-md shadow-neutral-500">Cargar diente</button>
        </div>
        <div class="w-full mt-5 mb-5 h-full flex items-center justify-center flex-col">
          <label for="" class="w-full h-20 bg-teal-400 grid place-items-center text-white font-bold text-2xl">Dientes cargados</label>
          <table class="w-full bg-white border border-gray-300 shadow-md rounded-md">
              <thead class="">
                  <tr class="w-full h-full flex items-center justify-center cel:hidden">
                      <th class="w-2/12 grid place-items-center h-14">Tipo de Diente</th>
                      <th class="w-2/12 grid place-items-center h-14">Estado de Diente</th>
                      <th class="w-2/12 grid place-items-center h-14">Corona Superior</th>
                      <th class="w-2/12 grid place-items-center h-14">Corona Inferior</th>
                      <th class="w-2/12 grid place-items-center h-14">Corona Izquierda</th>
                      <th class="w-2/12 grid place-items-center h-14">Corona Central</th>
                      <th class="w-2/12 grid place-items-center h-14">Corona Derecha</th>
                  </tr>
              </thead>
              <tbody id="odontogramaJSON" class="w-11/12 h-full text-center">
                

              </tbody>
          </table>
      </div>

      </div>
      <!-- ... (Continuación del formulario) -->
      <button type="submit" name="btnagregar" class="bg-teal-500 text-white w-56 h-14 my-2 rounded-full shadow-md shadow-neutral-500">Agregar</button>
    </form>
  </div>
</section>







<script>

document.addEventListener('DOMContentLoaded', function () {
    // Seleccionar elementos del DOM
    const formulario = document.getElementById('formulario');
    const odontogramaJSON = document.getElementById('odontogramaJSON');
    const dientesArray = []; // Nuevo array para almacenar los dientes

    // Variables para almacenar los valores seleccionados
    let selectedCliente = document.getElementById('fk_idCliente').value;
    let selectedMes = document.getElementById('mes').value;

    // Evento de cambio en el select del cliente
    document.getElementById('fk_idCliente').addEventListener('change', function () {
        selectedCliente = this.value;  // Actualizar la variable al cambiar
    });

    // Evento de cambio en el select del mes
    document.getElementById('mes').addEventListener('change', function () {
        selectedMes = this.value;  // Actualizar la variable al cambiar
    });

    // Evento al hacer clic en "Cargar diente"
    document.querySelector('button[name="btnAgregar"]').addEventListener('click', function () {
        // Obtener valores seleccionados de los selects
        const tipoDiente = document.getElementById('tipoDiente1').value;
        const estadoDiente = document.getElementById('estadoDiente1').value;
        const coronaSuperior = document.getElementById('coronaSuperior').value;
        const coronaInferior = document.getElementById('coronaInferior').value;
        const coronaIzquierda = document.getElementById('coronaIzquierda').value;
        const coronaCentral = document.getElementById('coronaCentral').value;
        const coronaDerecha = document.getElementById('coronaDerecha').value;

        // Crear objeto con los valores
        const diente = {
            tipoDiente,
            estadoDiente,
            coronaSuperior,
            coronaInferior,
            coronaIzquierda,
            coronaCentral,
            coronaDerecha
        };

        // Agregar el objeto al array de dientes
        dientesArray.push(diente);

        // Agregar el objeto a la tabla y convertirlo a formato JSON
        const newRow = odontogramaJSON.insertRow(-1);

        // Aplicar clases a la fila
        newRow.classList.add('w-full', 'h-full', 'flex', 'items-center', 'justify-center', 'cel:flex-col', 'cel:text-center', 'cel:border-b-2', 'cel:border-t-2', 'cel:border-teal-400', 'cel:my-5');

        let cellIndex = 0;
        for (const prop in diente) {
            const cell = newRow.insertCell(cellIndex++);
            cell.classList.add('w-2/12', 'grid', 'place-items-center', 'h-14', 'cel:w-full', 'cel:mb-5', 'cel:h-8');
            // Establecer el contenido de la celda
            cell.textContent = diente[prop];
        }

        // Limpieza de selects después de cargar el diente
        resetSelects();
        // Restablecer el valor del select del cliente después de cargar el diente
        document.getElementById('fk_idCliente').value = selectedCliente;
        // Restablecer el valor del select del mes después de cargar el diente
        document.getElementById('mes').value = selectedMes;
    });

    // Función para limpiar los selects después de cargar el diente
    function resetSelects() {
        const selects = formulario.querySelectorAll('select');
        selects.forEach(select => {
            if (select.id !== 'fk_idCliente' && select.id !== 'mes') {
                select.value = select.options[0].value; // Establecer el valor predeterminado
            }
        });
    }

    // Evento para enviar el formulario y mostrar el JSON en la ruta del action
    formulario.addEventListener('submit', function (event) {
        // Convertir el array de dientes a JSON
        const dientesJSON = JSON.stringify(dientesArray);

        // Agregar un campo oculto al formulario con el JSON
        const inputJSON = document.createElement('input');
        inputJSON.setAttribute('type', 'hidden');
        inputJSON.setAttribute('name', 'odontogramaJSON');
        inputJSON.setAttribute('value', dientesJSON);
        formulario.appendChild(inputJSON);
    });

});


</script>















@endsection




