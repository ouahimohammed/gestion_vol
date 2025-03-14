<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class QueryBuilderReq extends Controller
{
    public function getVolsForAvion($codeAv)
    {
        $vols = DB::table('vols')
            ->where('CodeAv', $codeAv)
            ->get();

        return $vols;
    }

    public function getVolsForPilote($matPil)
    {
        $vols = DB::table('vols')
            ->where('MatPil', $matPil)
            ->get();

        return $vols;
    }

    public function getVolsWithDetails()
    {
        $vols = DB::table('vols')
            ->join('avions', 'vols.CodeAv', '=', 'avions.CodeAv')
            ->join('pilotes', 'vols.MatPil', '=', 'pilotes.MatPil')
            ->select(
                'vols.NumVol',
                'vols.DateVol',
                'vols.VilleDép',
                'vols.VilleArr',
                'vols.NbrePass',
                'vols.VolRéalisé',
                'avions.CodeAv',
                'avions.ModèleAv',
                'avions.CapacitéAv',
                'pilotes.MatPil',
                'pilotes.NomPrénomPil'
            )
            ->get();

        return $vols;
    }

    public function getVolsWithConditions()
    {
        $vols = DB::table('vols')
            ->join('avions', 'vols.CodeAv', '=', 'avions.CodeAv')
            ->join('pilotes', 'vols.MatPil', '=', 'pilotes.MatPil')
            ->select(
                'vols.NumVol',
                'vols.DateVol',
                'vols.VilleDép',
                'vols.VilleArr',
                'vols.NbrePass',
                'vols.VolRéalisé',
                'avions.ModèleAv',
                'pilotes.NomPrénomPil'
            )
            ->where('vols.VolRéalisé', true)
            ->where('vols.NbrePass', '>', 100)
            ->whereDate('vols.DateVol', '>=', now())
            ->orderBy('vols.DateVol', 'asc')
            ->get();

        return $vols;
    }
}
