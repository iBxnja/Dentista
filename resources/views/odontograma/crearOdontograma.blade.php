
<script>
    // Función para cambiar el estado al hacer clic en el input
    function cambiarEstado(input) {
        // Array de colores disponibles
        const colores = ['bg-teal-500', 'bg-blue-500', 'bg-green-500', 'bg-yellow-500', 'bg-black', 'bg-pink-500'];

        // Obtener el color actual del input
        let colorActual = '';
        colores.forEach(color => {
            if (input.classList.contains(color)) {
                colorActual = color;
            }
        });

        // Determinar el índice del próximo color
        let indiceActual = colores.indexOf(colorActual);
        let nuevoIndice = (indiceActual + 1) % colores.length;

        // Aplicar el nuevo color al input
        input.classList.remove(colorActual);
        input.classList.add(colores[nuevoIndice]);

        // Actualizar el valor del input (estado)
        input.value = colores[nuevoIndice].replace('bg-', '');
    }

    // Función para enviar el formulario y mostrar los datos en JSON
    function enviarFormulario(event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto

        // Obtener el formulario
        const formulario = document.getElementById('miFormulario');

        // Verificar que el formulario existe
        if (!formulario) {
            console.error('El formulario no se encontró en el DOM.');
            return;
        }

        // Obtener todos los inputs dentro del formulario
        const inputs = formulario.querySelectorAll('input[type="text"]');

        // Objeto para almacenar los datos de los inputs
        let datos = {};

        // Iterar sobre cada input y almacenar su valor en el objeto datos
        inputs.forEach(input => {
            datos[input.name] = input.value;
        });

        // Imprimir el objeto datos en formato JSON en la consola
        console.log(JSON.stringify(datos));
    }
</script>

@php
$primeros8 = 8; // Cambié el nombre de la variable para mayor claridad
$primeros5 = 5;

$segundos8 = 8;
$segundos5 = 5;
@endphp

