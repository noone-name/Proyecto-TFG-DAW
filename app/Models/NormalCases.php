<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalCases extends Model
{
    use HasFactory;
    protected $fillable = [
        'case_title',
        'is_active',
        'status',
        'user_id_cliente',
        'user_id_abogado',
        'case_types_id',
        'client_position',
        'description',
        'case_document',];


    public function users_abogado()
        {
            return $this->belongsTo(User::class,'user_id_abogado');
        }

    public function users_cliente()
        {
            return $this->belongsTo(User::class,'user_id_cliente');
        }


    public function casetype()
    {
        return $this->belongsTo(CaseType::class, 'case_types_id');
    }


    public function normalstatus()
    {
        return $this->hasOne(NormalCasesStatus::class);
    }

    public function casecategory()
    {
        return $this->hasOne(CaseCategory::class);
    }

}
