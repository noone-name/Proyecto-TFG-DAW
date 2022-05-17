<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseInvoce extends Model
{
    use HasFactory;

    protected $fillable = [
        'normal_cases_id',
        'tax_amount',
        'total_amount',
    ];



    public function normalcasesstatus()
    {
        return $this->belongsTo(NormalCasesStatus::class);
    }

}
