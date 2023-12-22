<?php

namespace App\Http\Controllers;

use App\Models\Ataza;
use App\Models\Pertsona;
use Illuminate\Http\Request;

class AtazaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'izena' => 'required|min:3',
            'data' => 'required',
            'pertsona_id' => 'required', // Asegúrate de tener validación para pertsona_id
        ]);

        $ataza = new Ataza();
        $ataza->izena = $request->izena;
        $ataza->data = $request->data;
        $ataza->pertsona_id = $request->pertsona_id;
        $ataza->save();

        return redirect()->route('atazak')->with('success', 'Ataza ondo gorde da.');
    }

    public function index()
    {
        $atazak = Ataza::all();
        $pertsonak = Pertsona::all();
        return view('atazak.index', ['atazak' => $atazak, 'pertsonak' => $pertsonak]);
    }

    public function show($id)
    {
        $ataza = Ataza::find($id);
        return view('atazak.show', ['ataza' => $ataza]);
    }

    public function update(Request $request, $id)
    {
        $ataza = Ataza::find($id);
        $ataza->izena = $request->izena;
        $ataza->data = $request->data;
        $ataza->pertsona_id = $request->pertsona_id;
        $ataza->save();

        return redirect()->route('atazak')->with('success', 'Ataza ondo eguneratu da.');
    }

    public function destroy($id)
    {
        $ataza = Ataza::find($id);
        $ataza->delete();
        return redirect()->route('atazak')->with('success', 'Ataza ondo ezabatu da.');
    }
}
