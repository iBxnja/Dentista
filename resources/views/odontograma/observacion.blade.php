<div class="w-full h-full bg-teal-300 shadow-neutral-300 shadow-md flex cel:flex-col items-center justify-center my-5 py-10">
    <div class="w-1/4 cel:w-11/12 h-96 flex items-center justify-center flex-col">
      <h4 class="text-lg text-white">Informe general de dientes</h4>
      <div class="w-full h-full  flex items-center justify-center flex-col">
        
        <div class="w-full flex items-center justify-center mb-4 mt-4">
          <label for="cariado" class="w-2/4 text-center text-white">Cariados</label>
          <input type="text" placeholder="Ej: 4" name="cariado" class="w-2/4 border-b-2 border-white text-white focus:outline-none bg-transparent text-center">
        </div>
        
        <div class="w-full flex items-center justify-center mt-4 mb-4">
          <label for="obturado" class="w-2/4 text-center text-white">Obturados</label>
          <input type="text" placeholder="Ej: 2" name="obturado" class="w-2/4 border-b-2 border-white text-white focus:outline-none bg-transparent text-center">
        </div>
        
        <div class="w-full flex items-center justify-center mt-4 mb-4">
          <label for="perdida" class="w-2/4 text-center text-white">Perdida por caries</label>
          <input type="text" placeholder="Ej: 5" name="perdida" class="w-2/4 border-b-2 border-white text-white focus:outline-none bg-transparent text-center">
        </div>

        <div class="w-full flex items-center justify-center mt-4 mb-4">
          <label for="extraccion" class="w-2/4 text-center text-white">Extracciones</label>
          <input type="text" placeholder="Ej: 8" name="extraccion" class="w-2/4 border-b-2 border-white text-white focus:outline-none bg-transparent text-center">
        </div>

        <div class="w-full flex items-center justify-center mt-4 mb-4">
          <label for="sano" class="w-2/4 text-center text-white">Sanos</label>
          <input type="text" placeholder="Ej: 20" name="sano" class="w-2/4 border-b-2 border-white text-white focus:outline-none bg-transparent text-center">
        </div>

      </div>
    </div>

    <div class="cel:ml-0 cel:mt-5 ml-5 cel:w-11/12 w-8/12 h-96 cel:items-center flex items-start justify-center flex-col">
      <h4 class="text-lg text-white">Observaciones:</h4>
      <textarea name="observacion" id="observacion" placeholder="Escribe la observación general de los dientes" class="shadow-neutral-400 shadow-md resize-none h-full w-full overflow-x-hidden"></textarea>
    </div>

  </div>