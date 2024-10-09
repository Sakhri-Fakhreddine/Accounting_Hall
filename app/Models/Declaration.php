<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Declaration extends Model
{
    use HasFactory;

    protected $fillable = [
        'declaration_type',  // Make sure this matches your migration
        'declaration_date',   // Make sure this matches your migration
        'details',            // Make sure this matches your migration
        'client_id',         // Foreign key to the Clients table (use 'client_id' as per your migration)
    ];

    // Declaration belongs to a client
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id'); // Use 'client_id' as defined in your migrations
    }

    // Declaration has many line declarations
    public function lignedeclarations()
    {
        return $this->hasMany(LigneDeclaration::class, 'declaration_id'); // Ensure this matches your LigneDeclaration foreign key
    }
}

