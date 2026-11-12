<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference', 'designation', 'categorie_id', 'localisation_id',
        'valeur', 'date_acquisition', 'mode_acquisition', 'immatriculation',
        'surface', 'duree_amortissement', 'responsable', 'statut',
        'description', 'photo_principale',
    ];

    protected $casts = [
        'valeur' => 'decimal:2',
        'surface' => 'decimal:2',
        'date_acquisition' => 'date',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function localisation()
    {
        return $this->belongsTo(Localisation::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function mouvements()
    {
        return $this->hasMany(Mouvement::class);
    }
}
