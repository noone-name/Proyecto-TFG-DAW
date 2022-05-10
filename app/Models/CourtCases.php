<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtCases extends Model
{
    use HasFactory;

    public function lawyer()
    {
        return $this->belongsToMany(Role::class, 'court_cases', 'user_id_cliente', 'user_id_abogado');
    }

    public function client()
    {
        return $this->belongsToMany(Role::class, 'court_cases', 'user_id_abogado', 'user_id_cliente');
    }

}
