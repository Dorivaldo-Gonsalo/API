<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaCategoria extends Model
{
    use HasFactory;

    protected $table = 'empresa_categoria';

    protected $fillable = [
        'id_empresa', 'id_categoria',
    ];
}
