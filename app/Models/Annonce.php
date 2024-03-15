<?php

namespace App\Models;
use App\Models\User;
use App\Models\Image;
use App\Models\Offre;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AnnoncesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonce extends Model
{
    use HasFactory;



    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function storeImages($images)
    {
        $imageUrls = [];

        foreach ($images as $image) {
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imageUrls[] = url('images/' . $imageName);
        }

        return $imageUrls;
    }
   
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function lastOffre()
    {
        return $this->belongsTo(Offre::class, 'last_offre_id');
    }
    public function offres(){
        return $this->hasMany(Offre::class);
    }
}
