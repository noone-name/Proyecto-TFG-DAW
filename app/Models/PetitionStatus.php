<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitionStatus extends Model
{
    use HasFactory;

    public function petition()
    {
        return $this->belongsTo(Petition::class);
    }
}
