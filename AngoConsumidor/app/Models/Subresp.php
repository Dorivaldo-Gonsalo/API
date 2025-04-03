<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subresp extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_resp', 'texto', 'classific',
    ];

    public function resposta()
    {
        return $this->belongsTo(Resposta::class, 'id_resp');
    }
}
