<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Caso extends Model
{
    use HasFactory;

    protected $table ='caso';
    protected $primaryKey = 'codigo';

    public $timestamps = false;
    
    protected $fillable = [
        'codigo', 
        'codservicio', 
        // titulo
        //detalle
        'codcliente', 
        'ciabogado'
    ];

    public function abogado():BelongsTo{
        return $this->belongsTo(Abogado::class,'ciabogado','ci');
    }

    public function cliente():BelongsTo{
        return $this->belongsTo(Cliente::class,'codcliente','ci');
    }

    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class,'caso_servicio','codigocaso','codigoservicio','codigo','codigo');
    }

    public function documentos() : HasMany {
        return $this->hasMany(Documento::class,'codigoproceso','codigo');
    }
    
}