<div class="w-11/12 h-full py-20 border-l-8 border-l-teal-500 bg-white flex flex-col items-center justify-center border-r-4 border-r-teal-500 shadow-md shadow-neutral-500">
    <div class="w-9/12 flex items-center justify-center border-b-4 border-b-neutral-400">


        @for ($i = 11; $i < 19; $i++)
        <div class="flex items-center justify-center flex-col mr-2 mb-2">
            <span>{{ $i }}</span>
            <input type="hidden" name="estado{{ $i }}" value="rojo"> <!-- Input oculto para guardar el estado -->
            <input type="text" class="text-transparent cursor-pointer w-3 h-3 bg-teal-500" name="input{{ $i }}" onclick="cambiarEstado(this, {{ $i }})" />
            <div class="flex items-center justify-center">
                <input type="text" class="w-3 h-3 text-transparent cursor-pointer bg-teal-500" name="input{{ $i }}_1" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="m-1 w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_2" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="w-3 h-3 text-transparent cursor-pointer bg-teal-500" name="input{{ $i }}_3" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
            <input type="text" class="w-3 h-3 text-transparent cursor-pointer bg-teal-500" name="input{{ $i }}_4" onclick="cambiarEstado(this, {{ $i }})" />
        </div>
        @endfor

        <span class="mx-3 h-full w-1 bg-neutral-400"></span>

        @for ($i = 19; $i < 27; $i++)
            <div class="flex items-center justify-center flex-col mr-2 mb-2">
                <span>{{ $i }}</span>
                <input type="hidden" name="estado{{ $i }}" value="rojo"> <!-- Input oculto para guardar el estado -->
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}" onclick="cambiarEstado(this, {{ $i }})" />
                <div class="flex items-center justify-center">
                    <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_1" onclick="cambiarEstado(this, {{ $i }})" />
                    <input type="text" class="m-1 text-transparent cursor-pointer w-3 h-3 bg-teal-500" name="input{{ $i }}_2" onclick="cambiarEstado(this, {{ $i }})" />
                    <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_3" onclick="cambiarEstado(this, {{ $i }})" />
                </div>
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_4" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
        @endfor
    </div>








    <div class="w-9/12 flex items-center justify-center ">
        @for ($i = 27; $i < 35; $i++)
            <div class="flex items-center justify-center flex-col mr-2 mb-2">
                <span>{{ $i }}</span>
                <input type="hidden" name="estado{{ $i }}" value="rojo"> <!-- Input oculto para guardar el estado -->
            <input type="text" class="w-3 h-3 bg-teal-500 text-transparent cursor-pointer" name="input{{ $i }}" onclick="cambiarEstado(this, {{ $i }})" />
            <div class="flex items-center justify-center">
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_1" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="m-1 text-transparent cursor-pointer w-3 h-3 bg-teal-500" name="input{{ $i }}_2" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_3" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
            <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_4" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
        @endfor
        <span class="mx-3 h-full w-1 bg-neutral-400"></span>
        @for ($i = 35; $i < 43; $i++)
            <div class="flex items-center justify-center flex-col mr-2 mb-2">
                <span>{{ $i }}</span>
                <input type="hidden" name="estado{{ $i }}" value="rojo"> <!-- Input oculto para guardar el estado -->
            <input type="text" class="w-3 h-3 bg-teal-500 text-transparent cursor-pointer" name="input{{ $i }}" onclick="cambiarEstado(this, {{ $i }})" />
            <div class="flex items-center justify-center">
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_1" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="m-1 text-transparent cursor-pointer w-3 h-3 bg-teal-500" name="input{{ $i }}_2" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_3" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
            <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_4" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
        @endfor
    </div>

    <div class="w-6/12 flex items-center justify-center border-b-4 border-b-neutral-400 mt-5">
        @for ($i = 43; $i < 48; $i++)
            <div class="flex items-center justify-center flex-col mr-2 mb-2">
                <span>{{ $i }}</span>
                <input type="hidden" name="estado{{ $i }}" value="rojo"> <!-- Input oculto para guardar el estado -->
            <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}" onclick="cambiarEstado(this, {{ $i }})" />
            <div class="flex items-center justify-center">
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_1" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="m-1 text-transparent cursor-pointer w-3 h-3 bg-teal-500" name="input{{ $i }}_2" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_3" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
            <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_4" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
        @endfor
        <span class="mx-3 h-full w-1 bg-neutral-400"></span>
        @for ($i = 48; $i < 53; $i++)
            <div class="flex items-center justify-center flex-col mr-2 mb-2">
                <span>{{ $i }}</span>
                <input type="hidden" name="estado{{ $i }}" value="rojo"> <!-- Input oculto para guardar el estado -->
            <input type="text" class="w-3 h-3 bg-teal-500 text-transparent cursor-pointer" name="input{{ $i }}" onclick="cambiarEstado(this, {{ $i }})" />
            <div class="flex items-center justify-center">
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_1" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="m-1 text-transparent cursor-pointer w-3 h-3 bg-teal-500" name="input{{ $i }}_2" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_3" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
            <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_4" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
        @endfor
    </div>
    <div class="w-9/12 flex items-center justify-center ">
        @for ($i = 52; $i < 57; $i++)
            <div class="flex items-center justify-center flex-col mr-2 mb-2">
                <span>{{ $i }}</span>
                <input type="hidden" name="estado{{ $i }}" value="rojo"> <!-- Input oculto para guardar el estado -->
            <input type="text" class="w-3 h-3 bg-teal-500 text-transparent cursor-pointer" name="input{{ $i }}" onclick="cambiarEstado(this, {{ $i }})" />
            <div class="flex items-center justify-center">
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_1" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="m-1 text-transparent cursor-pointer w-3 h-3 bg-teal-500" name="input{{ $i }}_2" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_3" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
            <input type="text" class="w-3 h-3 text-transparent cursor-pointer bg-teal-500" name="input{{ $i }}_4" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
        @endfor
        <span class="mx-3 h-full w-1 bg-neutral-400"></span>
        @for ($i = 57; $i < 62; $i++)
            <div class="flex items-center justify-center flex-col mr-2 mb-2">
                <span>{{ $i }}</span>
                <input type="hidden" name="estado{{ $i }}" value="rojo"> <!-- Input oculto para guardar el estado -->
            <input type="text" class="w-3 h-3 bg-teal-500 text-transparent cursor-pointer" name="input{{ $i }}" onclick="cambiarEstado(this, {{ $i }})" />
            <div class="flex items-center justify-center">
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_1" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="m-1 text-transparent cursor-pointer w-3 h-3 bg-teal-500" name="input{{ $i }}_2" onclick="cambiarEstado(this, {{ $i }})" />
                <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_3" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
            <input type="text" class="w-3 text-transparent cursor-pointer h-3 bg-teal-500" name="input{{ $i }}_4" onclick="cambiarEstado(this, {{ $i }})" />
            </div>
        @endfor
    </div>
    {{-- <button type="submit" onclick="enviarFormulario(event)">Enviar</button> --}}
</div>



<script>

    document.addEventListener('DOMContentLoaded', function () {
        // Seleccionar elementos del DOM
        const formulario = document.getElementById('formulario');
        const dientesArray = []; // Array para almacenar los dientes
    
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
    
            // Crear objeto con los valores del diente
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
    
            // Actualizar visualización o realizar otras operaciones según necesidad
            // Por ejemplo, actualizar una tabla visual de dientes capturados
    
            // Limpieza de campos después de cargar el diente (opcional)
            resetCampos();
        });
    
        // Función para limpiar campos después de cargar el diente (opcional)
        function resetCampos() {
            // Limpiar los campos que desees, como los inputs y selects
            document.getElementById('tipoDiente1').value = '';
            document.getElementById('estadoDiente1').value = '';
            document.getElementById('coronaSuperior').value = '';
            document.getElementById('coronaInferior').value = '';
            document.getElementById('coronaIzquierda').value = '';
            document.getElementById('coronaCentral').value = '';
            document.getElementById('coronaDerecha').value = '';
        }
    
        // Evento para enviar el formulario y mostrar el JSON en la ruta del action
        formulario.addEventListener('submit', function (event) {
            // Prevenir el envío del formulario (para evitar recarga de página)
            event.preventDefault();
    
            // Convertir el array de dientes a JSON
            const dientesJSON = JSON.stringify(dientesArray);
    
            // Agregar el JSON como un campo oculto al formulario
            const inputJSON = document.createElement('input');
            inputJSON.setAttribute('type', 'hidden');
            inputJSON.setAttribute('name', 'odontogramaJSON');
            inputJSON.setAttribute('value', dientesJSON);
            formulario.appendChild(inputJSON);
    
            // Enviar el formulario de manera asincrónica (opcional)
            enviarFormulario();
        });
        
    
    });
    
    
    </script>
    


{{-- 
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
    
    
    </script> --}}