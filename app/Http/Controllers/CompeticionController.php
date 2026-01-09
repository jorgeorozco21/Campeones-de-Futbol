<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competicion;
use App\Models\Pais;
use App\Models\Confederacion;
use Illuminate\Support\Facades\DB;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;

class CompeticionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $competiciones = 
            DB::table('competiciones as c')
            ->join('paises as p','p.id','=','c.ID_Pais')
            ->join('confederaciones as con','con.id','=','c.ID_Confederacion')
            ->select(
                'c.id',
                'c.Logo as logoCompeticion',
                'c.Nombre as nombreCompeticion',
                'c.Tipo',
                'p.Nombre as nombrePais',
                'p.Bandera',
                'con.Nombre as nombreConfederacion',
                'con.Logo as logoConfederacion'
            )
            ->get()
        ;

        return view('Crud.Competiciones.index',compact('competiciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos['paises'] = Pais::all();
        $datos['confederaciones'] = Confederacion::all();
        return view('Crud.Competiciones.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosCompeticion = $request->except('_token');

        if ($datosCompeticion['tipoInsercion'] == 'Normal') {
            $request->validate([
                "Nombre" => "required|string|max:255",
                "Logo" => "required|string|max:255",
                "Descripcion" => "required",
            ],[
                "Nombre.required" => "El Nombre es obligatorio",
                "Logo.required" => "El Logo es obligatorio",
                "Logo.max" => "Excediste el tamaño maximo de la liga",
                "Descripcion" => "La Descripcion es obligatoria"
            ]);

            $datosCompetencia = $request->except("_token","tipoInsercion");

            $datosCompetencia['Logo'] = "uploads/".$datosCompetencia['Logo'];

            Competicion::insert($datosCompetencia);
        }else if ($datosCompeticion['tipoInsercion'] == "cargaMasiva") {
            $archivo = $request->file('archivo');
            $contenido = file_get_contents($archivo->getRealPath());
            $datosCompetencia = json_decode($contenido, true);

            foreach ($datosCompetencia as $competicion) {
                $pais = Pais::where("Nombre",$competicion['ID_Pais'])->first();
                $competicion['ID_Pais'] = $pais->id;
                
                $confederacion = Confederacion::where("Nombre",$competicion['ID_Confederacion'])->first();
                $competicion['ID_Confederacion'] = $confederacion->id;

                $competicion['Logo'] = 'uploads/'.$competicion['Logo'];

                Competicion::insert($competicion);
            }
        }

        return redirect()->route('Competicion.create')->with('success',"Informacion agregada correctamente");
        
        // Debugar la API
        //return response()->json($datosCompetencia);
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
    public function edit(string $id)
    {
        $competicion = Competicion::findOrFail($id);
        $datos['paises'] = Pais::all();
        $datos['confederaciones'] = Confederacion::all();
        return view('Crud.Competiciones.edit',compact('competicion'),$datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "Nombre" => "required|string|max:255",
            "Logo" => "required|string|max:255",
            "Descripcion" => "required",
        ],[
            "Nombre.required" => "El Nombre es obligatorio",
            "Logo.required" => "El Logo es obligatorio",
            "Logo.max" => "Excediste el tamaño maximo de la liga",
            "Descripcion" => "La Descripcion es obligatoria"
        ]);

        $datosCompeticion = $request->except('_token','_method');

        $competicion = Competicion::findOrFail($id);
        if ($competicion->Logo != $datosCompeticion['Logo']){
            Storage::disk('public')->delete($competicion->Logo);
        }

        Competicion::where("id","=",$id)->update($datosCompeticion);

        return redirect()->route("Competicion.edit",$id)->with('success',"Competicion editada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $competicion = Competicion::findOrFail($id);

        Storage::disk('public')->delete($competicion->Logo);

        $competicion->delete();

        return redirect()->route('Competicion.index')->with('success',"Competicion eliminada correctamente");
    }
}
