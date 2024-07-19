<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorCita extends Controller
{
    public function index(){
        return view('citas.cita-correo');
    }
}
