<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Contact;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'town_city',
        'region_county',
        'country_code',
        'post_code',
        'notes'
    ];

    public function contacts() {
        return $this->hasMany(Contact::class);
    }
}
