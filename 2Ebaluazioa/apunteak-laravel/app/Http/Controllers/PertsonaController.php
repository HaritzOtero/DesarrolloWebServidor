<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lana;
use App\Models\Pertsona;

class PertsonaController extends Controller
{
    public function index()
    {
        //
        $pertsonak = Pertsona::all();
        $lanak = Lana::all();
        return view('pertsonak.index',['pertsonak' => $pertsonak, 'lanak' => $lanak]);
    }

     function store(Request $request)
    {
        //
        $request->validate([
            'izena' => 'required|min:3',
            'abizena' => 'required',
            'lana_id' => 'required' // Aquí cambia 'lana' por 'lana_id'
        ]);
   
        $pertsona = new Pertsona();
        $pertsona->izena = $request->izena;
        $pertsona->abizena = $request->abizena;
        $pertsona->lana_id = $request->lana_id;
        $pertsona->save();
   
        return redirect()->route('pertsona.index')->with('success','pertsona ondo gorde da');
    }


    public function update(Request $request, int $id)
{
    $request->validate([
        'izena' => 'required|min:3',
        'abizena' => 'required',
        'lana_id' => 'required'
    ]);

    $pertsona = Pertsona::findOrFail($id);
    $pertsona->izena = $request->izena;
    $pertsona->abizena = $request->abizena;
    $pertsona->lana_id = $request->lana_id;
    $pertsona->save();

    return redirect()->route('pertsona.index')->with('success','pertsona ondo eguneratu da');
}

    public function destroy(string $id)
    {
        //
        $pertsona = Pertsona::find($id);
        $pertsona->delete();


        return redirect()->route('pertsona.index')->with('success', 'pertsona ezabatua');
    }

    public function show($id)
    {
        $pertsona = Pertsona::find($id);
        $lanak = Lana::all();
        return view('pertsonak.show', ['pertsona' => $pertsona, 'lanak' => $lanak]);
    }

}
