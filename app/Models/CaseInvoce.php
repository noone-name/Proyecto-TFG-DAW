<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseInvoce extends Model
{
    use HasFactory;



    public function normalcasesstatus()
    {
        return $this->belongsTo(NormalCasesStatus::class);
    }

}
