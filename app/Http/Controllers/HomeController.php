<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Association;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show welcome page with a list of cities.
     */
    public function showWelcome()
    {
        $villes = Ville::all(); // Fetch all cities
        return view('welcome', compact('villes'));
    }

    /**
     * Show the list of associations for a specific city.
     */
    public function showAssociations($id)
    {
        $ville = Ville::findOrFail($id); // Find the city by ID
        $associations = Association::where('ville_id', $id)->get(); // Get associations for the city
        return view('associations', compact('ville', 'associations'));
    }

    /**
     * Show the form to add an association (only accessible if logged in).
     */
    public function showAddAssociationForm($id)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add an association.');
        }

        $ville = Ville::findOrFail($id); // Find the city by ID
        return view('add-association', compact('ville'));
    }

    /**
     * Handle the submission of the add association form.
     */
    public function storeAssociation(Request $request, $id)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add an association.');
        }

        // Validate form data
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'contact' => 'required|email',
        ]);

        // Create a new association
        Association::create([
            'ville_id' => $id,
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
            'contact' => $request->input('contact'),
            'status' => 'pending',
        ]);

        // Redirect back to the associations list with a success message
        return redirect()->route('city.associations', $id)
            ->with('success', 'Association added successfully and is pending approval.');

            
    }
    
    
}
