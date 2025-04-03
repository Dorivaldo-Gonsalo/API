<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    protected $fillable = [
        'texto',
        'classific',
        'id_critica',
    ];

    public function critica()
    {
        return $this->belongsTo(Critica::class, 'id_critica');
    }

    public function subrespostas()
    {
        return $this->hasMany(Subresp::class, 'id_resp');
    }
}
