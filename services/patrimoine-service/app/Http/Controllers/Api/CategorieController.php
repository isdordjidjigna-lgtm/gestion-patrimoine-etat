<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;

class CategorieController extends Controller
{
    // GET /api/patrimoine/categories
    public function index()
    {
        $categories = Categorie::withCount('biens')->get();
        return response()->json(['success' => true, 'data' => $categories]);
    }

    // GET /api/patrimoine/categories/{id}
    public function show($id)
    {
        $categorie = Categorie::with('biens')->find($id);
        if (!$categorie) {
            return response()->json(['success' => false, 'message' => 'Catégorie non trouvée'], 404);
        }
        return response()->json(['success' => true, 'data' => $categorie]);
    }
}
