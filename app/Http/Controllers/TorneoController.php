<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competicion;
use App\Models\Torneo;
use App\Models\Equipo;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $torneos = 
            DB::table('torneos as t')
            ->join('competiciones as c',"c.id","=","t.ID_Competicion")
            ->join('equipos as e',"e.id","=","t.ID_Equipo")
            ->select(
                't.id',
                't.Edicion',
                'c.Logo',
                'c.Nombre as nombreCompeticion',
                'e.Escudo',
                'e.Nombre as nombreEquipo'
            )
            ->get()
        ;
        return view('Crud.Torneos.index',compact('torneos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $datos['competiciones'] = Competicion::all();
        $datos['equipos'] = Equipo::all();
        return view('Crud.Torneos.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosTorneo = $request->except("_token");

        if ($datosTorneo['tipoInsercion'] == "normal"){
            $request->validate([
                "Edicion" => "required|string|max:255"
            ],[
                "Edicion.required" => "La Edicion es obligatoria"
            ]);

            $datosTorneo = $request->except("_token","tipoInsercion");

            Torneo::insert($datosTorneo);
        }else if ($datosTorneo['tipoInsercion'] == "cargaMasiva") {
            $archivo = $request->file('archivo');
            $contenido = file_get_contents($archivo->getRealPath());
            $datosTorneo = json_decode($contenido, true);

            foreach ($datosTorneo as $torneo){
                $competicion = Competicion::where("Nombre",$torneo['ID_Competicion'])->first();
                $torneo['ID_Competicion'] = $competicion->id;

                $equipo = Equipo::where("Nombre",$torneo['ID_Equipo'])->first();
                $torneo['ID_Equipo'] = $equipo->id;
                
                Torneo::insert($torneo);
            }
        }

        return redirect()->route("Torneo.create")->with('success',"Informacion agregada correctamente");

        // Debugar la API
        //return response()->json($datosTorneo);
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
        $datos['competiciones'] = Competicion::all();
        $datos['equipos'] = Equipo::all();
        $torneo = Torneo::findOrFail($id);

        return view('Crud.Torneos.edit',compact('torneo'),$datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "Edicion" => "required|string|max:255"
        ],[
            "Edicion.required" => "La Edicion es obligatoria"
        ]);

        $datosTorneo = $request->except("_token","_method");

        Torneo::where("id","=",$id)->update($datosTorneo);

        return redirect()->route('Torneo.edit',$id)->with('success',"Torneo editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $torneo = Torneo::findOrFail($id);

        $torneo->delete();

        return redirect()->route('Torneo.index')->with('success',"Torneo borrado correctamente");
    }

    /**
     * Extraer la infromacion para las tarjetas de la pagina de competicion
     */
    public function informacionTorneos($id)
    {
        $competicion = 
            DB::table('competiciones as c')
            ->join('confederaciones as con','con.id','=','c.ID_Confederacion')
            ->select(
                'c.Nombre',
                'c.Logo',
                'c.ID_Pais',
                'c.Descripcion',
                'con.Nombre as nombreConfederacion'
            )
            ->where('c.id','=',$id)
            ->first()
        ;

        $torneos = 
            DB::table('torneos as t')
            ->join('equipos as e',"e.id","=","t.ID_Equipo")
            ->select( 
                "t.id",
                "e.Nombre",
                "e.Escudo",
                "t.Edicion"
            )
            ->where("t.ID_Competicion","=",$id)
            ->get()
        ;

        $campeones =
            DB::table('torneos as t')
            ->join('equipos as e',"e.id","=","t.ID_Equipo")
            ->select(
                'e.Nombre',
                'e.Escudo',
                DB::raw('COUNT(*) as Titulos')
            )
            ->where("t.ID_Competicion","=",$id)
            ->groupBy('t.ID_Equipo',"e.Nombre",'e.Escudo')
            ->orderByRaw('COUNT(*) DESC')
            ->get()
        ;

        $sugerencias = 
            DB::table('competiciones as c')
            ->join('paises as p',"p.id","=","c.ID_Pais")
            ->select(
                "c.id",
                "c.Logo",
                "c.Nombre as nombreCompeticion",
                "p.Nombre as nombrePais"
            )
            ->where("c.Nombre","!=",$competicion->Nombre)
            ->where("c.ID_Pais","=",$competicion->ID_Pais)
            ->orWhere('p.Nombre','=',$competicion->nombreConfederacion)
            ->get()
        ;

        return view('competicion',compact('torneos','campeones','sugerencias','competicion'));
    }
}
