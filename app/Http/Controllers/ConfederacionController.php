<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Confederacion;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;

class ConfederacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['Confederaciones'] = Confederacion::all();
        return view('Crud.Confederacion.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Crud.Confederacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosConfederacion = $request->except("_token");

        $request->validate([
            "Nombre" => "required|string|max:255",
            "Logo" => "required|string|max:255",
            "Descripcion" => "required"
        ],[
            "Nombre.required" => "El Nombre es obligatorio",
            "Logo.required" => "El Logo es obligatorio",
            "Logo.max" => "Excediste el tamaño maximo de la liga",
            "Descripcion" => "La Descripcion es obligatoria"
        ]);

        $datosConfederacion['Logo'] = "uploads/".$datosConfederacion['Logo'];

        Confederacion::insert($datosConfederacion);

        return redirect()->route("Confederacion.create")->with('success',"Informacion agregada correctamente");

        // Debugar la API
        //return response()->json($datosConfederacion);
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
        $confederacion = Confederacion::findOrFail($id);
        return view("Crud.Confederacion.edit",compact('confederacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "Nombre" => "required|string|max:255",
            "Logo" => "required|string|max:255",
            "Descripcion" => "required"
        ],[
            "Nombre.required" => "El Nombre es obligatorio",
            "Logo.required" => "El Logo es obligatorio",
            "Logo.max" => "Excediste el tamaño maximo de la liga",
            "Descripcion" => "La Descripcion es obligatoria"
        ]);

        $datosConfederacion = $request->except("_token","_method");

        $confederacion = Confederacion::findOrFail($id);
        Storage::disk('public')->delete($confederacion->Logo);

        Confederacion::where("id","=",$id)->update($datosConfederacion);

        return redirect()->route('Confederacion.edit',$id)->with('success','Confederacion editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $confederacion = Confederacion::findOrFail($id);

        Storage::disk('public')->delete($confederacion->Logo);

        $confederacion->delete();

        return redirect()->route('Confederacion.index',$id)->with('success','Confederacion eliminada correctamente');
    }
}
