<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametres_declarations extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parametres_declarations';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_parametres_declarations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'declaration_type',
        'id_accountant',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'declaration_type' => 'string', // Enum values are treated as strings
    ];

    /**
     * Get the accountant that owns the parametres declaration.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accountant()
    {
        return $this->belongsTo(Accountant::class, 'id_accountant', 'idAccountant');
    }
}