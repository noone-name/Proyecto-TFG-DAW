<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalCasesStatus extends Model
{
    use HasFactory;

    protected $fillable=[
        'normal_cases_id',
        'lawyer_docs_requirements',
        'potential_resolution',
        'extra_info',
        'cancel_answer',

    ];

    public function normalcases()
    {
        return $this->belongsTo(NormalCases::class, 'normal_cases_id');
    }
}
