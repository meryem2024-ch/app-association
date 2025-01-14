<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Ville;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentRatingController;


// Page d'accueil non authentifiée
Route::get('/', function () {
    $villes = Ville::all();  // Récupérer toutes les villes
    return view('welcome', compact('villes'));
})->name('home');


// Routes d'authentification
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('logout', [LoginController::class, 'logout']);
Route::get('/ville/{id}/associations', [AssociationController::class, 'index'])->name('ville.associations');


// Afficher le formulaire d'inscription
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Gérer l'enregistrement de l'utilisateur
Route::post('/register', [RegisterController::class, 'register']);

// Routes protégées par middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Ajouter une association
    Route::get('/ville/{id}/associations/create', [AssociationController::class, 'create'])->name('association.create');
    Route::post('/ville/{id}/associations', [AssociationController::class, 'store'])->name('associations.store');
});

// Route pour afficher les associations confirmées d'une ville
Route::get('/ville/{id}/associations/confirmées', [AssociationController::class, 'showConfirmedAssociations'])
    ->name('ville.associations.confirmed');


//Route pour le login de administrateur 
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Routes pour gérer les associations en attente
Route::get('/admin/associations/pending', [AdminController::class, 'associationsPending'])->name('admin.associations.pending');
Route::post('/admin/associations/{ville_id}/confirm', [AdminController::class, 'confirmAssociations'])->name('admin.associations.confirm');


// Route pour confirmer une association
Route::post('/admin/association/{association_id}/confirm', [AdminController::class, 'confirmAssociation'])->name('admin.association.confirm');


// Afficher les associations d'une ville
Route::get('ville/{ville_id}/associations', [AssociationController::class, 'index'])->name('ville.associations');

// Afficher le formulaire d'ajout d'une nouvelle association
Route::get('ville/{ville_id}/associations/create', [AssociationController::class, 'create'])->name('association.create');

// Ajouter une nouvelle association
Route::post('ville/{ville_id}/associations', [AssociationController::class, 'store'])->name('association.store');

// Ajouter un commentaire à une association
Route::post('association/{associationId}/comment', [AssociationController::class, 'storeComment'])->name('association.comment.store');
Route::get('association/{associationId}/comment', [AssociationController::class, 'storeComment'])->name('association.comment.store');
// Ajouter une évaluation pour une association
Route::post('association/{associationId}/rating', [AssociationController::class, 'storeRating'])->name('association.rating.store');




