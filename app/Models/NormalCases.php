<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalCases extends Model
{
    use HasFactory;

    public function lawyer()
    {
        return $this->belongsToMany(Role::class, 'normal_cases', 'user_id_cliente', 'user_id_abogado');
    }

    public function client()
    {
        return $this->belongsToMany(Role::class, 'normal_cases', 'user_id_abogado', 'user_id_cliente');
    }

    public function normalstatus()
    {
        return $this->hasOne(NormalCasesStatus::class);
    }
}
