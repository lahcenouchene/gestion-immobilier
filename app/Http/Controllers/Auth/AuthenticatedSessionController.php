<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.connexion');
    }

    /**
     * Handle an incoming authentication request.
     */
   /*  public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    } */






/* 
    public function authentifier(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);


        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
    
        if (auth()->check()) {
        $user = auth()->user();

        if ($user->type === 'admin') {
            return redirect('/dashboard')->with('status', 'You are now logged in as admin!');
        } else if($user->type==='client'){
            return redirect('/dashboard')->with('status', 'You are now logged in as a client!');
        }else if($user->type==='particulier'){
            return redirect('/dashboard')->with('status', 'You are now logged in as a particular!');
        }else if($user->type==='agence'){
            return redirect('/dashboard')->with('status', 'You are now logged in as an agency!');
        }
        else if($user->type==='promoteur'){
            return redirect('/dashboard')->with('status', 'You are now logged in as an promoteur!');
        }}
    }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    } */


//////////////
public function authentifier(Request $request)
{
    $formFields = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required'
    ]);

    if (auth()->attempt($formFields)) {
        $request->session()->regenerate();

        if (auth()->check()) {
            $user = auth()->user();

            if ($user->etat === 1) { // Add this condition to check the "etat" column
                if ($user->type === 'admin') {
                    return redirect('/dashboard')->with('status', 'Vous êtes maintenant connecté en tant qu"administrateur !');
                } else if ($user->type === 'client') {
                    return redirect('/dashboard')->with('status', 'Vous êtes maintenant connecté en tant que client !');
                } else if ($user->type === 'particulier') {
                    return redirect('/dashboard')->with('status', 'Vous êtes maintenant connecté en tant que particulier!');
                } else if ($user->type === 'agence') {
                    return redirect('/dashboard')->with('status', 'Vous êtes maintenant connecté en tant qu"agence!');
                } else if ($user->type === 'promoteur') {
                    return redirect('/dashboard')->with('status', 'Vous êtes maintenant connecté en tant que promoteur!');
                }
            } else {
                auth()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->withErrors(['email' => 'Votre compte est bloqué, pour le débloquer veuillez contacter l"administrateur.'])->onlyInput('email');
            }
        }
    }

    return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
}





    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
