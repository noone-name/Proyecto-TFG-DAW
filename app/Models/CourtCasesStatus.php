<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtCasesStatus extends Model
{
    use HasFactory;

    public function courtcases()
    {
        return $this->belongsTo(CourtCases::class);
    }

}
