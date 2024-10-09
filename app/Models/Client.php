<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's convention
    protected $table = 'clients';

    // Specify the primary key if it's not the default 'id'
    protected $primaryKey = 'idClients';

    // If you want to use timestamps (created_at and updated_at)
    public $timestamps = true;

    // Specify the fillable attributes
    protected $fillable = [
        'Nomprenom',
        'nom_commerciale',
        'adresse',
        'phone',
        'email',
        'id_accountant',
    ];

    // Define a relationship with the Accountant model
    public function accountant(): BelongsTo
    {
        return $this->belongsTo(Accountant::class, 'id_accountant', 'idAccountant');
    }
}
