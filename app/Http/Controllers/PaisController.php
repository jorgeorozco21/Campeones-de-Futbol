<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pais;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['paises'] = Pais::all();
        return view('Crud.Pais.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Crud.Pais.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosPais = $request->except("_token");

        if ($datosPais['tipoInsercion'] == "normal") {
            $request->validate([
                "Nombre" => "required|string|max:255",
                "Bandera" => "required|string|max:255"
            ],[
                "Nombre.required" => "El Nombre es obligatorio",
                "Bandera.required" => "La Bandera es obligatoria",
                "Bandera.max" => "Exediste el tamaño maximo de la liga"
            ]);

            $datosPais = $request->except("_token","tipoInsercion");

            $datosPais['Bandera'] = "uploads/".$datosPais['Bandera'];

            Pais::insert($datosPais);
        }else if ($datosPais['tipoInsercion'] == "cargaMasiva"){
            $archivo = $request->file('archivo');
            $contenido = file_get_contents($archivo->getRealPath());
            $datosPais = json_decode($contenido, true);

            foreach ($datosPais as $pais) {
                $pais['Bandera'] = "uploads/".$pais['Bandera'];
                Pais::insert($pais);
            }
        }

        return redirect()->route("Pais.create")->with('success',"Informacion agregada correctamente");

        // Debugar la API
        //return response()->json($datosPais);
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
        $pais = Pais::findOrFail($id);
        return view('Crud.Pais.edit',compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "Nombre" => "required|string|max:255",
            "Bandera" => "required|string|max:255"
        ],[
            "Nombre.required" => "El Nombre es obligatorio",
            "Bandera.required" => "La Bandera es obligatoria",
            "Bandera.max" => "Exediste el tamaño maximo de la liga"
        ]);

        $datosPais = $request->except("_token","_method");

        $pais = Pais::findOrFail($id);
        if ($pais->Bandera != $datosPais['Bandera']) {
            Storage::disk('public')->delete($pais->Bandera);
        }

        Pais::where("id","=",$id)->update($datosPais);

        return redirect()->route('Pais.edit',$id)->with('success',"Pais editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pais = Pais::findOrFail($id);

        Storage::disk('public')->delete($pais->Bandera);

        $pais->delete();

        return redirect()->route('Pais.index')->with('success',"Pais eliminado correctamente");
    }
}
