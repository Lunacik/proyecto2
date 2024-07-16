<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{
    use HasFactory;
    protected $table ='cliente';
    protected $primaryKey = 'ci';

    public $timestamps = false;
    
    protected $fillable = [
        'ci',
        'nidentificacion',
    ];

    public function usuario():BelongsTo{
        return $this->belongsTo(Usuario::class, 'ci', 'ci');
    }
}
