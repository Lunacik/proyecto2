<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasoServicio extends Model
{
    use HasFactory;
    protected $table ='caso_servicio';
    protected $primaryKey = ['codigocaso','codigoservicio'];
    public $incrementing = false;

    public $timestamps = false;
    
    protected $fillable = [
        'codigocaso',
        'codigoservicio',
        'fcreacion',
        'estado'
    ];

    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        return $this->original[$keyName];
    }
    
}
