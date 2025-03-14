<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Avion extends Model
{
    use HasFactory;

    protected $table = 'avions';
    protected $primaryKey = 'CodeAv';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'CodeAv',
        'ModèleAv',
        'CapacitéAv',
    ];

    // Relation avec Vol
    public function vols(): HasMany
    {
        return $this->hasMany(Vol::class, 'CodeAv', 'CodeAv');
    }
}
