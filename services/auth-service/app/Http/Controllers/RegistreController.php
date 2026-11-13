<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistreController extends Controller
{
    public function index()
    {
        $response = Http::get('http://patrimoine-service:8000/api/patrimoine/biens');
        
        $biens = [];
        if ($response->successful()) {
            $data = $response->json();
            $biens = $data['data'] ?? [];
        }
        
        return view('registre', compact('biens'));
    }

    public function show($id)
    {
        $response = Http::get("http://patrimoine-service:8000/api/patrimoine/biens/{$id}");
        
        if (!$response->successful()) {
            abort(404);
        }
        
        $bien = $response->json()['data'];
        
        return view('fiche-bien', compact('bien'));
    }
}