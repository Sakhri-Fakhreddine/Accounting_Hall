<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneDeclaration extends Model
{
    use HasFactory;

    protected $table = 'lignededeclarations';

    protected $fillable = [
        'typedeclaration',
        'documents',
        'datepiece',
        'libelle',
        'valeur1',
        'valeur2',
        'valeur3',
        'valeur4',
        'valeur5',
        'valeur6',
        'declaration_id' // Foreign key to the declarations table
    ];

    // Each line belongs to a declaration
    public function declaration()
    {
        return $this->belongsTo(Declaration::class, 'declaration_id'); // Updated to match the foreign key
    }
}