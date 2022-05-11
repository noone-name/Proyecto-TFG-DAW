<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseType extends Model
{
    use HasFactory;

    public function courts()
    {
        return $this->hasMany(Court::class);
    }

    public function normalcases()
    {
       return $this->belongsTo(NormalCases::class);
    }

}
