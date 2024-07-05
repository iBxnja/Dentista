<?php

namespace App\Http\Controllers;
use App\Models\Odontograma;
use App\Models\Cliente;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ControladorOdontograma extends Controller
{
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
    
        $odontograma = new Odontograma();

        $aOdontograma = $odontograma->when($buscarpor, function ($query) use ($buscarpor) {
            return $query->whereHas('cliente', function ($subquery) use ($buscarpor) {
                $subquery->where('nombre', 'like', '%' . $buscarpor . '%');
            });
        })->with('cliente')->get(); // Cargar datos del cliente asociado
    
        return view('odontograma.odontograma-listar', compact('aOdontograma', 'buscarpor'));
    }
    
    public function mostrar(){

        return view('odontograma.odontograma-nuevo');
    }

    public function enviarNombreApellido(){
        $cliente = new Cliente();
        $aCliente = $cliente->obtenerNombreApellido();
        $odontograma = new Odontograma();
        $aOdontograma = $odontograma->obtenerTodos();
        return view('odontograma.odontograma-nuevo', compact('aCliente','aOdontograma'));
    }
    



    public function guardar(Request $request)
    {
        // Obtener todos los datos del formulario
        $datosEstaticos = $request->only([
            'obraSocial', 'codigo', 'fk_idCliente', 'afiliado', 'mes', 'plan',
            'anio', 'edad', 'titular', 'fechaNac', 'domicilio', 'parentesco',
            'grupoFamiliar', 'localidad', 'lugarTitular', 'odontologo',
            'numeroOdontograma', 'matricula',
        ]);
    
        // Definir el rango de índices para los nombres de los campos de los dientes
        $inicio = 11;
        $fin = 60; // Ajusta el número final según tu necesidad
    
        $datosDientes = [];
    
        // Generar dinámicamente los nombres de los campos de los dientes y añadirlos al array
        for ($i = $inicio; $i <= $fin; $i++) {
            $datosDientes["estado$i"] = $request->input("estado$i");
            $datosDientes["input$i"] = $request->input("input$i");
            $datosDientes["input${i}_1"] = $request->input("input${i}_1");
            $datosDientes["input${i}_2"] = $request->input("input${i}_2");
            $datosDientes["input${i}_3"] = $request->input("input${i}_3");
            $datosDientes["input${i}_4"] = $request->input("input${i}_4");
        }
    
        // Convertir los datos de los dientes a JSON
        $datosEstaticos['dientes'] = json_encode($datosDientes);
    
        // Crear una nueva instancia del modelo Odontograma
        $odontograma = new Odontograma();
    
        // Llamar al método guardar del modelo Odontograma
        $odontograma->guardar($datosEstaticos);
    
        $mensaje = "Datos guardados correctamente";
    
        // Redirigir o devolver alguna respuesta según sea necesario
        return view('inicio.inicio', compact('mensaje'));
    }





    

    public function eliminar($id) {   
        $odontograma = Odontograma::find($id);
    
        if ($odontograma) {
            // Almacenar información del cliente en la sesión antes de eliminarlo
            session(['odontogramaEliminado' => [
                'id' => $odontograma->idOdontograma,
                'cariado' => $odontograma->cariado,
                'obturado' => $odontograma->obturado,
                'perdida' => $odontograma->perdida,
                'extraccion' => $odontograma->extraccion,
                'sano' => $odontograma->sano,
                'observacion' => $odontograma->observacion,
                'numeroOdontograma' => $odontograma->numeroOdontograma,
                'lugarTitular' => $odontograma->lugarTitular,
                'localidad' => $odontograma->localidad,
                'domicilio' => $odontograma->domicilio,
                'fechaNac' => $odontograma->fechaNac,
                'edad' => $odontograma->edad,
                'parentesco' => $odontograma->parentesco,
                'grupoFamiliar' => $odontograma->grupoFamiliar,
                'titular' => $odontograma->titular,
                'plan' => $odontograma->plan,
                'afiliado' => $odontograma->afiliado,
                'anio' => $odontograma->anio,
                'mes' => $odontograma->mes,
                'codigo' => $odontograma->codigo,
                'obraSocial' => $odontograma->obraSocial,
                'fk_idCliente' => $odontograma->fk_idCliente,
            ]]);
    
            // Eliminar el cliente
            $odontograma->eliminar();
            $mensaje = "¡Perfecto, se eliminó correctamente el odontograma!";
            return view('inicio.inicio', compact('mensaje'));  
            // Hacer un dd del contenido de la sesión clienteEliminado
            // dd(session('odontogramaEliminado'));
        } else {
            // Mensaje de error
            $error = "<span class='text-black font-bold'>¡Parece que ocurrió un error!.</span>";
    
            // Redirigir a la vista con el mensaje de error
            return view('inicio.inicio', compact('error'));  
        }
    }

    public function mostrarOdontograma($id)
{
    $odontograma = Odontograma::with('cliente')->find($id);

    if (!$odontograma) {
        abort(404);
    }

    $datosJson = json_decode($odontograma->dientes, true);

    return view('odontograma.odontograma-mostrar', compact('odontograma', 'datosJson'));
}






    // public function json(Request $request) {
    //     // Obtener los datos de los dientes
    //     dd($request->all());
    //     $odontograma = new Odontograma();
    //     $odontograma->cargarDesdeRequest($request);

    //         // Obtener el JSON desde la solicitud
    //         $odontogramaJSON = $request->input('odontogramaJSON');

    //         // Convertir el JSON a un array
    //         $odontogramaArray = json_decode($odontogramaJSON, true);

    //         // Guardar los datos en la base de datos
    //         $odontograma->guardar($odontogramaArray);          
    // }






}
