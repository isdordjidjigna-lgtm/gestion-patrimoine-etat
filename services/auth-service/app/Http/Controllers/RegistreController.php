<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistreController extends Controller
{
    public function index()
    {
        // Appel à l'API du patrimoine (via le réseau interne Docker)
        $response = Http::get('http://patrimoine-service:8000/api/patrimoine/biens');
        
        $biens = [];
        if ($response->successful()) {
            $data = $response->json();
            $biens = $data['data'] ?? [];
        }
        
        return view('registre', compact('biens'));
    }
}