<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'idCliente';
    public $timestamps = false;

    protected $fillable = [
        'idCliente', 'nombre', 'apellido', 'edad', 'dni',
    ];

    protected $hidden = [];

    public function cargarDesdeRequest($request){
        $this->idCliente = $request->input('id', $this->idCliente);
        $this->nombre = $request->input('txtNombre');
        $this->apellido = $request->input('txtApellido');
        $this->dni = $request->input('txtDni');
        $this->edad = $request->input('txtEdad');
    }  
    
    public function obtenerTodos()
    {
        $sql = "SELECT
                  idCliente,
                  nombre,
                  apellido,
                  edad
                FROM clientes ORDER BY idCliente";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerNombreApellido()
    {
        return Cliente::orderBy('idCliente')->select('idCliente', 'nombre', 'apellido')->get();
    }

    public function guardar()
    {
        $cliente = Cliente::updateOrCreate(
            ['idCliente' => $this->idCliente],
            [
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'edad' => $this->edad,
                'dni' => $this->dni,
            ]
        );
    }
    


    #--------------------------------------------------------------------------------------
    public function eliminar(){
        #crear query(consulta) en una variable
        $sql = "DELETE FROM clientes WHERE idCliente=?";
    
        $affected = DB::delete($sql, [$this->idCliente]);
    }
    #--------------------------------------------------------------------------------------

}
