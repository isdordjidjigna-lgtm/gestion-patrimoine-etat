<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    use HasFactory;

    protected $fillable = [
        'bien_id', 'type', 'entite_destinataire',
        'statut', 'date_mouvement', 'date_fin', 'notes',
    ];

    protected $casts = [
        'date_mouvement' => 'date',
        'date_fin' => 'date',
    ];

    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }
}
