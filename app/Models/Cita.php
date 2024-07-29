<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cita extends Model
{
    use HasFactory;

    protected $table ='cita';
    protected $primaryKey = 'numero';

    public $timestamps = false;
    
    protected $fillable = [
        'numero',
        'texto',
    ];


}
