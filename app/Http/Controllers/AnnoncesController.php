<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Offre;
use App\Models\Annonce;
use Illuminate\Http\Request;


class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'titre'=>'required',
            'type'=>'required',
            'surface'=>'required',
            'prix'=>'required|min:5|max:20',
            'wilaya'=>'required',
            'description'=>'required',
            'adresse'=>'required',
            'transaction'=>'required',
            'nom'=>'required',
            'email'=>'email|required',
            'telephone'=>'required|min:8|max:12', 
        ]);
        $formFields['disponible']=1;
        $formFields['user_id'] = auth()->id();
        if($request->hasFile("image_index")){
            $file=$request->file("image_index");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("image_index/"),$imageName);
         $formFields['image_index']=$imageName;
        $annonce=Annonce::create($formFields);
        }
        if($request->hasFile('images')) {
           $i=0;
            foreach($request->file('images')as $image){
                $imageName =  $formFields['titre'].'-image-'.time().'.'/* $i++ */.$image->extension();
                $image->move(public_path('images_annonces'),$imageName);
                Image::create([
                    'annonce_id'=>$annonce->id,
                    'path'=>$imageName
                ]);
            }
        }
        return redirect('/annonces')->with('status', 'annonce created successfully!');
    }
    
   




    /**
     * Display the specified resource.
     */
    public function show() {
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
 
        public function update(Request $request, $id)
{
    $formFields = $request->validate([
        'titre'=>'required',
        'type'=>'required',
        'surface'=>'required',
        'prix'=>'required|min:5|max:20',
        'wilaya'=>'required',
        'description'=>'required',
        'adresse'=>'required',
        'transaction'=>'required',
        'nom'=>'required',
        'email'=>'email|required',
        'telephone'=>'required|min:8|max:12',
    ]);
    $formFields['user_id'] = auth()->id();

    $annonce = Annonce::findOrFail($id);

    // update image_index field
    if($request->hasFile("image_index")){
        $file=$request->file("image_index");
        $imageName=time().'_'.$file->getClientOriginalName();
        $file->move(\public_path("image_index/"),$imageName);
        $formFields['image_index']=$imageName;
        
        // remove old image if it exists
        if ($annonce->image_index) {
            $oldImagePath = public_path('image_index/' . $annonce->image_index);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    }

    $annonce->update($formFields);

    // update images related to the Annonce model
    if($request->hasFile('images')) {
        // delete old images if they exist
        $oldImages = $annonce->images;
        foreach ($oldImages as $oldImage) {
            $oldImagePath = public_path('images_annonces/' . $oldImage->path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $oldImage->delete();
        }
        
        // add new images
        $i=0;
        foreach($request->file('images') as $image) {
            $imageName =  $formFields['titre'].'-image-'.time().'.'.$image->extension();
            $image->move(public_path('images_annonces'),$imageName);
            Image::create([
                'annonce_id'=>$annonce->id,
                'path'=>$imageName
            ]);
        }
    }

    return redirect('/dashboard')->with('status', 'annonce updated successfully!');
}

  

    /**
     * Remove the specified resource from storage.
     */

     public function destroy($id)
     {
         // Retrieve the Offre record by the annonce_id
         $offre = Offre::where('annonce_id', $id)->first();
     
         if ($offre) {
             // Retrieve the related Annonce record
             $annonce = $offre->annonce;
     
             // Delete the Offre record
             $offre->delete();
     
             if ($annonce) {
                 // Delete the image index of the Annonce
                 if ($annonce->image_index) {
                     $oldImagePath = public_path('image_index/' . $annonce->image_index);
                     if (file_exists($oldImagePath)) {
                         unlink($oldImagePath);
                     }
                 }
     
                 // Delete the images related to the Annonce
                 $images = Image::where('annonce_id', $annonce->id)->get();
                 foreach ($images as $image) {
                     $imagePath = public_path('images_annonces/' . $image->path);
                     if (file_exists($imagePath)) {
                         unlink($imagePath);
                     }
                     $image->delete();
                 }
     
                 // Delete the Annonce record
                 $annonce->delete();
             }
         }else{

            $annonce = Annonce::where('id', $id)->first();
                // Delete the image index of the Annonce
                if ($annonce->image_index) {
                    $oldImagePath = public_path('image_index/' . $annonce->image_index);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
    
                // Delete the images related to the Annonce
                $images = Image::where('annonce_id', $annonce->id)->get();
                foreach ($images as $image) {
                    $imagePath = public_path('images_annonces/' . $image->path);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                    $image->delete();
                }
    
                // Delete the Annonce record
                $annonce->delete();
         }
     
         return redirect('/dashboard')->with('status', 'annonce deleted successfully!');
     }
     

    
            
}
