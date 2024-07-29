<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     /**
      * Roles
      */
    public static $CLIENTE='2';
    public static $ABOGADO='1';
    public static $ADMINISTRADOR='3';

    protected $table = 'usuario';
    public $timestamps = false;
    protected $primaryKey = 'ci';


    protected $fillable = [
        'ci',
        'nombre',
        'fnacimiento',
        'celectronico',
        'tipo',
        'sexo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function abogado(): HasOne
    {
        return $this->hasOne(Abogado::class, 'ci', 'ci');
    }

    public function cliente(): HasOne
    {
        return $this->hasOne(Cliente::class, 'ci', 'ci');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'usuario_ci', 'ci');
    }

    public function citas(): BelongsToMany
    {
        return $this->belongsToMany(Cita::class, 'usuario_cita', 'ciusuario', 'numerocita')->withPivot('fecha');
    }
}
