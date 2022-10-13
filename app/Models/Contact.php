<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'town_city',
        'region_county',
        'country_code',
        'post_code'
    ];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}


