<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\resultadoLiga;
use App\Models\Resultado;
use App\Models\Equipo;
use App\Models\Torneo;
use Illuminate\Support\Facades\DB;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;

class ResultadoLigaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultadosLiga = 
            DB::table('resultados_liga as rl')
            ->join('resultados as r','r.id','=','rl.ID_Resultado')
            ->join("torneos as t","t.id","=","rl.ID_Torneo")
            ->join("competiciones as c","c.id","=","t.ID_Competicion")
            ->join("equipos as e","e.id","=","rl.ID_Equipo")
            ->select(
                "rl.id",
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
        return view('Crud.Resultados_Liga.index',compact('resultadosLiga'));
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
            ->where("c.Tipo","=","Liga")
            ->orWhere("c.Tipo","=","Liguilla")
            ->get()
        ;
        return view("Crud.Resultados_Liga.create",$datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "Ganados" => "min:0",
            "Perdidos" => "min:0",
            "Empatados" => "min:0",
            "GA" => "min:0",
            "GC" => "min:0",
            "DG" => "min:0",
            "Puntos" => "min:0",
        ],[
            "Ganados.min" => "Valor minimo es de 0",
            "Perdidos.min" => "Valor minimo es de 0",
            "Empatados.min" => "Valor minimo es de 0",
            "GA.min" => "Valor minimo es de 0",
            "GC.min" => "Valor minimo es de 0",
            "DG.min" => "Valor minimo es de 0",
            "Puntos.min" => "Valor minimo es de 0",
        ]);

        $datosResultado = $request->except("_token");

        if ($datosResultado['tipoInsercion'] == "normal") {

            $datosResultado = $request->except("_token","tipoInsercion","ID_Equipo","ID_Torneo","ID_Resultado");
            Resultado::insert($datosResultado);
            $ultimoId = Resultado::max('id');
            $datosResultado = $request->except("_token","tipoInsercion","Ganados","Perdidos","Empates","GA","GC","DG","Puntos","Clasificacion");
            $datosResultado['ID_Resultado'] = $ultimoId;

            resultadoLiga::insert($datosResultado);
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

                $infoLiga = [
                    "ID_Equipo" => $equipo->id,
                    "ID_Torneo" => $torneo->id,
                    "ID_Resultado" => $ultimoId
                ];

                resultadoLiga::insert($infoLiga);

                //return response()->json($resultado);
            }
        }

        return redirect()->route('Resultados_Liga.create')->with('success',"Informacion agregada correctamente");

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
    public function edit(string $id)
    {
        $resultado = 
            DB::table('resultados_liga as rl')
            ->join("resultados as r","r.id","=","rl.ID_Resultado")
            ->select(
                "rl.id",
                "rl.ID_Equipo",
                "rl.ID_Torneo",
                "r.Ganados",
                "r.Perdidos",
                "r.Empates",
                "r.GA",
                "r.GC",
                "r.DG",
                "r.Puntos",
                "r.Clasificacion"
            )
            ->where('rl.id',"=",$id)
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
            ->where("c.Tipo","=","Liga")
            ->orWhere("c.Tipo","=","Liguilla")
            ->get()
        ;
        return view('Crud.Resultados_Liga.edit',compact('resultado'),$datos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            "Ganados" => "min:0",
            "Perdidos" => "min:0",
            "Empatados" => "min:0",
            "GA" => "min:0",
            "GC" => "min:0",
            "DG" => "min:0",
            "Puntos" => "min:0",
        ],[
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

        $res = resultadoLiga::findOrFail($id);

        Resultado::where("id","=",$res["ID_Resultado"])->update($infoRes);

        $infoLiga = [
            "ID_Equipo" => $resultado["ID_Equipo"],
            "ID_Torneo" => $resultado["ID_Torneo"],
            "ID_Resultado" => $res["ID_Resultado"]
        ];

        resultadoLiga::where("id","=",$id)->update($infoLiga);

        return redirect()->route('Resultados_Liga.edit',$id)->with('success',"Resultado editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $resultadosLiga = ResultadoLiga::findOrFail($id);

        $resultado = Resultado::findOrFail($resultadosLiga['ID_Resultado']);

        $resultado->delete();

        $resultadosLiga->delete();

        return redirect()->route('Resultados_Liga.index')->with('success',"Resultado eliminado correctamente");
    }
}
