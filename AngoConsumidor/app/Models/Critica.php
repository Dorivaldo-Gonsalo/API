<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critica extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_servico',
        'texto',
        'classific',
        'id_user',
        'id_emp',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_user');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_emp');
    }

    public function respostas()
    {
        return $this->hasMany(Resposta::class, 'id_critica');
    }
}
