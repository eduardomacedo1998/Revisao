<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class revisoes extends Model
{
    protected $table = 'revisoes';

    protected $primaryKey = 'revisao_id';

    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'disciplina_id',
        'data_revisao',
        'numero_revisoes',
        'dias_proxima_revisao',
        'observacao',
        'conteudo',
        'link_revisao',
    ];
}
