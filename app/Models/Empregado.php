<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empregado extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'cpf', 'idade', 'departamento_id'];

    public function departmento()
    {
        return $this->belongsTo(Departmento::class);
    }
}
