<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Court extends Model

{
    protected $model = Court::class;

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',];

     public function casetype()
        {
            return $this->belongsTo(CaseType::class);
        }


}
