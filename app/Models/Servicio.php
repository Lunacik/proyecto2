<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table ='servicio';
    protected $primaryKey = 'codigo';

    public $timestamps = false;
    
    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
    ];
}
