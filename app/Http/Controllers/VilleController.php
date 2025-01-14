<?php

namespace App\Http\Controllers;

use App\Models\Ville;

class VilleController extends Controller
{
    public function index()
    {
        $villes = Ville::all();
        return view('welcome', compact('villes'));
    }

    public function show($id)
    {
        $ville = Ville::with('associations')->findOrFail($id);
        return view('associations', compact('ville'));
    }
}


