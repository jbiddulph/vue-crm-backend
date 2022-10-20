<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'contact_id',
        'note',
    ];

    public function contact() {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }
}
