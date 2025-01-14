<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Association;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\Ville;
use Illuminate\Support\Facades\Auth;

class AssociationController extends Controller
{
    /**
     * Ajouter un commentaire à une association
     *
     * @param \Illuminate\Http\Request $request
     * @param int $associationId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeComment(Request $request, $associationId)
    {
        // Validation des données
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['message' => 'Vous devez être connecté pour commenter.']);
        }

        // Vérifier si l'association existe
        $association = Association::findOrFail($associationId);

        // Créer le commentaire
        Comment::create([
            'association_id' => $association->id,
            'user_id' => Auth::id(),
            'comment' => $request->input('comment'),
        ]);

        return back()->with('success', 'Votre commentaire a été ajouté avec succès.');
    }

    /**
     * Ajouter ou mettre à jour une évaluation pour une association
     *
     * @param \Illuminate\Http\Request $request
     * @param int $associationId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeRating(Request $request, $associationId)
{
    // Valider la note
    $request->validate([
        'rating' => 'required|integer|between:1,5',
    ]);

    // Vérifier si l'utilisateur a déjà évalué
    $existingRating = Rating::where('association_id', $associationId)
        ->where('user_id', Auth::id())
        ->first();

    if ($existingRating) {
        // Mettre à jour la note existante
        $existingRating->update(['rating' => $request->input('rating')]);
    } else {
        // Enregistrer la nouvelle note
        Rating::create([
            'association_id' => $associationId,
            'user_id' => Auth::id(),
            'rating' => $request->input('rating'),
        ]);
    }

    return back()->with('success', 'Votre évaluation a été enregistrée!');
}

    /**
     * Afficher les associations d'une ville
     *
     * @param int $ville_id
     * @return \Illuminate\View\View
     */
    public function index($ville_id)
    {
        // Récupérer la ville en fonction de son ID
        $ville = Ville::findOrFail($ville_id);

        // Récupérer les associations liées à cette ville avec leurs commentaires et évaluations
        $associations = Association::where('ville_id', $ville_id)
            ->where(function ($query) {
                $query->where('status', 'confirmée')
                      ->orWhere(function ($query) {
                          $query->where('status', 'en attente')
                                ->where('user_id', Auth::id());
                      });
            })
            ->with(['comments.user', 'ratings']) // Charger les relations nécessaires
            ->get();

        // Passer les données à la vue
        return view('associations', compact('ville', 'associations'));
    }

    /**
     * Afficher le formulaire d'ajout d'une nouvelle association
     *
     * @param int $ville_id
     * @return \Illuminate\View\View
     */
    public function create($ville_id)
    {
        // Récupérer la ville
        $ville = Ville::findOrFail($ville_id);

        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['message' => 'Vous devez être connecté pour ajouter une association.']);
        }

        // Afficher le formulaire de création d'association
        return view('create-association', compact('ville'));
    }

    /**
     * Ajouter une nouvelle association
     *
     * @param \Illuminate\Http\Request $request
     * @param int $ville_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $ville_id)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['message' => 'Vous devez être connecté pour ajouter une association.']);
        }

        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
        ]);

        // Récupérer l'utilisateur authentifié
        $userId = Auth::id();

        // Créer la nouvelle association avec le statut "en attente"
        Association::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'contact' => $request->contact,
            'ville_id' => $ville_id,
            'user_id' => $userId,
            'status' => 'en attente', // Statut initial de l'association
        ]);

        // Rediriger vers la page des associations de la ville avec un message de succès
        return redirect()->route('ville.associations', $ville_id)->with('success', 'Association ajoutée avec succès et en attente de validation.');
    }

    /**
     * Afficher les détails d'une association avec commentaires et évaluations
     *
     * @param int $associationId
     * @return \Illuminate\View\View
     */
    public function showDetails($associationId)
    {
        // Vérifier si l'association existe
        $association = Association::with(['comments.user', 'ratings.user'])->findOrFail($associationId);

        // Passer les données à la vue
        return view('association-details', compact('association'));
    }
}