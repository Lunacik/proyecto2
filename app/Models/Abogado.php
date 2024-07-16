<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Abogado extends Model
{
    use HasFactory;

    protected $table ='abogado';
    protected $primaryKey = 'ci';

    public $timestamps = false;
    
    protected $fillable = [
        'ci',
        'codcol',
        'especialidad',
    ];

    public function usuario():BelongsTo{
        return $this->belongsTo(Usuario::class,'ci','ci');
    } 

}
