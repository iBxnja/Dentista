<div class="w-11/12 h-full mb-10 py-10 flex shadow-md shadow-neutral-400 items-center justify-center bg-white border-l-8 border-l-teal-500 border-r-4 border-r-teal-500">
    <div class="w-6/12 h-full flex items-start justify-center flex-col gap-8">
        <div class="ml-10 flex flex-col w-72">
            <label for="">PACIENTE:</label>
            <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none" type="text" name="fk_idCliente" id="">
        </div>
        <div class="ml-10 flex flex-col w-72">
            <label for="">MES:</label>
            <select name="mes" class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none">
                    <option disabled selected>Seleccione un mes</option>
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
            </select>
        </div>
        <div class="ml-10 flex flex-col w-72">
            <label for="">AFILIADO N°:</label>
            <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none" type="text" name="afiliado" id="">
        </div>
    </div>
    <div class="w-5/12 h-full flex items-start justify-center flex-col gap-8">
        <div class="ml-10 flex flex-col w-72">
            <label for="">AÑO:</label>
            <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none" type="text" inputmode="numeric" pattern="[0-9]*"name="anio" id="">
        </div>
        <div class="ml-10 flex flex-col w-72">
            <label for="">EDAD:</label>
            <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none" type="text" inputmode="numeric" pattern="[0-9]*" name="edad" id="">
        </div>
        <div class="ml-10 flex flex-col w-72">
            <label for="">PLAN:</label>
            <input class="border-transparent border-b-2 border-b-teal-500 py-1 focus:outline-none" type="text" name="plan" id="">
        </div>
    </div>
</div>