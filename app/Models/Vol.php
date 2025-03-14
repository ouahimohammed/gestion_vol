<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vol extends Model
{
    use HasFactory;

    protected $table = 'vols';
    protected $primaryKey = 'NumVol';

    protected $fillable = [
        'CodeAv',
        'MatPil',
        'DateVol',
        'VilleDép',
        'VilleArr',
        'NbrePass',
        'VolRéalisé',
    ];

    protected $casts = [
        'DateVol' => 'date',
        'VolRéalisé' => 'boolean',
    ];

    // Relation avec Avion
    public function avion(): BelongsTo
    {
        return $this->belongsTo(Avion::class, 'CodeAv', 'CodeAv');
    }

    // Relation avec Pilote
    public function pilote(): BelongsTo
    {
        return $this->belongsTo(Pilote::class, 'MatPil', 'MatPil');
    }
}
