<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalCases extends Model
{
    use HasFactory;


    public function lawyer()
    {
        return $this->belongsToMany(Role::class, 'criminal_cases', 'user_id_cliente', 'user_id_abogado');
    }

    public function client()
    {
        return $this->belongsToMany(Role::class, 'criminal_cases', 'user_id_abogado', 'user_id_cliente');
    }

    public function criminalstatus()
    {
        return $this->hasOne(CriminalCasesStatus::class);
    }
}
