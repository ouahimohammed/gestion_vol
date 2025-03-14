<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PiloteController extends Controller
{
    public function index()
    {
        $pilotes = DB::table('pilotes')->get();
        return view('pilotes.index', compact('pilotes'));
    }

    public function create()
    {
        return view('pilotes.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'MatPil' => 'required|string|max:8|unique:pilotes',
            'NomPrénomPil' => 'required|string|max:50',
            'AdressePil' => 'required|string|max:150',
            'TelPil' => 'required|string|max:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pilotes.create')
                ->withErrors($validator)
                ->withInput();
        }

        DB::table('pilotes')->insert([
            'MatPil' => $request->MatPil,
            'NomPrénomPil' => $request->NomPrénomPil,
            'AdressePil' => $request->AdressePil,
            'TelPil' => $request->TelPil,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('pilotes.index')
            ->with('success', 'Pilote ajouté avec succès');
    }

    public function edit($id)
    {
        $pilote = DB::table('pilotes')->where('MatPil', $id)->first();

        if (!$pilote) {
            return redirect()->route('pilotes.index')
                ->with('error', 'Pilote non trouvé');
        }

        return view('pilotes.edit', compact('pilote'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'NomPrénomPil' => 'required|string|max:50',
            'AdressePil' => 'required|string|max:150',
            'TelPil' => 'required|string|max:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pilotes.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        DB::table('pilotes')
            ->where('MatPil', $id)
            ->update([
                'NomPrénomPil' => $request->NomPrénomPil,
                'AdressePil' => $request->AdressePil,
                'TelPil' => $request->TelPil,
                'updated_at' => now(),
            ]);

        return redirect()->route('pilotes.index')
            ->with('success', 'Pilote mis à jour avec succès');
    }

    public function destroy($id)
    {
        $volsCount = DB::table('vols')->where('MatPil', $id)->count();

        if ($volsCount > 0) {
            return redirect()->route('pilotes.index')
                ->with('error', 'Impossible de supprimer ce pilote car il est associé à des vols');
        }

        DB::table('pilotes')->where('MatPil', $id)->delete();

        return redirect()->route('pilotes.index')
            ->with('success', 'Pilote supprimé avec succès');
    }
}
