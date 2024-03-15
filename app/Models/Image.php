<?php

namespace App\Models;

use App\Models\Annonce;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{

    protected $table='images';
    protected $fillable = [
        'path',
        'annonce_id'
];

    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }
}
