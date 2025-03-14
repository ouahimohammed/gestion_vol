<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VolController extends Controller
{
    
    public function index()
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
                'pilotes.MatPil',
                'pilotes.NomPrénomPil'
            )
            ->get();

        return view('vols.index', compact('vols'));
    }


    public function create()
    {
        $avions = DB::table('avions')->get();
        $pilotes = DB::table('pilotes')->get();

        return view('vols.create', compact('avions', 'pilotes'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'CodeAv' => 'required|string|exists:avions,CodeAv',
            'MatPil' => 'required|string|exists:pilotes,MatPil',
            'DateVol' => 'required|date',
            'VilleDép' => 'required|string|max:50',
            'VilleArr' => 'required|string|max:50',
            'NbrePass' => 'required|integer|min:41',
            'VolRéalisé' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->route('vols.create')
                ->withErrors($validator)
                ->withInput();
        }


        $avion = DB::table('avions')->where('CodeAv', $request->CodeAv)->first();
        if ($request->NbrePass > $avion->CapacitéAv) {
            return redirect()->route('vols.create')
                ->withErrors(['NbrePass' => 'Le nombre de passagers ne peut pas dépasser la capacité de l\'avion (' . $avion->CapacitéAv . ')'])
                ->withInput();
        }

        DB::table('vols')->insert([
            'CodeAv' => $request->CodeAv,
            'MatPil' => $request->MatPil,
            'DateVol' => $request->DateVol,
            'VilleDép' => $request->VilleDép,
            'VilleArr' => $request->VilleArr,
            'NbrePass' => $request->NbrePass,
            'VolRéalisé' => $request->has('VolRéalisé'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('vols.index')
            ->with('success', 'Vol ajouté avec succès');
    }


    public function edit($id)
    {
        $vol = DB::table('vols')->where('NumVol', $id)->first();

        if (!$vol) {
            return redirect()->route('vols.index')
                ->with('error', 'Vol non trouvé');
        }

        $avions = DB::table('avions')->get();
        $pilotes = DB::table('pilotes')->get();

        return view('vols.edit', compact('vol', 'avions', 'pilotes'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'CodeAv' => 'required|string|exists:avions,CodeAv',
            'MatPil' => 'required|string|exists:pilotes,MatPil',
            'DateVol' => 'required|date',
            'VilleDép' => 'required|string|max:50',
            'VilleArr' => 'required|string|max:50',
            'NbrePass' => 'required|integer|min:41',
            'VolRéalisé' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->route('vols.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }


        $avion = DB::table('avions')->where('CodeAv', $request->CodeAv)->first();
        if ($request->NbrePass > $avion->CapacitéAv) {
            return redirect()->route('vols.edit', $id)
                ->withErrors(['NbrePass' => 'Le nombre de passagers ne peut pas dépasser la capacité de l\'avion (' . $avion->CapacitéAv . ')'])
                ->withInput();
        }

        DB::table('vols')
            ->where('NumVol', $id)
            ->update([
                'CodeAv' => $request->CodeAv,
                'MatPil' => $request->MatPil,
                'DateVol' => $request->DateVol,
                'VilleDép' => $request->VilleDép,
                'VilleArr' => $request->VilleArr,
                'NbrePass' => $request->NbrePass,
                'VolRéalisé' => $request->has('VolRéalisé'),
                'updated_at' => now(),
            ]);

        return redirect()->route('vols.index')
            ->with('success', 'Vol mis à jour avec succès');
    }

    public function destroy($id)
    {
        DB::table('vols')->where('NumVol', $id)->delete();

        return redirect()->route('vols.index')
            ->with('success', 'Vol supprimé avec succès');
    }

    public function volsParAvion($codeAv)
    {
        $avion = DB::table('avions')->where('CodeAv', $codeAv)->first();

        if (!$avion) {
            return redirect()->route('avions.index')
                ->with('error', 'Avion non trouvé');
        }

        $vols = DB::table('vols')
            ->join('pilotes', 'vols.MatPil', '=', 'pilotes.MatPil')
            ->select(
                'vols.NumVol',
                'vols.DateVol',
                'vols.VilleDép',
                'vols.VilleArr',
                'vols.NbrePass',
                'vols.VolRéalisé',
                'pilotes.NomPrénomPil'
            )
            ->where('vols.CodeAv', $codeAv)
            ->get();

        return view('vols.par-avion', compact('vols', 'avion'));
    }

    public function volsParPilote($matPil)
    {
        $pilote = DB::table('pilotes')->where('MatPil', $matPil)->first();

        if (!$pilote) {
            return redirect()->route('pilotes.index')
                ->with('error', 'Pilote non trouvé');
        }

        $vols = DB::table('vols')
            ->join('avions', 'vols.CodeAv', '=', 'avions.CodeAv')
            ->select(
                'vols.NumVol',
                'vols.DateVol',
                'vols.VilleDép',
                'vols.VilleArr',
                'vols.NbrePass',
                'vols.VolRéalisé',
                'avions.ModèleAv'
            )
            ->where('vols.MatPil', $matPil)
            ->get();

        return view('vols.par-pilote', compact('vols', 'pilote'));
    }
}
