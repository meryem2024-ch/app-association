<?php
// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ville;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validation des données du formulaire
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $villes = Ville::all(); // Récupérer toutes les villes

            // Rediriger l'utilisateur vers la page d'associations avec toutes les villes
            return redirect()->route('home', ['villes' => $villes])->with('user', Auth::user());
        }

        return redirect()->back()->withErrors(['email' => 'Les informations de connexion sont incorrectes']);
    }

    public function logout()
    {
        session()->invalidate();
        session()->regenerate();

        Auth::logout();
        return redirect('/');
    }
}
