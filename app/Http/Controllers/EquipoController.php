<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipo;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['Equipos'] = Equipo::all();
        return view('Crud.Equipo.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Crud.Equipo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosEquipo = $request->except('_token');

        if ($request->hasFile('Escudo')){
            $datosEquipo['Escudo'] = $request->file('Escudo')->store('uploads','public');
        }

        Equipo::insert($datosEquipo);

        // Debugar la API
        //return response()->json($datosEquipo);

        return redirect()->route('Equipo.index')->with('success','Equipo agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('Crud.Equipo.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosEquipo = $request->except('_token','_method');

        if ($request->hasFile('Escudo')){
            $equipo = Equipo::findOrFail($id);
            Storage::disk('public')->delete($equipo->Escudo);
            $datosEquipo['Escudo'] = $request->file('Escudo')->store('uploads','public');
        }

        Equipo::where('id','=',$id)->update($datosEquipo);

        return redirect()->route('Equipo.index')->with('success','Equipo editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $equipo = Equipo::findORFail($id);

        if ($equipo->Escudo){
            Storage::disk('public')->delete($equipo->Escudo);
        }

        $equipo->delete();

        return redirect()->route('Equipo.index')->with('success','Equipo borrado correctamente');
    }
}
