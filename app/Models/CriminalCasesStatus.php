<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalCasesStatus extends Model
{
    use HasFactory;

    public function criminalcases()
    {
        return $this->belongsTo(CriminalCases::class);
    }

}
