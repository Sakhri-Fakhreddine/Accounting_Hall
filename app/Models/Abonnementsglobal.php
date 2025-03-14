<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnementsglobal extends Model
{
    use HasFactory;

    protected $fillable = [
        'etat_abonnement',
        'montant',
        'typeabonnement',
        'idcomptable',
    ];

    // Define relationships
    public function comptable()
    {
        return $this->belongsTo(Accountant::class, 'idcomptable');
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class, 'abonnementglobals');
    }
}
