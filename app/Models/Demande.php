<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;
    // Specify the table name if it doesn't follow Laravel's convention
    protected $table = 'demandes';

    // Specify the primary key if it's not the default 'id'
    protected $primaryKey = 'iddemande';

    // If you want to use timestamps (created_at and updated_at)
    public $timestamps = true;

    protected $fillable = [
        'details_comptable',
        'details_abonnements',
        'etat_demande',
        'commentaire',
        'idcomptable',
        'idabonnementglobals',
    ];

    // Define relationships
    public function comptable()
    {
        return $this->belongsTo(Accountant::class, 'idcomptable');
    }

    public function abonnementglobal()
    {
        return $this->belongsTo(Abonnementsglobal::class, 'idabonnementglobals');
    }
}
