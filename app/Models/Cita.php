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
        $cita = new Cita(); // Crear una nueva instancia del modelo Nota
    
        // Asignar los valores a los atributos del modelo
        $cita->dia = $this->dia;
        $cita->numero = $this->numero;
        $cita->mes = $this->mes;
        $cita->hora = $this->hora;
        $cita->consulta = $this->consulta;
        $cita->fk_idCliente = $this->fk_idCliente;
    
        // Guardar el nuevo registro en la base de datos
        $cita->save();
    
        // Opcional: Puedes retornar el modelo de Nota creado si lo necesitas
        return $cita;
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


    public function registrosCliente($id){
        // Construir la consulta SQL dinámica
        $sql = "
            SELECT * 
            FROM citas 
            WHERE fk_idCliente = ?
        ";
    
        // Ejecutar la consulta con el ID proporcionado como parámetro
        $registros = DB::select($sql, [$id]);
    
        // Retornar los resultados de la consulta
        return $registros;
    }



}
