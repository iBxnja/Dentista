<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ControladorNota extends Controller
{
    public function index(Request $request)
{
    $buscarpor = $request->get('buscarpor');
    
    $nota = new Nota();
    
    // Utiliza Eloquent para obtener todas las notas
    $query = $nota->query();
    
    // Verifica si se proporcionó un término de búsqueda
    if ($buscarpor) {
        $query->where('titulo', 'like', '%' . $buscarpor . '%');
        // Reemplaza 'nombre_campo_de_busqueda' con el nombre real del campo que deseas buscar en la tabla de notas
    }
    
    $aNota = $query->get();
    
    return view('notas.notas-listar', compact('aNota', 'buscarpor'));
}


    public function enviarNombreApellido()
    {
        $cliente = new Cliente();
        $aCliente = $cliente->obtenerNombreApellido();
        $nota = new Nota();
        $aNota = $nota->obtenerTodos();
        return view('notas.notas-nuevo', compact('aCliente', 'aNota'));
    }


    public function guardar(Request $request)
        {
            $Nota = new Nota();
            $Nota->cargarDesdeRequest($request);
            // dd($Nota);
            if (empty($Nota->titulo) || empty($Nota->texto) || empty($Nota->numeroSesion) || empty($Nota->fk_idCliente)) {
                $error = "¡Parece que ocurrió un error!.";
                return view('inicio.inicio', compact('error'));
            } else {
                $Nota->guardar();

                // Almacenar información de la nota en la sesión
                session(['notaGuardada' => [
                    'id' => $Nota->idNota,
                    'titulo' => $Nota->titulo,
                    'texto' => $Nota->texto,
                    'numeroSesion' => $Nota->numeroSesion,
                    'fk_idCliente' => $Nota->fk_idCliente,
                ]]);
                // dd(session('notaGuardada'));
                // Mensaje de éxito
                $mensaje = "¡Excelente, se agregó correctamente la nota!";
                
                // Redirigir a la vista con el mensaje
                return view('inicio.inicio', compact('mensaje'));
            }
        }


        public function eliminar($id)
    {
        $nota = Nota::find($id);

        if ($nota) {
            // Almacenar información de la nota en la sesión antes de eliminarla
            session(['notaEliminada' => [
                'id' => $nota->idNota, // Asegúrate de ajustar el nombre de la columna según tu modelo
                'titulo' => $nota->titulo, // Asegúrate de ajustar el nombre de la columna según tu modelo
                'contenido' => $nota->texto, // Asegúrate de ajustar el nombre de la columna según tu modelo
                'numeroSesion' => $nota->numeroSesion, // Asegúrate de ajustar el nombre de la columna según tu modelo
                'fk_idCliente' => $nota->fk_idCliente, // Asegúrate de ajustar el nombre de la columna según tu modelo
            ]]);

            // Eliminar la nota
            $nota->eliminar(); // Asegúrate de tener un método eliminar() en tu modelo Nota
            $mensaje = "Excelente, se elimino la nota con exito";
            return view('inicio.inicio', compact('mensaje')); 
            // Hacer un dd del contenido de la sesión notaEliminada
            // dd(session('notaEliminada'));
        } else {
            // Mensaje de error
            $error = "¡Parece que ocurrió un error!.";

            // Redirigir a la vista con el mensaje de error
            return view('inicio.inicio', compact('error'));
        }
    }
        


    public function mostrarNota($id)
    {    
        // Dump para verificar si la ID llega correctamente
        // dd($id);
    
        // Obtén la nota por su ID
        $nota = Nota::find($id);
    
        // Verifica si la nota fue encontrada
        if (!$nota) {
            abort(404); // Devuelve un error 404 si la nota no existe
        }
    
        // Envia la nota a la vista 'notas-mostrar.blade.php'
        return view('notas.notas-mostrar', compact('nota'));
    }
    
    
    
}
