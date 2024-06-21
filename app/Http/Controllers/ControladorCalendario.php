<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ControladorCalendario extends Controller
{
    public function buscarpor(Request $request)
    {
        $buscarpor = $request->get('buscarpor');

        $calendario = New Calendario();
        $query = $calendario->query();
        if ($buscarpor) {
            $query->where('nombre', 'like', '%' . $buscarpor . '%');
            // Reemplaza 'nombre_campo_de_busqueda' con el nombre real del campo que deseas buscar en la tabla de notas
        }
        $aCalendario = $query->get();
        return view('citas.cita-listado', compact('aCalendario', 'buscarpor'));
    }



    public function index()
{
    return view('citas.cita-listar');
}



    public function enviarListado(){
        $calendario = New Calendario();
        $aCalendario = $calendario->obtenerTodos();


        return view('citas.cita-listado', compact('aCalendario'));
    }

    public function enviarNombreApellido(){
        $cliente = new Cliente();
        $aCliente = $cliente->obtenerNombreApellido();
        return view('citas.cita-nuevo', compact('aCliente'));
    }


    public function getEvents()
    {
        $citas = Calendario::all();
    
        $eventos = [];
    
        foreach ($citas as $cita) {
            // Convierte la fecha a objeto DateTime si no lo es
            $fecha = is_string($cita->fecha) ? new \DateTime($cita->fecha) : $cita->fecha;
    
            $eventos[] = [
                'titulo' => $cita->nombre,
                'fecha' => $fecha->format('Y-m-d\TH:i:s'),
            ];
        }
    
        return response()->json($eventos);
    }
    

    public function crearCita(Request $request)
{
    // Valida los datos del formulario
    $request->validate([
        'nombre' => 'required|string',
        'fecha' => 'required|date',
    ]);

    try {
        // Crea una nueva cita en la base de datos
        $nuevaCita = Calendario::create([
            'nombre' => $request->input('nombre'),
            'fecha' => $request->input('fecha'),
        ]);

        // Almacena información de la cita en la sesión antes de mostrar el mensaje
        session(['citaAgregada' => [
            'id' => $nuevaCita->idCalendario, // Asegúrate de ajustar el nombre de la columna según tu modelo
            'nombre' => $nuevaCita->nombre, // Asegúrate de ajustar el nombre de la columna según tu modelo
            'fecha' => $nuevaCita->fecha, // Asegúrate de ajustar el nombre de la columna según tu modelo
            // Puedes agregar más campos según sea necesario
        ]]);

        // Mensaje de éxito
        $mensaje = "¡Excelente, se agregó correctamente la cita!";
        return view('inicio.inicio', compact('mensaje'));
        // Hacer un dd del contenido de la sesión citaAgregada
        // dd(session('citaAgregada'));
    } catch (\Exception $e) {
        // Mensaje de error
        $error = "¡Parece que ocurrió un error!.";
        return view('inicio.inicio', compact('error'));
    }
}





public function eliminar($id) {   
    $calendario = Calendario::find($id);

    if ($calendario) {
        // Almacena información de la cita en la sesión antes de eliminarla
        session(['citaEliminada' => [
            'id' => $calendario->idCalendario, // Ajusta el nombre de la columna según tu modelo
            'nombre' => $calendario->nombre, // Ajusta el nombre de la columna según tu modelo
            'fecha' => $calendario->fecha, // Ajusta el nombre de la columna según tu modelo
            // Puedes agregar más campos según sea necesario
        ]]);

        // Elimina la cita
        $calendario->eliminar();
        // Hacer un dd del contenido de la sesión citaEliminada
        // dd(session('citaEliminada'));

        // Mensaje de éxito
        $mensaje = "¡Excelente, se eliminó correctamente la cita!.";
        return view('inicio.inicio', compact('mensaje'));    
    } else {
        // Mensaje de error
        $error = "¡Parece que ocurrió un error!.";
        return view('cita.cita-listar', compact('error'));  
    }
}



}
