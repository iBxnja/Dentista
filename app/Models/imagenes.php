<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagenes extends Model
{
    protected $table = 'imagenes';
    protected $primaryKey = 'idImagen';
    public $timestamps = false;

    protected $fillable = [
        'imagen', 'titulo', 'texto', 'fk_idCliente',
    ];

    public function cargarDesdeRequest($request)
    { 
        $this->idImagen = $request->input('id') != "0" ? $request->input('id') : $this->idImagen;
        $this->imagen = $request->file('imagen');
        $this->titulo = $request->input('txtTitulo');
        $this->texto = $request->input('txtTexto');
        $this->fk_idCliente = $request->input('lstfk_idCliente');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_idCliente', 'idCliente');
    }

    public function obtenerTodos()
    {
        // Esta función ya no se utiliza en el controlador
        // Deberías obtener todas las imágenes directamente en el controlador usando 'get()'
        // De todas maneras, si la necesitas en otro lugar, puedes dejarla como está
        $lstRetorno = DB::table('imagenes')
            ->select('idImagen', 'imagen', 'titulo', 'texto', 'fk_idCliente')
            ->get();
    
        return $lstRetorno;
    }

    public function guardar()
    {
        // Utiliza findOrNew para encontrar o crear una nueva instancia
        $foto = imagenes::findOrNew($this->idImagen);

        // Asigna valores a la instancia
        $foto->imagen = $this->imagen;
        $foto->titulo = $this->titulo;
        $foto->texto = $this->texto;
        $foto->fk_idCliente = $this->fk_idCliente;

        // Guarda la imagen en la base de datos
        $foto->save();
    }

    public function eliminar()
    {
        // Elimina el modelo por su clave primaria
        imagenes::destroy($this->idImagen);
    }
}
