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
        
        if ($datosEquipo['tipoInsercion'] == 'normal'){
            $request->validate([
                "Nombre" => "required|string|max:255",
                "Escudo" => "required|string|max:255"
            ],[
                "Nombre.required" => "El nombre es obligatorio",
                "Escudo.required" => "El escudo es obligatorio",
                "Escudo.max" => "Excediste el tamaño maximo de la liga"
            ]);

            $datosEquipo = $request->except('_token','tipoInsercion');

            $datosEquipo['Escudo'] = "uploads/".$datosEquipo['Escudo'];

            Equipo::insert($datosEquipo);
        }else if ($datosEquipo['tipoInsercion'] == 'cargaMasiva'){
            $archivo = $request->file('archivo');
            $contenido = file_get_contents($archivo->getRealPath());
            $datosEquipo = json_decode($contenido, true);

            foreach ($datosEquipo as $equipo){
                $equipo['Escudo'] = "uploads/".$equipo['Escudo'];
                Equipo::insert($equipo);
            }
        }

        return redirect()->route('Equipo.create')->with('success','Informacion agregada correctamente');

        // Debugar la API
        //return response()->json($datosEquipo);

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
        $request->validate([
            "Nombre" => "required|string|max:255",
            "Escudo" => "required|string|max:255"
        ],[
            "Nombre.required" => "El nombre es obligatorio",
            "Escudo.required" => "El escudo es obligatorio",
            "Escudo.max" => "Excediste el tamaño maximo de la liga"
        ]);

        $datosEquipo = $request->except('_token','_method');

        $equipo = Equipo::findOrFail($id);
        if ($equipo->Escudo != $datosEquipo['Escudo']) {
            Storage::disk('public')->delete($equipo->Escudo);
        }

        Equipo::where('id','=',$id)->update($datosEquipo);

        return redirect()->route('Equipo.edit',$id)->with('success','Equipo editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $equipo = Equipo::findORFail($id);

        Storage::disk('public')->delete($equipo->Escudo);

        $equipo->delete();

        return redirect()->route('Equipo.index')->with('success','Equipo borrado correctamente');
    }
}
