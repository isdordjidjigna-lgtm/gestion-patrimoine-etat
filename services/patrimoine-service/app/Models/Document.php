<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['bien_id', 'nom', 'type', 'chemin_fichier'];

    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }
}
