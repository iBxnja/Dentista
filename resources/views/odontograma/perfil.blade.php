<div class="w-full h-full flex items-center justify-center flex-col">
  <div class="w-full h-full bg-teal-300 shadow-neutral-300 shadow-md flex flex-col items-center justify-center">
      <div id="obraSocial" class="w-full h-40 cel:h-full flex items-center justify-center cel:flex-col">
          <div class="w-1/4 text-center cel:w-full cel:py-5">
              <h2 class="text-3xl italic text-white">CIRCULO<br>
              ODONTOLOGICO<br>
          CONCORDIA</h2>
          </div>
          <div class="w-3/4 cel:w-full cel:py-5 cel:text-center">
              <div class="w-full flex items-center justify-start mb-4 cel:flex-col cel:justify-center">
                  <label for="obraSocial" class="text-lg mr-3 cel:text-sm cel:text-center text-white">Obra social:</label>
                  <input type="text" name="obraSocial" id="obraSocial" placeholder="Ej: 32" class="cel:text-center w-9/12 2xl:text-start xl:text-start lg:text-start md:text-start border-b-2 border-white text-white focus:outline-none bg-transparent">
              </div>
              <div class="w-full flex items-center justify-start cel:flex-col cel:justify-center">
                  <label for="codigo" class="text-lg mr-3 cel:text-sm cel:text-center text-white">Codigo N°</label>
                  <input type="text" name="codigo" id="codigo" placeholder="Ej: 32" class="cel:text-center w-9/12 2xl:text-start xl:text-start lg:text-start md:text-start border-b-2 border-white text-white focus:outline-none bg-transparent">
              </div>
          </div>
      </div>
  </div>


  <div class="w-full mt-12 h-full bg-teal-300 shadow-neutral-300 shadow-md flex flex-col items-center justify-center">
        <div class="w-full flex items-center justify-center py-5 cel:flex-col">
              <div class="flex items-center justify-center w-2/4 cel:w-full cel:mb-5 flex-col">
                  <label for="mes" class="text-lg cel:text-sm cel:text-center text-white">Mes</label>
                  <select name="mes" id="mes" class="w-8/12 text-center border-b-2 border-white cursor-pointer text-white appearance-none focus:outline-none bg-transparent">
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
              <div class="flex items-center justify-center w-2/4 cel:w-full flex-col">
                  <label for="anio" class="text-lg cel:text-sm cel:text-center text-white">Año</label>
                  <input type="text" name="anio" id="anio" class="w-8/12 text-center border-b-2 border-white text-white focus:outline-none bg-transparent">
              </div>
        </div>

      <div class="w-full flex items-center justify-center pb-5 cel:flex-col">
          <div class="flex items-center justify-center w-2/4 cel:w-full cel:mb-5 flex-col">
              <label for="fk_idCliente" class="text-lg cel:text-sm cel:text-center text-white">Paciente</label>
              <select name="fk_idCliente" id="fk_idCliente" class="cel:text-center w-8/12 text-center border-b-2 border-white text-white appearance-none cursor-pointer focus:outline-none bg-transparent">
              {{-- foreach --}}
              <option disabled selected>Seleccione un cliente</option>
                  @foreach ($aCliente as $cliente)
                  <option class="text-black cel:text-sm cel:text-center" value="{{ $cliente->idCliente }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
              @endforeach
              {{-- endForeach --}}
              </select>
          </div>
          <div class="flex items-center justify-center w-2/4 cel:w-full flex-col">
              <label for="afiliado" class="text-lg cel:text-sm cel:text-center text-white">Afiliado</label>
              <input type="text" name="afiliado" id="afiliado" class="w-8/12 text-center border-b-2 border-white text-white focus:outline-none bg-transparent">
          </div>
      </div>

      <div class="w-full flex items-center justify-center pb-5 cel:flex-col">
          <div class="flex items-center justify-center w-2/4 cel:w-full cel:mb-5 flex-col">
              <label for="plan" class="text-lg cel:text-sm cel:text-center text-white">Plan</label>
              <input type="text" name="plan" id="plan" class="w-8/12 text-center border-b-2 border-white text-white focus:outline-none bg-transparent">
          </div>
          <div class="flex items-center justify-center w-2/4 cel:w-full flex-col">
              <label for="titular" class="text-lg cel:text-sm cel:text-center text-white">Titular</label>
              <input type="text" name="titular" id="titular" class="w-8/12 text-center border-b-2 border-white text-white focus:outline-none bg-transparent">
          </div>
      </div>

      <div class="w-full flex items-center justify-center pb-5 cel:flex-col">
          <div class="flex items-center justify-center w-2/4 cel:w-full cel:mb-5 flex-col">
              <label for="grupoFamiliar" class="text-lg cel:text-sm cel:text-center text-white">Grupo Familiar</label>
              <input type="text" name="grupoFamiliar" id="grupoFamiliar" class="w-8/12 text-center border-b-2 border-white text-white focus:outline-none bg-transparent">
          </div>
          <div class="flex items-center justify-center w-2/4 cel:w-full flex-col">
              <label for="parentesco" class="text-lg cel:text-sm cel:text-center text-white">Parentesco</label>
              <input type="text" name="parentesco" id="parentesco" class="w-8/12 text-center border-b-2 border-white text-white focus:outline-none bg-transparent">
          </div>
      </div>

      <div class="w-full flex items-center justify-center pb-5 cel:flex-col">
          <div class="flex items-center justify-center w-2/4 cel:w-full cel:mb-5 flex-col">
              <label for="edad" class="text-lg cel:text-sm cel:text-center text-white">Edad</label>
              <input type="text" name="edad" id="edad" class="w-8/12 text-center border-b-2 border-white text-white focus:outline-none bg-transparent">
          </div>
          <div class="flex items-center justify-center w-2/4 cel:w-full flex-col">
              <label for="fechaNac" class="text-lg cel:text-sm cel:text-center text-white">Fecha Nacimiento</label>
              <input type="text" name="fechaNac" id="fechaNac" class="w-8/12 text-center border-b-2 border-white text-white focus:outline-none bg-transparent">
          </div>
      </div>

      <div class="w-full flex items-center justify-center pb-5 cel:flex-col">
          <div class="flex items-center justify-center w-2/4 cel:w-full cel:mb-5  flex-col">
              <label for="domicilio" class="text-lg cel:text-sm cel:text-center text-white">Domicilio</label>
              <input type="text" name="domicilio" id="domicilio" class="w-8/12 text-center border-b-2 border-white text-white focus:outline-none bg-transparent">
          </div>
          <div class="flex items-center justify-center w-2/4 cel:w-full flex-col">
              <label for="localidad" class="text-lg cel:text-sm cel:text-center text-white">Localidad</label>
              <input type="text" name="localidad" id="localidad" class="w-8/12 text-center border-b-2 border-white text-white focus:outline-none bg-transparent">
          </div>
      </div>

      <div class="w-full flex items-center justify-center pb-5 cel:flex-col">
          <div class="flex items-center justify-center w-2/4 flex-col cel:w-full cel:mb-5">
              <label for="lugarTitular" class="text-lg cel:text-sm cel:text-center text-white">Lugar de trabajo del titular</label>
              <input type="text" name="lugarTitular" id="lugarTitular" class="w-8/12 text-center border-b-2 border-white text-white focus:outline-none bg-transparent">
          </div>
          <div class="flex items-center justify-center w-2/4 cel:w-full flex-col">
              <label for="numeroOdontograma" class="text-lg cel:text-sm cel:text-center text-white">Doc N°</label>
              <input type="text" name="numeroOdontograma" id="numeroOdontograma" class="w-8/12 text-center border-b-2 border-white text-white focus:outline-none bg-transparent">
          </div>
      </div>

  </div>


</div>