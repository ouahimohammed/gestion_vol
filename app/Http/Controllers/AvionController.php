<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AvionController extends Controller
{
    public function index()
    {
        $avions = DB::table('avions')->get();
        return view('avions.index', compact('avions'));
    }

    public function create()
    {
        return view('avions.create');
    }

    // Ajouter un nouvel avion
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'CodeAv' => 'required|string|max:4|unique:avions',
            'ModèleAv' => 'required|string|max:50',
            'CapacitéAv' => 'required|integer|min:50',
        ]);

        if ($validator->fails()) {
            return redirect()->route('avions.create')
                ->withErrors($validator)
                ->withInput();
        }

        DB::table('avions')->insert([
            'CodeAv' => $request->CodeAv,
            'ModèleAv' => $request->ModèleAv,
            'CapacitéAv' => $request->CapacitéAv,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('avions.index')
            ->with('success', 'Avion ajouté avec succès');
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $avion = DB::table('avions')->where('CodeAv', $id)->first();

        if (!$avion) {
            return redirect()->route('avions.index')
                ->with('error', 'Avion non trouvé');
        }

        return view('avions.edit', compact('avion'));
    }

    // Mettre à jour un avion
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ModèleAv' => 'required|string|max:50',
            'CapacitéAv' => 'required|integer|min:50',
        ]);

        if ($validator->fails()) {
            return redirect()->route('avions.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        DB::table('avions')
            ->where('CodeAv', $id)
            ->update([
                'ModèleAv' => $request->ModèleAv,
                'CapacitéAv' => $request->CapacitéAv,
                'updated_at' => now(),
            ]);

        return redirect()->route('avions.index')
            ->with('success', 'Avion mis à jour avec succès');
    }

    public function destroy($id)
    {
        $volsCount = DB::table('vols')->where('CodeAv', $id)->count();

        if ($volsCount > 0) {
            return redirect()->route('avions.index')
                ->with('error', 'Impossible de supprimer cet avion car il est associé à des vols');
        }

        DB::table('avions')->where('CodeAv', $id)->delete();

        return redirect()->route('avions.index')
            ->with('success', 'Avion supprimé avec succès');
    }
}
