<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\imagenes;
use App\Models\Odontograma;
use App\Models\Nota;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ControladorCliente extends Controller
{
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
    
        $cliente = new Cliente();
    
        // Utiliza Eloquent para obtener todos los clientes
        $query = $cliente->query();
    
        // Verifica si se proporcionó un término de búsqueda
        if ($buscarpor) {
            $query->where('nombre', 'like', '%' . $buscarpor . '%');
        }
    
        $aClientes = $query->get();
    
        return view('cliente.cliente-listar', compact('aClientes', 'buscarpor'));
    }
    public function guardar(Request $request){
        // dd($request->all());
        $cliente = new Cliente();
        $cliente->cargarDesdeRequest($request);
        
        if (empty($cliente->nombre) || empty($cliente->apellido) || empty($cliente->edad)) {
            $error = "¡Parece que ocurrió un error!.";
            return view('inicio.inicio', compact('error'));
        } else {
            $cliente->guardar();
            session(['cliente' => [
                'id' => $cliente->idCliente,
                'nombre' => $cliente->nombre,
                'apellido' => $cliente->apellido,
                'edad' => $cliente->edad,
                'dni' => $cliente->dni,
                'observacion' => $cliente->observacion,
                'dni' => $cliente->dni,
                'celular' => $cliente->celular,
            ]]);
            
            // Hacer un dd de la información del cliente en la sesión
            // dd(session('cliente'));
            $mensaje = "¡Excelente, se agregó correctamente el cliente <span class='text-white font-bold'>$cliente->nombre $cliente->apellido</span>!.";
            // dd($mensaje);
            $aClientes = $cliente->obtenerTodos();
            return view('inicio.inicio', compact('mensaje'));  
        }
    }


    
    public function eliminar($id) {   
        $cliente = Cliente::find($id);
    
        if ($cliente) {
            // Almacenar información del cliente en la sesión antes de eliminarlo
            session(['clienteEliminado' => [
                'id' => $cliente->idCliente,
                'nombre' => $cliente->nombre,
                'apellido' => $cliente->apellido,
                'edad' => $cliente->edad,
                'dni' => $cliente->dni,
                'observacion' => $cliente->observacion,
                'dni' => $cliente->dni,
                'celular' => $cliente->celular,
            ]]);
    
            // Eliminar el cliente
            $cliente->eliminar();
            $mensaje = "Excelente, se elimino el cliente con exito";
            return view('inicio.inicio', compact('mensaje'));  
            // Hacer un dd del contenido de la sesión clienteEliminado
            // dd(session('clienteEliminado'));
        } else {
            // Mensaje de error
            $error = "¡Parece que ocurrió un error!.";
    
            // Redirigir a la vista con el mensaje de error
            return view('cita.cita-listar', compact('error'));  
        }
    }

    public function mostrarCliente($id){
        $cliente = Cliente::find($id);
        $clientes = new Cliente();
        $aClientes = $clientes->obtenerTodos();
        if (!$cliente) {
            abort(404); // Devuelve un error 404 si la nota no existe
        }
        return view('cliente.cliente-mostrar', compact('cliente', 'aClientes'));
    }
    
    
    public function mostrarHistorial($id){
        // Obtener el cliente por su ID
        $cliente = Cliente::findOrFail($id);

        $cliente = Cliente::find($id);
        $clientes = new Cliente();
        $aClientes = $clientes->obtenerTodos();
        if (!$cliente) {
            abort(404); // Devuelve un error 404 si la nota no existe
        }


        $imagenes = new imagenes();
        $imagen = $imagenes->registrosCliente($id);

        $notas = new Nota();
        $nota = $notas->registrosCliente($id);

        $Odontogramas = new Odontograma();
        $Odontograma = $Odontogramas->registrosCliente($id);

        $Citas = new Cita();
        $Cita = $Citas->registrosCliente($id);


        // dd([
        //     'imagenes' => $imagen,
        //     'nota' => $nota,
        //     'Odontograma' => $Odontograma,
        //     'Cita' => $Cita,
        // ]);
        return view('cliente.cliente-historial', compact('Cita','Odontograma','nota','imagen', 'cliente','aClientes'));
    }


}
