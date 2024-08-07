<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';
    protected $primaryKey = 'idNota';
    public $timestamps = false;

    protected $fillable = [
        'idNota', 'titulo', 'texto', 'numeroSesion', 'fk_idCliente',
    ];

    protected $hidden = [];


    public function cargarDesdeRequest($request){
        $this->idNota = $request->input('id', $this->idNota);
        $this->titulo = $request->input('txtTitulo');
        $this->texto = $request->input('txtTexto');
        $this->numeroSesion = $request->input('txtNumeroSesion');
        $this->fk_idCliente = $request->input('lstfk_idCliente');
    }  
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_idCliente', 'idCliente');
    }

    public function obtenerTodos()
{
    return Nota::with('cliente')->orderBy('idNota')->get();
}
    


public function guardar()
{
    $nota = new Nota(); // Crear una nueva instancia del modelo Nota

    // Asignar los valores a los atributos del modelo
    $nota->titulo = $this->titulo;
    $nota->texto = $this->texto;
    $nota->numeroSesion = $this->numeroSesion;
    $nota->fk_idCliente = $this->fk_idCliente;

    // Guardar el nuevo registro en la base de datos
    $nota->save();

    // Opcional: Puedes retornar el modelo de Nota creado si lo necesitas
    return $nota;
}


    // public function guardar()
    // {
    //     $nota = Nota::updateOrCreate(
    //         ['idNota' => $this->idNota],
    //         [
    //             'titulo' => $this->titulo,
    //             'texto' => $this->texto,
    //             'numeroSesion' => $this->numeroSesion,
    //             'fk_idCliente' => $this->fk_idCliente,
    //         ]
    //     );
    // }
    
    #--------------------------------------------------------------------------------------
    public function eliminar(){
        #crear query(consulta) en una variable
        $sql = "DELETE FROM notas WHERE idNota=?";
    
        $affected = DB::delete($sql, [$this->idNota]);
    }
    #--------------------------------------------------------------------------------------



    public function registrosCliente($id){
        // Construir la consulta SQL dinámica
        $sql = "
            SELECT * 
            FROM notas 
            WHERE fk_idCliente = ?
        ";
    
        // Ejecutar la consulta con el ID proporcionado como parámetro
        $registros = DB::select($sql, [$id]);
    
        // Retornar los resultados de la consulta
        return $registros;
    }


}
