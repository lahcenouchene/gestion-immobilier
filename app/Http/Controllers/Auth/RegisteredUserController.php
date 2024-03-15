<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.inscription');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    /*     public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    } */

    public function creer_compte(Request $request)
    {
        $formFields = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'tel' => 'required|min:8|max:10',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed|min:6',
            'type' => 'required',
            'wilaya' => 'required',
            'nomS' => 'required_if:type,agence',
            'numR' => 'nullable|numeric|required_if:type,agence',
            'numG' => 'nullable|numeric|required_if:type,agence',
            'nomE' => 'required_if:type,promoteur',
            'numIN' => 'nullable|numeric|required_if:type,promoteur',
            'status_juridique' => 'required_if:type,promoteur',
           

        ]);
        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['etat']=1;
        // Create User
        $user = User::create($formFields);
        event(new Registered($user));
        $user->sendEmailVerificationNotification();
        // Login
        auth()->login($user);
        return redirect('login')->with('status', 'Utilisateur crée ');
    }
}
