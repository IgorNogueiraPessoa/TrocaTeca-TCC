<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acordo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_proposta',
        'anuncio',
        'data_encontro',
        'local_encontro',
        'pontoe_lat',
        'pontoe_lon',
        'categoria_acordo',
        'imagem_acordo',
        'status_acordo',
    ];

    public function proposta()
    {
        return $this->belongsTo(Proposta::class, 'id_proposta');
    }
}
