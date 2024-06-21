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
        'idOdontograma', 'cariado', 'obturado', 'perdida', 'extraccion', 'sano', 'observacion', 'fk_idCliente', 'dientes', 'numeroOdontograma',
        'obraSocial', 'codigo', 'mes', 'anio', 'afiliado', 'plan', 'titular', 'grupoFamiliar','parentesco',
        'edad', 'fechaNac', 'domicilio', 'localidad','lugarTitular',
    ];

    protected $hidden = [];

    public function cargarDesdeRequest($request){
        $this->idOdontograma = $request->input('id', $this->idOdontograma);
        $this->piezasPadecientes = $request->input('piezasPadecientes');
        $this->infantil = $request->input('infantil');
        $this->adulto = $request->input('adulto');
        $this->mayor = $request->input('mayor');
        $this->doctora = $request->input('doctora');
        $this->cariado = $request->input('cariado');
        $this->obturado = $request->input('obturado');
        $this->perdida = $request->input('perdida');
        $this->extraccion = $request->input('extraccion');
        $this->sano = $request->input('sano');
        $this->observacion = $request->input('observacion');
        $this->numeroOdontograma = $request->input('numeroOdontograma');
        $this->fk_idCliente = $request->input('fk_idCliente');

        $this->obraSocial = $request->input('obraSocial');
        $this->codigo = $request->input('codigo');
        $this->mes = $request->input('mes');
        $this->anio = $request->input('anio');
        $this->afiliado = $request->input('afiliado');
        $this->plan = $request->input('plan');
        $this->titular = $request->input('titular');
        $this->grupoFamiliar = $request->input('grupoFamiliar');
        $this->parentesco = $request->input('parentesco');
        $this->edad = $request->input('edad');
        $this->fechaNac = $request->input('fechaNac');
        $this->domicilio = $request->input('domicilio');
        $this->localidad = $request->input('localidad');
        $this->lugarTitular = $request->input('lugarTitular');
    }
      
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_idCliente');
    }
    public function obtenerTodos()
    {
        $sql = "SELECT
                  idOdontograma,
                  lugarTitular,
                  localidad,
                  domicilio,
                  fechaNac,
                  edad,
                  parentesco,
                  grupoFamiliar,
                  titular,
                  plan,
                  afiliado,
                  anio,
                  mes,
                  codigo,
                  obraSocial,
                  cariado,
                  obturado,
                  perdida,
                  extraccion,
                  sano,
                  observacion,
                  fk_idCliente,
                  numeroOdontograma
                FROM odontograma ORDER BY idOdontograma";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }
    


    public function guardar($datosDientes)
{
    // Actualizar o crear el registro en la base de datos
    $this->updateOrCreate(
        ['idOdontograma' => $this->idOdontograma],
        [
            'piezasPadecientes' => $this->piezasPadecientes,
            'cariado' => $this->cariado,
            'obturado' => $this->obturado,
            'perdida' => $this->perdida,
            'extraccion' => $this->extraccion,
            'sano' => $this->sano,
            'observacion' => $this->observacion,
            'fk_idCliente' => $this->fk_idCliente,
            'numeroOdontograma' => $this->numeroOdontograma,
            'lugarTitular' => $this->lugarTitular,
            'localidad' => $this->localidad,
            'domicilio' => $this->domicilio,
            'fechaNac' => $this->fechaNac,
            'edad' => $this->edad,
            'parentesco' => $this->parentesco,
            'grupoFamiliar' => $this->grupoFamiliar,
            'titular' => $this->titular,
            'plan' => $this->plan,
            'afiliado' => $this->afiliado,
            'anio' => $this->anio,
            'mes' => $this->mes,
            'codigo' => $this->codigo,
            'obraSocial' => $this->obraSocial,
            'dientes' => json_encode($datosDientes),
        ]
    );
}


    
    #--------------------------------------------------------------------------------------
    public function eliminar(){
        #crear query(consulta) en una variable
        $sql = "DELETE FROM odontograma WHERE idOdontograma=?";
    
        $affected = DB::delete($sql, [$this->idOdontograma]);
    }
    #--------------------------------------------------------------------------------------





}


