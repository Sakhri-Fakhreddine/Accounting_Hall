<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Accountant extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's convention
    protected $table = 'accountants';

    // Specify the primary key if it's not the default 'id'
    protected $primaryKey = 'idAccountant';

    // If you want to use timestamps (created_at and updated_at)
    public $timestamps = true;

    // Specify the fillable attributes
    protected $fillable = [
        'nom_commercial',
        'Nomprenom',
        'registre_de_commerce',
        'code_tva',
        'phone',
        'email',
        'etat',
    ];

    // Define a relationship with the Client model
    public function clients(): HasMany
    {
        return $this->hasMany(Client::class, 'id_accountant', 'idAccountant');
    }
}
