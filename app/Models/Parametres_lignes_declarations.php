<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametres_lignes_declarations extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lignes_parametres_declarations';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_lignes_parametres_declarations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'libellée',
        'compte_comptable',
        'debit_credit',
        'idparametresdeclarations',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'debit_credit' => 'string', // Enum values are treated as strings
    ];

    /**
     * Get the parametres declaration that owns this line.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parametresDeclaration()
    {
        return $this->belongsTo(Parametres_declarations::class, 'idparametresdeclarations', 'id_parametres_declarations');
    }
}