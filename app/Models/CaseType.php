<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseType extends Model
{
    use HasFactory;

    protected $fillable =[
        'name','case_categories_id','amount',
    ];

    public function normalcases()
    {
       return $this->belongsTo(NormalCases::class);
    }



}
