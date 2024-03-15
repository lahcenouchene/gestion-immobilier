<?php

namespace App\Models;

use App\Models\User;
use App\Models\Annonce;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrat extends Model
{
   
    protected $fillable = ['annonce_id', 'user_id_prop','user_id_client'];




    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }
    public function client()
    {
        return $this->belongsTo(User::class, 'user_id_client');
    }


    public function userProp()
    {
        return $this->belongsTo(User::class, 'user_id_prop');
    }
    
}
