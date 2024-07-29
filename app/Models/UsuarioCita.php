<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsuarioCita extends Model
{
    use HasFactory;

    protected $table ='usuario_cita';
    protected $primaryKey = ['ciusuario','numerocita'];

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable=[
        'ciusuario',
        'numerocita',
        'fecha'
    ];

   
    public function usuario():BelongsTo{
        return $this->belongsTo(Usuario::class,'ciusuario','ci');
    }

    public function cita(){
        return $this->belongsTo(Cita::class,'numerocita','numero');
    }

}
