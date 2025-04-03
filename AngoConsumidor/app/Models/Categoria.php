<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function empresas()
    {
        return $this->belongsToMany(Empresa::class, 'empresa_categoria', 'id_categoria', 'id_empresa');
    }
}
