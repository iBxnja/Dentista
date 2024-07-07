<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Odontograma extends Model
{
    protected $table = 'odontograma';
    protected $primaryKey = 'idOdontograma';
    public $timestamps = false;

    protected $fillable = [
        'idOdontograma', 'dientes', 'obraSocial', 'codigo', 'fk_idCliente', 'afiliado', 'mes', 'plan',
        'anio','edad','titular','fechaNac','domicilio','parentesco','grupoFamiliar','localidad',
        'lugarTitular','odontologo','numeroOdontograma','matricula',
    ];

    protected $casts = [
        'dientes' => 'array', // Esto indica a Laravel que el campo 'dientes' es de tipo array
    ];
    protected $hidden = [];

    public function cargarDesdeRequest($request){
        $this->idOdontograma = $request->input('id', $this->idOdontograma);

        $this->obraSocial = $request->input('obraSocial');
        $this->codigo = $request->input('codigo');
        $this->fk_idCliente = $request->input('fk_idCliente');
        $this->afiliado = $request->input('afiliado');
        $this->mes = $request->input('mes');
        $this->plan = $request->input('plan');
        $this->anio = $request->input('anio');
        $this->edad = $request->input('edad');
        $this->titular = $request->input('titular');
        $this->fechaNac = $request->input('fechaNac');
        $this->domicilio = $request->input('domicilio');
        $this->parentesco = $request->input('parentesco');
        $this->grupoFamiliar = $request->input('grupoFamiliar');
        $this->localidad = $request->input('localidad');
        $this->lugarTitular = $request->input('lugarTitular');
        $this->odontologo = $request->input('odontologo');
        $this->numeroOdontograma = $request->input('numeroOdontograma');
        $this->matricula = $request->input('matricula');
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_idCliente', 'idCliente');
    }

    public function obtenerTodos()
{
    $sql = "SELECT
              idOdontograma,
              dientes,
              obraSocial,
              codigo,
              fk_idCliente,
              afiliado,
              mes,
              plan,
              anio,
              edad,
              titular,
              fechaNac,
              domicilio,
              parentesco,
              grupoFamiliar,
              localidad,
              lugarTitular,
              odontologo,
              numeroOdontograma,
              matricula
            FROM odontograma ORDER BY idOdontograma";
    $lstRetorno = DB::select($sql);
    return $lstRetorno;
}

    
    public function guardar($datos)
    {
        // Asignar los valores al modelo desde los datos recibidos
        $this->fill($datos);

        // Guardar el odontograma en la base de datos
        $this->save();

        return $this;
    }
    
    #--------------------------------------------------------------------------------------
    public function eliminar(){
        #crear query(consulta) en una variable
        $sql = "DELETE FROM odontograma WHERE idOdontograma=?";
    
        $affected = DB::delete($sql, [$this->idOdontograma]);
    }
    #--------------------------------------------------------------------------------------





}


