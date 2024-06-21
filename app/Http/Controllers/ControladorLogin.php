<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Log;
class ControladorLogin extends Controller
{
    public function index(){

        return view('login.login');


    }




public function loginVerify(Request $request)
{
    // Validar datos del formulario
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Obtener el usuario de la base de datos
    $user = User::where('email', $request->email)->first();

    // Verificar si el usuario existe y la contraseña coincide
    if ($user && $this->validatePassword($request->password, $user->password)) {
        // Autenticar al usuario
        Auth::login($user);

        $request->session()->regenerate();
        
        // Redirigir a la página deseada después del inicio de sesión
        return redirect('/inicio');
    }

    // Autenticación fallida
    $error = "Email y/o contraseña incorrectas";
    return view('login.login', compact('error'));
}

// Función para validar la contraseña de manera segura
private function validatePassword($inputPassword, $hashedPassword)
{
    return hash_equals($hashedPassword, $inputPassword);
}















    #cerrar la session
    public function destroy() {
        #cerrame la session
        auth()->logout();
    
        # Mensaje para la siguiente solicitud
        $mensaje = 'Has salido correctamente';
        session()->flash('mensaje', $mensaje);
    
        # Redirección
        return redirect()->to('/login/login');
    }
}


