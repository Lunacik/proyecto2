<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $table ='documento';
    protected $primaryKey = 'documento';

    public $timestamps = false;
    
    protected $fillable = [
        'numero',
        'nombre',
        'codigoproceso',
    ];
}
