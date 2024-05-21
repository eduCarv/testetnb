<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarioTrabalho extends Model
{
    use HasFactory;

    protected $table = 'calendario_trabalhos';

    protected $fillable = [
        'empregado_id',
        'data_de_trabalho',
        'hora_inicio',
        'hora_fim'
    ];

    public function empregado()
    {
        return $this->belongsTo(Empregado::class);
    }
}
