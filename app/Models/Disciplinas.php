<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplinas extends Model
{
    
    protected $table = 'disciplinas';
    
    protected $primaryKey = 'disciplina_id';
    
    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'nome_disciplina',
        'tema_revisao',
        'data_entrada',
    ];
}
