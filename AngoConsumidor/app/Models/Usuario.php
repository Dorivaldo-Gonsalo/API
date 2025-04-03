<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
         'nome',
         'apelido',
         'bi',
         'telefone',
         'data_nasc',
         'provincia',
         'municipio',
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
    public function criticas()
    {
        return $this->hasMany(Critica::class, 'id_user');
    }
}
