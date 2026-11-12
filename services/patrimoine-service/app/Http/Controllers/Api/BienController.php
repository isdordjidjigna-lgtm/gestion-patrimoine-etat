<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    // GET /api/patrimoine/biens
    public function index()
    {
        $biens = Bien::with(['categorie', 'localisation', 'mouvements'])->get();
        return response()->json([
            'success' => true,
            'total' => $biens->count(),
            'data' => $biens,
        ]);
    }

    // POST /api/patrimoine/biens
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference' => 'required|string|unique:biens',
            'designation' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'localisation_id' => 'nullable|exists:localisations,id',
            'valeur' => 'required|numeric|min:0',
            'statut' => 'in:conforme,degrade,a_verifier,reforme',
            'date_acquisition' => 'nullable|date',
            'mode_acquisition' => 'nullable|string',
            'immatriculation' => 'nullable|string',
            'surface' => 'nullable|numeric',
            'duree_amortissement' => 'nullable|integer',
            'responsable' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $bien = Bien::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Bien créé avec succès',
            'data' => $bien->load('categorie', 'localisation'),
        ], 201);
    }

    // GET /api/patrimoine/biens/{id}
    public function show($id)
    {
        $bien = Bien::with(['categorie', 'localisation', 'documents', 'mouvements'])->find($id);

        if (!$bien) {
            return response()->json(['success' => false, 'message' => 'Bien non trouvé'], 404);
        }

        return response()->json(['success' => true, 'data' => $bien]);
    }

    // PUT /api/patrimoine/biens/{id}
    public function update(Request $request, $id)
    {
        $bien = Bien::find($id);
        if (!$bien) {
            return response()->json(['success' => false, 'message' => 'Bien non trouvé'], 404);
        }

        $validated = $request->validate([
            'designation' => 'sometimes|string|max:255',
            'valeur' => 'sometimes|numeric|min:0',
            'statut' => 'sometimes|in:conforme,degrade,a_verifier,reforme',
            'description' => 'nullable|string',
        ]);

        $bien->update($validated);

        return response()->json(['success' => true, 'message' => 'Bien mis à jour', 'data' => $bien]);
    }

    // DELETE /api/patrimoine/biens/{id}
    public function destroy($id)
    {
        $bien = Bien::find($id);
        if (!$bien) {
            return response()->json(['success' => false, 'message' => 'Bien non trouvé'], 404);
        }

        $bien->delete();

        return response()->json(['success' => true, 'message' => 'Bien supprimé']);
    }
}
