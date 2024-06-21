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
        $nota = Nota::updateOrCreate(
            ['idNota' => $this->idNota],
            [
                'titulo' => $this->titulo,
                'texto' => $this->texto,
                'numeroSesion' => $this->numeroSesion,
                'fk_idCliente' => $this->fk_idCliente,
            ]
        );
    }
    
    #--------------------------------------------------------------------------------------
    public function eliminar(){
        #crear query(consulta) en una variable
        $sql = "DELETE FROM notas WHERE idNota=?";
    
        $affected = DB::delete($sql, [$this->idNota]);
    }
    #--------------------------------------------------------------------------------------


}
