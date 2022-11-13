<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    protected $table = 'materiel';

    protected $fillable = [
        'nom',
        'prix',
    ];


    public function clients()
    {
        return $this->belongsToMany(Client::class, 'pivot_client_materiel')
                    ->withPivot('lien_id', 'client_id', 'materiel_id');
    }

}
