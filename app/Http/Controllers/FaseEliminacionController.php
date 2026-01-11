<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\resultadoEliminacion;
use App\Models\faseEliminacion;
use Illuminate\Support\Facades\DB;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;

class FaseEliminacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasesEliminacion = 
            DB::table('fases_de_eliminacion as fe')
            ->join('equipos as e1',"e1.id","=","fe.ID_Equipo1")
            ->join('equipos as e2',"e2.id","=","fe.ID_Equipo2")
            ->join('torneos as t',"t.id","=","fe.ID_Torneo")
            ->join('competiciones as c',"c.id","=","t.ID_Competicion")
            ->join('resultados_eliminacion as re',"re.id","=","ID_Resultado")
            ->select(
                "fe.id",
                "e1.Nombre as nombreEquipo1",
                "e1.Escudo as escudoEquipo1",
                "e2.Nombre as nombreEquipo2",
                "e2.Escudo as escudoEquipo2",
                "c.Logo",
                "c.Nombre as nombreCompeticion",
                "t.Edicion",
                "fe.Tipo",
                "fe.Fase",
                "fe.Llave",
                "re.Resultado1",
                "re.Resultado2",
                "re.Resultado3"
            )
            ->get()
        ;
        return view('Crud.Fases_Eliminacion.index',compact('fasesEliminacion'));
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
                "c.Nombre",
                "t.Edicion"
            )
            ->where("c.Tipo","=","Copa")
            ->get()
        ;
        return view('Crud.Fases_Eliminacion.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosFaseEliminacion = $request->except("_token");

        if ($datosFaseEliminacion['tipoInsercion'] == "normal") {
            $request->validate([
                "Llave" => "required|string|max:255",
                "Resultado1" => "required|string|max:255"
            ],[
                "Llave.required" => "La Llave es obligatoria",
                "Resultado1.required" => "El Resultado1 es obligatorio"
            ]);

            $datosFaseEliminacion = $request->except('_token','tipoInsercion');

            $infoRes = [
                "Resultado1" => $datosFaseEliminacion['Resultado1'],
                "Resultado2" => $datosFaseEliminacion['Resultado2'],
                "Resultado3" => $datosFaseEliminacion['Resultado3']
            ];

            resultadoEliminacion::insert($infoRes);
            $ultimoId = resultadoEliminacion::max('id');

            $datosFaseEliminacion = $request->except('_token','tipoInsercion','Resultado1','Resultado2','Resultado3');

            $datosFaseEliminacion['ID_Resultado'] = $ultimoId;

            faseEliminacion::insert($datosFaseEliminacion);
        }else if ($datosFaseEliminacion['tipoInsercion'] == "cargaMasiva") {
            $archivo = $request->file('archivo');
            $contenido = file_get_contents($archivo->getRealPath());
            $datosFase = json_decode($contenido, true);

            foreach ($datosFase as $fase) {
                $infoRes = [
                    "Resultado1" => $fase['Resultado1'],
                    "Resultado2" => $fase['Resultado2'],
                    "Resultado3" => $fase['Resultado3']
                ];

                resultadoEliminacion::insert($infoRes);

                $ultimoId = resultadoEliminacion::max('id');

                $equipo1 = Equipo::where("Nombre","=",$fase['ID_Equipo1'])->first();
                $equipo2 = Equipo::where("Nombre","=",$fase['ID_Equipo2'])->first();

                $torneo = 
                    DB::table('torneos as t')
                    ->join("competiciones as c","c.id","=","t.ID_Competicion")
                    ->select(
                        "t.id"
                    )
                    ->where("t.Edicion","=",$fase['Edicion'])
                    ->where("c.Nombre","=",$fase['NombreTorneo'])
                    ->first()
                ;

                $infoFase = [
                    "ID_Equipo1" => $equipo1->id,
                    "ID_Equipo2" => $equipo2->id,
                    "Tipo" => $fase['Tipo'],
                    "ID_Torneo" => $torneo->id,
                    "ID_Resultado" => $ultimoId,
                    "Fase" => $fase['Fase'],
                    "Llave" => $fase['Llave']
                ];

                faseEliminacion::insert($infoFase);
            }
        }

        return redirect()->route('Fases_Eliminacion.create')->with('success',"Informacion agregada correctamente");

        // Debugar la API
        //return response()->json($datosFaseEliminacion);
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
        $fasesEliminacion = 
            DB::table('fases_de_eliminacion as fe')
            ->join('equipos as e1',"e1.id","=","fe.ID_Equipo1")
            ->join('equipos as e2',"e2.id","=","fe.ID_Equipo2")
            ->join('torneos as t',"t.id","=","fe.ID_Torneo")
            ->join('competiciones as c',"c.id","=","t.ID_Competicion")
            ->join('resultados_eliminacion as re',"re.id","=","ID_Resultado")
            ->select(
                "fe.id",
                "fe.ID_Equipo1",
                "fe.ID_Equipo2",
                "fe.ID_Torneo",
                "fe.Tipo",
                "fe.Fase",
                "fe.Llave",
                "re.Resultado1",
                "re.Resultado2",
                "re.Resultado3"
            )
            ->where("fe.id","=",$id)
            ->first()
        ;

        $datos['equipos'] = Equipo::all();
        $datos['torneos'] = 
            DB::table('torneos as t')
            ->join('competiciones as c',"c.id","=","t.ID_Competicion")
            ->select(
                "t.id",
                "c.Nombre",
                "t.Edicion"
            )
            ->where("c.Tipo","=","Copa")
            ->get()
        ;

        return view('Crud.Fases_Eliminacion.edit',$datos,compact('fasesEliminacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "Llave" => "required|string|max:255",
            "Resultado1" => "required|string|max:255"
        ],[
            "Llave.required" => "La Llave es obligatoria",
            "Resultado1.required" => "El Resultado1 es obligatorio"
        ]);

        $fasesEliminacion = $request->except('_token','_method');

        $infoRes = [
            "Resultado1" => $fasesEliminacion['Resultado1'],
            "Resultado2" => $fasesEliminacion['Resultado2'],
            "Resultado3" => $fasesEliminacion['Resultado3']
        ];

        $res = faseEliminacion::findOrFail($id);

        resultadoEliminacion::where("id","=",$res['ID_Resultado'])->update($infoRes);

        $infoFase = [
            "ID_Equipo1" => $fasesEliminacion['ID_Equipo1'],
            "ID_Equipo2" => $fasesEliminacion['ID_Equipo2'],
            "Tipo" => $fasesEliminacion['Tipo'],
            "ID_Torneo" => $fasesEliminacion['ID_Torneo'],
            "ID_Resultado" => $res['ID_Resultado'],
            "Fase" => $fasesEliminacion['Fase'],
            "Llave" => $fasesEliminacion['Llave']
        ];

        faseEliminacion::where("id","=",$id)->update($infoFase);

        return redirect()->route('Fases_Eliminacion.edit',$id)->with('success',"Resultado editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fase = faseEliminacion::findOrFail($id);

        $resultado = resultadoEliminacion::findOrFail($fase['ID_Resultado']);

        $resultado->delete();

        $fase->delete();

        return redirect()->route('Fases_Eliminacion.index')->with('success',"Resultado eliminado correctamente");
    }
}
