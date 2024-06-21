<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Imagenes;
use App\Models\Cita;
use App\Models\Nota;
use App\Models\Calendario;
use App\Models\Odontograma;
use Illuminate\Http\Request;

class ControladorWebInforme extends Controller
{
    public function index(){

        $cliente = New Cliente();
        $aClientes = $cliente->obtenerTodos();

        $totalClientes = Cliente::count();
        $totalImagenes = Imagenes::count();
        $totalNotas = Nota::count();
        $totalCalendario = Calendario::count();
        $totalOdontograma = Odontograma::count();

        return view('informe.informe-listar', compact('totalClientes', 'totalImagenes', 'totalNotas', 'aClientes', 'totalCalendario', 'totalOdontograma'));
    }
}
