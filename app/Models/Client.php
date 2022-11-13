<?php

namespace App\Models;

use App\Models\Materiel;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'client';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'code_postal',
        'ville',
    ];


    public function materiels()
    {
        return $this->belongsToMany(Materiel::class, 'pivot_client_materiel')
                    ->withPivot('lien_id', 'client_id', 'materiel_id');
    }

}
