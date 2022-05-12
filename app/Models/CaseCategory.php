<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseCategory extends Model
{
    use HasFactory;

    public function normalcases()
    {
       return $this->belongsTo(NormalCases::class);
    }

    public function casetype()
    {
        return $this->hasMany(CaseType::class);
    }


}
