<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    public static function plusCounter(int $codigo){
        $counters=Counter::where('codigo',$codigo)->get();
        if(count($counters)>=1){
            $counter=$counters[0];
            $counter->contador=$counter->contador+1;
            $counter->update();
        }

    }

    public static function getCounter(int $codigo){
        $counters=Counter::where('codigo',$codigo)->get();
        if(count($counters)>=1){
            $counter=$counters[0];
            
            return $counter;
        }
    }
}
