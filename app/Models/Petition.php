<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    use HasFactory;

    public function lawyer()
    {
        return $this->belongsToMany(Role::class, 'petitions', 'user_id_cliente', 'user_id_abogado');
    }

    public function client()
    {
        return $this->belongsToMany(Role::class, 'petitions', 'user_id_abogado', 'user_id_cliente');
    }
}
