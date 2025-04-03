<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'endereco',
        'email',
        'caminho_imagem',
        'senha',
        'id_representante',
        'telefone',
        'ano_util',
    ];

    public function representante()
    {
        return $this->belongsTo(Representante::class, 'id_representante');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'empresa_categoria', 'id_empresa', 'id_categoria');
    }

    public function criticas()
    {
        return $this->hasMany(Critica::class, 'id_emp');
    }
}
