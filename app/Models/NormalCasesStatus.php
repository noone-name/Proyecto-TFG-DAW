<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalCasesStatus extends Model
{
    use HasFactory;

    protected $fillable=[
        'normal_cases_id'
    ];
    public function normalcases()
    {
        return $this->belongsTo(NormalCases::class);
    }

    public function caseinvoce()
    {
        return $this->hasOne(CaseInvoce::class);
    }

}
