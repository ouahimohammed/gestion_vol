<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pilote extends Model
{
    use HasFactory;

    protected $table = 'pilotes';
    protected $primaryKey = 'MatPil';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'MatPil',
        'NomPrénomPil',
        'AdressePil',
        'TelPil',
    ];

    // Relation avec Vol
    public function vols(): HasMany
    {
        return $this->hasMany(Vol::class, 'MatPil', 'MatPil');
    }
}
