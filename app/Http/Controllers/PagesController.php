<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Image;
use App\Models\Offre;
use App\Models\Annonce;
use App\Models\Contrat;
use Illuminate\Http\Request;
use App\Models\Eregistrement;
use App\Models\Enregistrement;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;

use Carbon\Carbon;

class PagesController extends Controller
{
//afficher la page des conditions d'utilisations

public function conditions_utilisations() {
    return view('terme');
}


  //afficher la page déposer annonce détaillé
    public function show_annonce(Annonce $annonce) {
        $images = Image::where('annonce_id', $annonce->id)->get();
        return view('annonce_detail', compact('annonce', 'images'));
    }
//afficher la page modifier annonce
    public function edit_annonce(Annonce $annonce) {
        return view('modifier_annonce', compact('annonce'));
    }
// afficher la page d'acceuil
public function index()
{
    return view('index', [
        'annonces' => Annonce::latest()->take(3)->get()
    ]);
}


 //afficher page dépot d'anonce
    public function ajouter_annonce(){
        return view('ajouter_annonce');
    }

  //afficher le contrat a imprimer
  public function imprimer_contrat(Contrat $contrat){
    $currentDate = Carbon::now();
    $user=User::findorFail(Auth()->user()->id);

    return view('contrat',compact('contrat','currentDate','user'));
  }



    //afficher tous les annonces : avec la pagination de 6 annonces par page
    public function annonces(){
        return view('annonces', [
            'annonces' => Annonce::latest()->paginate(6)
        ]);
    }




 
    
   
      
    
        // Logout User
        public function deconnecter(Request $request) {
            auth()->logout();
    
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('/')->with('status', 'You have been logged out!');
    
        }
    
//faire une offre

public function store(Request $request)
{
    $annonce = Annonce::find($request->annonce_id);

    if ($annonce->transaction == 'vendre') {
        $request->validate([
            'prix_propose' => ['required', 'numeric', 'min:0']
        ]);

        $user_id = auth()->user()->id;

        $offre = new Offre();
        $offre->annonce_id = $request->annonce_id;
        $offre->user_id = $user_id;
        $offre->prix_propose = $request->prix_propose;
        $offre->annuler=0;
        $offre->save();

        return redirect()->back()->with('status', 'Offre envoyée avec succès');
    } else {
        $request->validate([
            'prix_propose' => ['required', 'numeric', 'min:0'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date', 'after:date_debut']
        ]);

        $user_id = auth()->user()->id;

        $offre = new Offre();
        $offre->annonce_id = $request->annonce_id;
        $offre->user_id = $user_id;
        $offre->prix_propose = $request->prix_propose;
        $offre->date_debut = $request->date_debut;
        $offre->date_fin = $request->date_fin;
        $offre->annuler=0;
        $offre->save();

        return redirect()->back()->with('status', 'Offre envoyée avec succès');
    }
}




//enregistrer une anonce
public function store2(Request $request)
{

    $user_id = auth()->user()->id;

    $enre = new Enregistrement();
    $enre->annonce_id = $request->annonce_id;
    $enre->user_id = $user_id;
    $enre->save();

    return redirect()->back()->with('status', 'annonce enregistrée');
}
public function destroy($id){

    $user_id = auth()->user()->id;
  
    $enre = Enregistrement::where('annonce_id',$id)
                        ->where('user_id', $user_id)
                        ->first();

if ($enre) {
    $enre->delete();
    return redirect()->back()->with('status', 'Enregistrement supprimé');
} else {
    return redirect()->back()->with('status', 'Enregistrement non trouvé');
}

}


public function supprimer_contrat($id){
  
  

    $contrat = Contrat::findOrFail($id);

if ($contrat) {
    $contrat->delete();
    return redirect()->back()->with('status', 'Contrat supprimé');
} else {
    return redirect()->back()->with('status', 'Contrat non trouvé');
}
}


public function bloquer($id)
{
    $user = User::find($id);

    if ($user) {
        if($user->id ==0){
        $user->etat = 0;
        $user->save();
        return redirect()->back()->with('status', 'Utilisateur bloqué avec succès.');
    }else{
        return redirect()->back()->with('status', 'Utilisateur déja bloqué.');
    }
    }

    return redirect()->back()->withErrors(['error' => 'Utilisateur non trouvé.']);
}

public function debloquer($id)
{
    $user = User::find($id);

    if ($user) {
        if($user->id ==0){
        $user->etat = 1;
        $user->save();
        return redirect()->back()->with('status', 'Utilisateur débloqué avec succès.');
    }else{
        return redirect()->back()->with('status', 'Utilisateur déja débloqué.');
    }
    }
    return redirect()->back()->withErrors(['error' => 'Utilisateur non trouvé.']);
}
public function supprimer_user($id)
{
    DB::beginTransaction();

    try {
        // Delete related records from the "enregistrements" table
        Enregistrement::where('user_id', $id)->delete();
      
       
        $annonces = Annonce::where('user_id', $id)->get();
        $offre = Offre::where('user_id', $id)->first();
     foreach($annonces as $annonce){
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
        }}

        // Delete the user's offers
     

        // Delete the user
        $user = User::findOrFail($id);
        $user->delete();

        DB::commit();
        return redirect()->back()->with('status', 'Utilisateur Supprimé.');
    } catch (\Exception $e) {
        DB::rollback();
        return "Error: " . $e->getMessage();
    }
   
}


public function valider_offre($id)
{
    $offre = Offre::where('id', $id)->first();
    $user_id_client = $offre->user_id;
    $user_id_prop = auth()->user()->id;
    $annonce_id = $offre->annonce_id; 
   $offre->annuler=1;
   $offre->save();

    $contrat = new Contrat();
    $contrat->annonce_id = $annonce_id;
    $contrat->user_id_prop = $user_id_prop;
    $contrat->user_id_client = $user_id_client;
    $contrat->save();
    
    $annonce=Annonce::where('id',$annonce_id)->first();
    $annonce->disponible=0;
    $annonce->save();



    return redirect()->back()->with('status', 'Offre validée');
}


public function refuser_offre($id)
{
    $offre = Offre::where('id', $id)->first();
    $offre->annuler=1;
   $offre->save();
    
   



    return redirect()->back()->with('status', 'Offre refusé');
}







    }
    


   