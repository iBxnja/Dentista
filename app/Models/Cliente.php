<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'idCliente';
    public $timestamps = false;

    protected $fillable = [
        'idCliente', 'nombre', 'apellido', 'edad', 'dni',
        'correo', 'observacion','celular'
    ];

    protected $hidden = [];

    public function cargarDesdeRequest($request){
        $this->idCliente = $request->input('id', $this->idCliente);
        $this->nombre = $request->input('txtNombre');
        $this->apellido = $request->input('txtApellido');
        $this->dni = $request->input('txtDni');
        $this->edad = $request->input('txtEdad');
        $this->correo = $request->input('txtCorreo');
        $this->observacion = $request->input('txtObservacion');
        $this->celular = $request->input('intCelular');
    }  
    

    public function obtenerNombreApellido()
    {
        return Cliente::orderBy('idCliente')->select('idCliente', 'nombre', 'apellido')->get();
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idCliente,
                  nombre,
                  apellido,
                  edad,
                  correo,
                  observacion,
                  celular
                FROM clientes ORDER BY idCliente";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    // public function traer()
    // {
    //     $sql = "SELECT
    //               idCliente,
    //               nombre,
    //               apellido,
    //               edad,
    //               correo,
    //               observacion,
    //               celular
    //             FROM clientes ORDER BY idCliente";
    //     $lstRetorno = DB::select($sql);
    //     return $lstRetorno;
    // }




    public function guardar()
    {
        $cliente = new Cliente(); // Crear una nueva instancia del modelo Nota
    
        // Asignar los valores a los atributos del modelo
        $cliente->nombre = $this->nombre;
        $cliente->apellido = $this->apellido;
        $cliente->edad = $this->edad;
        $cliente->dni = $this->dni;
        $cliente->correo = $this->correo;
        $cliente->observacion = $this->observacion;
        $cliente->celular = $this->celular;
    
        // Guardar el nuevo registro en la base de datos
        $cliente->save();
    
        // Opcional: Puedes retornar el modelo de Nota creado si lo necesitas
        return $cliente;
    }
    // public function guardar()
    // {
    //     $cliente = Cliente::updateOrCreate(
    //         ['idCliente' => $this->idCliente],
    //         [
    //             'nombre' => $this->nombre,
    //             'apellido' => $this->apellido,
    //             'edad' => $this->edad,
    //             'dni' => $this->dni,
    //         ]
    //     );
    // }
    


    #--------------------------------------------------------------------------------------
    public function eliminar(){
        #crear query(consulta) en una variable
        $sql = "DELETE FROM clientes WHERE idCliente=?";
    
        $affected = DB::delete($sql, [$this->idCliente]);
    }
    #--------------------------------------------------------------------------------------

}
