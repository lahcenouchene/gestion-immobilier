<?php

use App\Models\User;
use App\Models\Offre;
use App\Models\Annonce;
use App\Models\Enregistrement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnnoncesController;
use App\Models\Contrat;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard', function () {
    $currentUser = Auth::user();
    $users = User::where('id', '!=', $currentUser->id)->get();

    return view('profile', [
        'offres' => Offre::all(),
        'contrats' => Contrat::all(),
        'annonces' => Annonce::all(),
        'enregistrements' => Enregistrement::all(),
        'users' => $users
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::post('/ajouter',[AnnoncesController::class,'store'])->name('ajouter');
    
Route::get('/ajouter_annonce',[PagesController::class,'ajouter_annonce'])->name('ajouter_annonce')->middleware(['verified']);

});
Route::get('/',[PagesController::class,'index'])->name('index');

Route::get('/annonces',[PagesController::class,'annonces'])->name('annonces');

Route::post('/deconnecter',[PagesController::class,'deconnecter']);

Route::get('/annonces/{annonce}', [PagesController::class, 'show_annonce']);
Route::post('/offres', [PagesController::class, 'store'])->name('offres.store')->middleware(['auth']);
Route::post('/enregistrement', [PagesController::class, 'store2'])->name('enregistrement.store2')->middleware(['auth']);

Route::get('/annonces/{annonce}/modifier', [PagesController::class, 'edit_annonce'])->name('modifier')->middleware('auth');

Route::put('/annonces/{annonce}', [AnnoncesController::class, 'update'])->middleware('auth');
Route::delete('/annonces/{annonce}', [AnnoncesController::class, 'destroy'])->middleware('auth');

Route::delete('/enregistrements/{enregistrement}', [PagesController::class, 'destroy'])->middleware('auth');
Route::put('/bloquer/{user}', [PagesController::class, 'bloquer'])->middleware('auth');
Route::put('/debloquer/{user}', [PagesController::class, 'debloquer'])->middleware('auth');
Route::delete('/supprimer/{user}', [PagesController::class, 'supprimer_user'])->middleware('auth');


Route::post('/contrat/supprimer/{contrat}', [PagesController::class, 'supprimer_contrat'])->middleware('auth');
Route::get('/contrat/imprimer/{contrat}', [PagesController::class, 'imprimer_contrat'])->middleware('auth');


Route::post('/offre/accepter/{offre}', [PagesController::class, 'valider_offre'])->middleware(['auth']);
Route::post('/offre/refuser/{offre}', [PagesController::class, 'refuser_offre'])->middleware(['auth']);

Route::get('/conditions', [PagesController::class, 'conditions_utilisations'])->name('condition');


require __DIR__.'/auth.php';


