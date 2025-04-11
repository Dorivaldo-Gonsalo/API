<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class Representante extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
         'nome',
         'apelido',
         'bi',
         'sector',
         'email',
         'senha',
         'caminho_imagem',
    ];

    protected $hidden = ['senha', 'remember_token'];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            // Qualquer lógica adicional que você gostaria de implementar
        });
    }
    public function empresas()
    {
        return $this->hasMany(Empresa::class, 'id_representante');
    }
}
