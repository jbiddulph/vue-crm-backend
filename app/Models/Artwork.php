<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artwork extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_id',
        'title',
        'size',
        'category',
        'artist_notes',
        'is_featured',
        'is_live',
        'on_sale',
        'price',
        'file'
    ];

    public function contact() {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }
}
