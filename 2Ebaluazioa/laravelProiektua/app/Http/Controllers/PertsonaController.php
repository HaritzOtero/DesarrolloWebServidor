<?php

namespace App\Http\Controllers;
use App\Models\Kategoria;
use Illuminate\Http\Request;
use App\Models\Pertsona; // Agrega esta línea para importar la clase Pertsona

class PertsonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pertsonak = Pertsona::all();
        return view('pertsona.index', ['pertsonak' => $pertsonak]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    
    $request->validate([
        'izena' => 'required|unique:pertsonas|max:255',
        'abizena' => 'required|max:7'
    ]);

    $pertsona = new Pertsona;
    $pertsona->izena = $request->izena;
    $pertsona->abizena = $request->abizena;
    $pertsona->save();

    return redirect()->route('pertsona.index')->with('success', 'Pertsona berria sortu da');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pertsona = Pertsona::find($id);
        return view('pertsona.show', ['pertsona' => $pertsona]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request-> validate([
            'izena' => 'required|unique:pertsona|max:255' ,
            'abizena' => 'required|max:100'
        ]);


        $pertsona = new Pertsona;
        $pertsona->izena = $request->izena;
        $pertsona->abizena = $request->abizena;
        $pertsona->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pertsona =Pertsona::find($id);
        $pertsona->delete();


        return redirect()->route('pertsona.index')->with('success', 'Pertsona ezabatua');

    }
}
