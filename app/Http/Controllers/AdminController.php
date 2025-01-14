<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Ville;
use App\Models\Association;

class AdminController extends Controller
{
    /**
     * Afficher le formulaire de connexion pour l'administration.
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Authentifier l'administrateur.
     */
    public function login(Request $request)
    {
        // Validation des données
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Récupérer l'administrateur avec l'email fourni
        $admin = Admin::where('email', $request->email)->first();

        // Vérifier si l'admin existe et le mot de passe est correct
        if ($admin && $admin->password === $request->password) {
            // Stocker l'identifiant de l'admin dans la session
            session(['admin_id' => $admin->id]);

            // Rediriger vers la page des villes avec associations en attente
            return redirect()->route('admin.associations.pending')
                ->with('success', 'Connexion réussie. Voici les villes avec des associations en attente.');
        }

        // Retourner avec une erreur si les identifiants sont incorrects
        return back()->withErrors(['email' => 'Identifiants incorrects'])->withInput();
    }

    /**
     * Déconnecter l'administrateur.
     */
    public function logout()
    {
        // Supprimer l'ID de l'admin de la session
        session()->forget('admin_id');

        // Rediriger vers la page de connexion
        return redirect()->route('admin.login');
    }

    /**
     * Afficher les villes avec des associations en attente.
     */
    public function associationsPending()
    {
        // Vérifier si l'admin est connecté
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login')->withErrors(['message' => 'Veuillez vous connecter.']);
        }

        // Récupérer les villes avec des associations en attente
        $villes = Ville::whereHas('associations', function ($query) {
            $query->where('status', 'en attente');
        })->with(['associations' => function ($query) {
            $query->where('status', 'en attente');
        }])->get();

        // Passer les données à la vue
        return view('admin.villes_associations', compact('villes'));
    }

    /**
 * Confirmer une association en attente.
 */
public function confirmAssociation($association_id)
{
    // Vérifier si l'admin est connecté
    if (!session()->has('admin_id')) {
        return redirect()->route('admin.login')->withErrors(['message' => 'Veuillez vous connecter.']);
    }

    // Récupérer l'association à confirmer
    $association = Association::findOrFail($association_id);

    // Vérifier que l'association est en attente avant de la confirmer
    if ($association->status == 'en attente') {
        $association->status = 'confirmée';
        $association->save();
    }

    // Rediriger avec un message de succès
    return redirect()->route('admin.associations.pending')
        ->with('success', 'L\'association a été confirmée avec succès.');
}

}
