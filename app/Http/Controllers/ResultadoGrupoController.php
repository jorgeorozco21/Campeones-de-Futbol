<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\resultadoGrupo;
use App\Models\Equipo;
use App\Models\Resultado;
use Illuminate\Support\Facades\DB;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;

class ResultadoGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultadosGrupos = 
            DB::table('resultados_grupos as rg')
            ->join('resultados as r','r.id','=','rg.ID_Resultado')
            ->join("torneos as t","t.id","=","rg.ID_Torneo")
            ->join("competiciones as c","c.id","=","t.ID_Competicion")
            ->join("equipos as e","e.id","=","rg.ID_Equipo")
            ->select(
                "rg.id",
                "rg.Grupo",
                "e.Escudo",
                "e.Nombre as nombreEquipo",
                "c.Logo",
                "c.Nombre as nombreCompeticion",
                "t.Edicion",
                "r.Ganados",
                "r.Perdidos",
                "r.Empates",
                "r.GA",
                "r.GC",
                "r.DG",
                "r.Puntos",
                "r.Clasificacion"
            )
            ->get()
        ;
        return view('Crud.Resultados_Grupos.index',compact('resultadosGrupos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos['equipos'] = Equipo::all();
        $datos['torneos'] = 
            DB::table('torneos as t')
            ->join('competiciones as c',"c.id","=","t.ID_Competicion")
            ->select(
                "t.id",
                "t.Edicion",
                "c.Nombre"
            )
            ->where("c.Tipo","=","Copa")
            ->get()
        ;
        return view('Crud.Resultados_Grupos.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $datosResultado = $request->except("_token");
        
        if ($datosResultado['tipoInsercion'] == "normal") {
            $request->validate([
                "Grupo" => "required|string|max:255",
                "Ganados" => "min:0",
                "Perdidos" => "min:0",
                "Empatados" => "min:0",
                "GA" => "min:0",
                "GC" => "min:0",
                "DG" => "min:0",
                "Puntos" => "min:0",
            ],[
                "Grupo.required" => "El Grupo es obligatorio",
                "Ganados.min" => "Valor minimo es de 0",
                "Perdidos.min" => "Valor minimo es de 0",
                "Empatados.min" => "Valor minimo es de 0",
                "GA.min" => "Valor minimo es de 0",
                "GC.min" => "Valor minimo es de 0",
                "DG.min" => "Valor minimo es de 0",
                "Puntos.min" => "Valor minimo es de 0",
            ]);

            $datosResultado = $request->except("_token","tipoInsercion","ID_Equipo","ID_Torneo","ID_Resultado","Grupo");
            Resultado::insert($datosResultado);
            $ultimoId = Resultado::max('id');
            $datosResultado = $request->except("_token","tipoInsercion","Ganados","Perdidos","Empates","GA","GC","DG","Puntos","Clasificacion");
            $datosResultado['ID_Resultado'] = $ultimoId;
            
            resultadoGrupo::insert($datosResultado);
        }else if ($datosResultado['tipoInsercion'] == "cargaMasiva") {
            $archivo = $request->file('archivo');
            $contenido = file_get_contents($archivo->getRealPath());
            $datosResultado = json_decode($contenido, true);

            foreach ($datosResultado as $resultado) {
                $infoRes = [
                    "Ganados" => $resultado['Ganados'],
                    "Perdidos" => $resultado['Perdidos'],
                    "Empates" => $resultado['Empates'],
                    "GA" => $resultado['GA'],
                    "GC" => $resultado['GC'],
                    "DG" => $resultado['DG'],
                    "Puntos" => $resultado['Puntos'],
                    "Clasificacion" => $resultado['Clasificacion']
                ];

                Resultado::insert($infoRes);

                $ultimoId = Resultado::max('id');

                $equipo = Equipo::where('Nombre',"=",$resultado["NombreEquipo"])->first();

                $torneo = 
                    DB::table('torneos as t')
                    ->join("competiciones as c","c.id","=","t.ID_Competicion")
                    ->select(
                        "t.id"
                    )
                    ->where("t.Edicion","=",$resultado['Edicion'])
                    ->where("c.Nombre","=",$resultado['NombreTorneo'])
                    ->first()
                ;

                $infoGrupo = [
                    "ID_Equipo" => $equipo->id,
                    "ID_Torneo" => $torneo->id,
                    "Grupo" => $resultado['Grupo'],
                    "ID_Resultado" => $ultimoId
                ];

                resultadoGrupo::insert($infoGrupo);

            }
        }

        return redirect()->route('Resultados_Grupo.create')->with('success',"Informacion agregada correctamente");

        // Debugar la API
        //return response()->json($datosResultado);
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
        $resultado = 
            DB::table('resultados_grupos as rg')
            ->join('resultados as r','r.id','=','rg.ID_Resultado')
            ->join("torneos as t","t.id","=","rg.ID_Torneo")
            ->join("competiciones as c","c.id","=","t.ID_Competicion")
            ->join("equipos as e","e.id","=","rg.ID_Equipo")
            ->select(
                "rg.id",
                "rg.ID_Equipo",
                "rg.ID_Torneo",
                "rg.Grupo",
                "e.Escudo",
                "e.Nombre as nombreEquipo",
                "c.Logo",
                "c.Nombre as nombreCompeticion",
                "t.Edicion",
                "r.Ganados",
                "r.Perdidos",
                "r.Empates",
                "r.GA",
                "r.GC",
                "r.DG",
                "r.Puntos",
                "r.Clasificacion"
            )
            ->where("rg.id","=",$id)
            ->first()
        ;

        $datos['equipos'] = Equipo::all();
        $datos['torneos'] = 
            DB::table('torneos as t')
            ->join('competiciones as c',"c.id","=","t.ID_Competicion")
            ->select(
                "t.id",
                "t.Edicion",
                "c.Nombre"
            )
            ->where("c.Tipo","=","Copa")
            ->get()
        ;

        return view('Crud.Resultados_Grupos.edit',compact('resultado'),$datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "Grupo" => "required|string|max:255",
            "Ganados" => "min:0",
            "Perdidos" => "min:0",
            "Empatados" => "min:0",
            "GA" => "min:0",
            "GC" => "min:0",
            "DG" => "min:0",
            "Puntos" => "min:0",
        ],[
            "Grupo.required" => "El Grupo es obligatorio",
            "Ganados.min" => "Valor minimo es de 0",
            "Perdidos.min" => "Valor minimo es de 0",
            "Empatados.min" => "Valor minimo es de 0",
            "GA.min" => "Valor minimo es de 0",
            "GC.min" => "Valor minimo es de 0",
            "DG.min" => "Valor minimo es de 0",
            "Puntos.min" => "Valor minimo es de 0",
        ]);

        $resultado = $request->except('_token','_method');

        $infoRes = [
            "Ganados" => $resultado['Ganados'],
            "Perdidos" => $resultado['Perdidos'],
            "Empates" => $resultado['Empates'],
            "GA" => $resultado['GA'],
            "GC" => $resultado['GC'],
            "DG" => $resultado['DG'],
            "Puntos" => $resultado['Puntos'],
            "Clasificacion" => $resultado['Clasificacion']
        ];

        $res = resultadoGrupo::findOrFail($id);

        Resultado::where("id","=",$res["ID_Resultado"])->update($infoRes);

        $infoLiga = [
            "ID_Equipo" => $resultado["ID_Equipo"],
            "ID_Torneo" => $resultado["ID_Torneo"],
            "Grupo" => $resultado['Grupo'],
            "ID_Resultado" => $res["ID_Resultado"]
        ];

        resultadoGrupo::where("id","=",$id)->update($infoLiga);

        return redirect()->route('Resultados_Grupo.edit',$id)->with('success',"Resultado editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resultadosGrupos = resultadoGrupo::findOrFail($id);

        $resultado = Resultado::findOrFail($resultadosGrupos['ID_Resultado']);

        $resultado->delete();

        $resultadosGrupos->delete();

        return redirect()->route('Resultados_Grupo.index')->with('success',"Resultado eliminado correctamente");
    }
}
