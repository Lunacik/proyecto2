<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoletaPago extends Model
{
    use HasFactory;
    protected $table='boleta_pago';
    protected $primaryKey = 'codigo';

    public $timestamps = false;
    
    protected $fillable = [
        'codigo',
        'monto',
        'femision',
        'ciabogado',
        'cicliente',
        'codigoservicio',
        'estado',
        'transaccion_id'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cicliente','ci');
    }
    public function servicio(){
        return $this->belongsTo(Servicio::class,'codigoservicio','codigo');
    }
}
