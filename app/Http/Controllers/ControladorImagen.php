<?php

namespace App\Http\Controllers;

use App\Models\imagenes;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ControladorImagen extends Controller
{
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor', '');

        $imagenes = new Imagenes();
        $query = $imagenes->query();

        if ($buscarpor) {
            $query->where(function ($imagenQuery) use ($buscarpor) {
                $imagenQuery->where('titulo', 'like', '%' . $buscarpor . '%')
                    ->orWhereHas('cliente', function ($clienteQuery) use ($buscarpor) {
                        $clienteQuery->where('nombre', 'like', '%' . $buscarpor . '%');
                    });
            });
        }

        $aImagenes = $query->with('cliente')->get();

        return view('imagenes.imagenes-listar', compact('aImagenes', 'buscarpor'));
    }

    public function enviarNombreApellido()
    {
        $cliente = new Cliente();
        $aCliente = $cliente->obtenerNombreApellido();
        $imagen = new Imagenes();
        $aImagen = $imagen->obtenerTodos();
        return view('imagenes.imagenes-nuevo', compact('aCliente', 'aImagen'));
    }










    public function guardar(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'lstfk_idCliente' => 'required',
            'txtTitulo' => 'required',
            'txtTexto' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);
        // dd($request->all());
        #sabias que la request trae un file?
        if ($request->hasFile('imagen')) {
            #encierro la imagen en una variable
            $imagen = $request->file('imagen');
            // dd($request->all());
            #encierro la ruta en una variable
            $urlImagen = 'imagenes/';
            #creo el nombre de la imagen
            $nombreImagen = time() . '-' . $imagen->getClientOriginalName();
            #intenta esto
            try {
                #subo la imagen
                $subirImagen = $imagen->move($urlImagen, $nombreImagen);
                print_r($subirImagen);
                // Uso Eloquent para crear y guardar el modelo
                $nuevaImagen = imagenes::create([
                    'imagen' => $urlImagen . $nombreImagen,
                    'titulo' => $request->input('txtTitulo'),
                    'texto' => $request->input('txtTexto'),
                    'fk_idCliente' => $request->input('lstfk_idCliente'),
                ]);

                session(['imagenGuardada' => [
                    'id' => $nuevaImagen->idImagen, // Asegúrate de ajustar el nombre de la columna según tu modelo
                    'titulo' => $nuevaImagen->titulo, // Asegúrate de ajustar el nombre de la columna según tu modelo
                    'texto' => $nuevaImagen->texto, // Asegúrate de ajustar el nombre de la columna según tu modelo
                    'fk_idCliente' => $nuevaImagen->fk_idCliente, // Asegúrate de ajustar el nombre de la columna según tu modelo
                    // Puedes agregar más campos según sea necesario
                ]]);
                $mensaje = "¡Excelente, se agregó correctamente la imagen!";
                return view('inicio.inicio', compact('mensaje'));
                // si se cumple
                return view('bien');
            } catch (\Exception $e) {
                // mandame aca si no se puede
                $error = "¡Parece que ocurrió un error!.";
                return view('inicio.inicio', compact('error'));
            }
        } else {
            // llevame a esta vista si no se sube ningun archivo
            $error = "¡Parece que ocurrió un error!.";
            return view('inicio.inicio', compact('error'));
        }
    }



    #-------------------------------


    // public function guardar(Request $request)
    // {

    //     $request->validate([
    //         'lstfk_idCliente' => 'required',
    //         'txtTitulo' => 'required',
    //         'txtTexto' => 'required',
    //         'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

    //     ]);
    //     // dd($request->all());
    //     if ($request->hasFile('imagen')) {
    //         $imagen = $request->file('imagen');
    //         $nombreImagen = time() . '-' . $imagen->getClientOriginalName();

    //         try {
    //             // Guardar la imagen en el directorio storage/app/public/imagenes
    //             $rutaImagen = $imagen->storeAs('app/public/imagenes', $nombreImagen);

    //             // Obtener la URL de la imagen almacenada en storage
    //             $urlImagen = Storage::url($rutaImagen);
    //             // print_r($rutaImagen);
    //             // print_r("°|°|°|°");
    //             // print_r($urlImagen);
    //             // dd($request->rutaImagen);
    //             // dd($request->nombreImagen);
    //             // Crear un nuevo registro en la base de datos
    //             $nuevaImagen = Imagenes::create([
    //                 'imagen' => $urlImagen,
    //                 'titulo' => $request->input('txtTitulo'),
    //                 'texto' => $request->input('txtTexto'),
    //                 'fk_idCliente' => $request->input('lstfk_idCliente'),
    //             ]);

    //             // Almacenar información de la imagen en la sesión antes de mostrar el mensaje
    //             session(['imagenGuardada' => [
    //                 'id' => $nuevaImagen->idImagen, // Asegúrate de ajustar el nombre de la columna según tu modelo
    //                 'titulo' => $nuevaImagen->titulo, // Asegúrate de ajustar el nombre de la columna según tu modelo
    //                 'texto' => $nuevaImagen->texto, // Asegúrate de ajustar el nombre de la columna según tu modelo
    //                 'fk_idCliente' => $nuevaImagen->fk_idCliente, // Asegúrate de ajustar el nombre de la columna según tu modelo
    //                 // Puedes agregar más campos según sea necesario
    //             ]]);

    //             // Mensaje de éxito
    //             $mensaje = "¡Excelente, se agregó correctamente la imagen!";
    //             return view('inicio.inicio', compact('mensaje')); 
    //             // Hacer un dd del contenido de la sesión imagenGuardada
    //             // dd(session('imagenGuardada'));
    //         } catch (\Exception $e) {
    //             $error = "¡Parece que ocurrió un error!.";
    //             return view('inicio.inicio', compact('error'));  
    //         }
    //     } else {
    //         $error = "¡Parece que ocurrió un error!.";
    //         return view('inicio.inicio', compact('error'));  
    //     }
    // }

























    public function eliminar($id)
    {
        $imagen = imagenes::find($id);

        if ($imagen) {
            // Almacenar información de la imagen en la sesión antes de eliminarla
            session(['imagenEliminada' => [
                'id' => $imagen->idImagen, // Asegúrate de ajustar el nombre de la columna según tu modelo
                'imagen' => $imagen->imagen, // Asegúrate de ajustar el nombre de la columna según tu modelo
                'titulo' => $imagen->titulo, // Asegúrate de ajustar el nombre de la columna según tu modelo
                'texto' => $imagen->texto, // Asegúrate de ajustar el nombre de la columna según tu modelo
                'fk_idCliente' => $imagen->fk_idCliente, // Asegúrate de ajustar el nombre de la columna según tu modelo

            ]]);

            // Eliminar la imagen
            $imagen->eliminar();
            $mensaje = "¡Excelente, se eliminó correctamente la imagen!";
            return view('inicio.inicio', compact('mensaje'));
            // Hacer un dd del contenido de la sesión imagenEliminada
            // dd(session('imagenEliminada'));
        } else {
            // Mensaje de error
            $error = "¡Parece que ocurrió un error!.";

            // Redirigir a la vista con el mensaje de error
            return view('inicio.inicio', compact('error'));
        }
    }
}
