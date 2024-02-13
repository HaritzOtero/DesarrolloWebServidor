<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lana;

class LanaController extends Controller
{
    public function store(Request $request){
        $request->validate(['izena'=>'required|min:3']);

        $lana = new Lana;
        $lana->izena = $request->izena;
        $lana->pertsonaKop = $request->pertsonaKop;

        $lana->save();

        return redirect()->route('lanak.index') ->with('success', 'Lana ondo gorde da');
    }

    public function index(){
        $lanak = Lana::all();
        return view('lanak.index', ['lanak' => $lanak]); //atazak.index viewra eraman lan guztiak
    }

    public function show($id){
        $lana = Lana::find($id);
        return view('lanak.show', ['lana' => $lana]);
    }

    public function update(Request $request, $id){
        $lana = Lana::find($id);
        $lana->izena = $request->izena;
        $lana->pertsonaKop = $request->pertsonaKop;
        $lana->save();

        return redirect()->route('lanak.index') ->with('success', 'Lana eguneratu da');
    }

    public function destroy($id){
        $lana = Lana::find($id);
        $lana ->delete();

        return redirect()->route('lanak.index') ->with('success', 'Lana ezabatu da');
    }
}
