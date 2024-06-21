<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';
    protected $primaryKey = 'idCita';
    public $timestamps = false;

    protected $fillable = [
        'idCita', 'dia', 'numero', 'mes', 'fk_idCliente', 'hora', 'consulta',
    ];

    public function cargarDesdeRequest($request){
        $this->idCita = $request->input('id', $this->idCita);
        $this->dia = $request->input('txtDia');
        $this->numero = $request->input('txtNumero');
        $this->mes = $request->input('txtMes');
        $this->hora = $request->input('lstHora');
        $this->consulta = $request->input('lstConsulta');
        $this->fk_idCliente = $request->input('fk_idCliente'); // Cambio aquí
    }

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idCita,
                  dia,
                  numero,
                  mes,
                  hora,
                  consulta,
                  fk_idCliente
                FROM citas ORDER BY idCita";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }


    public function guardar()
    {
        $cita = Cita::updateOrCreate(
            ['idCita' => $this->idCita],
            [
                'dia' => $this->dia,
                'numero' => $this->numero,
                'mes' => $this->mes,
                'hora' => $this->hora,
                'consulta' => $this->consulta,
                'fk_idCliente' => $this->fk_idCliente,
            ]
        );
    }


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_idCliente', 'idCliente');
    }
    
    public function obtenerTodosConNombreCliente()
    {
        return Cita::with('cliente')->orderBy('idCita')->get();
    }


    #--------------------------------------------------------------------------------------
    public function eliminar(){
        #crear query(consulta) en una variable
        $sql = "DELETE FROM citas WHERE idCita=?";
    
        $affected = DB::delete($sql, [$this->idCita]);
    }
    #--------------------------------------------------------------------------------------

}
