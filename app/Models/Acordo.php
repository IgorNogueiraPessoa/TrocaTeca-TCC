<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acordo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_proposta',
        'anuncio',
        'data_encontro',
        'local_encontro',
        'categoria_acordo',
        'status_acordo'
    ];

    public function proposta(){
        return $this->belongsTo(Proposta::class, 'id', 'id_proposta');
    }
}
