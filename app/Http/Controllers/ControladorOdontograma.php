<?php

namespace App\Http\Controllers;
use App\Models\Odontograma;
use App\Models\Cliente;
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
    

    public function enviarNombreApellido(){
        $cliente = new Cliente();
        $aCliente = $cliente->obtenerNombreApellido();
        $odontograma = new Odontograma();
        $aOdontograma = $odontograma->obtenerTodos();
        return view('odontograma.odontograma-nuevo', compact('aCliente','aOdontograma'));
    }
    
    public function guardar(Request $request)
{
    // dd($request->all());
    $odontograma = new Odontograma();
    $odontograma->cargarDesdeRequest($request);
    // dd($odontograma);
    if (empty($odontograma->obraSocial)) {
        $error = "¡Parece que ocurrió un error!.";
        return view('inicio.inicio', compact('error'));
    } else {
        // Obtener el JSON desde la solicitud
        $odontogramaJSON = $request->input('odontogramaJSON');

        // Convertir el JSON a un array
        $odontogramaArray = json_decode($odontogramaJSON, true);
        // dd($odontogramaArray);
        // Guardar los datos en la base de datos
        $odontograma->guardar($odontogramaArray);

        // Almacenar información del odontograma en la sesión
        session(['odontogramaGuardado' => [
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
            'odontogramaJSON' => $odontogramaJSON,
        ]]);
        // $mensajeSession = 'session';
        // dd(session('odontogramaGuardado'), 'mensajeSession');

        // Mensaje de éxito
        $mensaje = "¡Perfecto, se agregó correctamente el odontograma!";

        // Redirigir a la vista con el mensaje
        return view('inicio.inicio', compact('mensaje'));
    }
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
        abort(404); // Devuelve un error 404 si el odontograma no existe
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
