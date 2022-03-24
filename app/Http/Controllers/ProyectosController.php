<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Models\Proyecto;
use App\Models\Grupo;
use App\Models\RelGrupo;
use App\Models\Bitacora;
use App\Models\Hito;
use App\Models\Tarea;



class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::leftjoin('c_municipios', 'c_municipios.id', '=', 't_proyectos.id_municipio')
        ->leftjoin('c_dependencias', 'c_dependencias.id', 't_proyectos.id_dependencia')->get();
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevaTarea($id)
    {
        $data['id'] = $id;
        $data['hitos'] = Hito::where('activo',1)->get();
        $data['grupos'] = Grupo::where('activo',1)->get();
        return view('proyectos.nuevaTarea')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
          //dd($request->all());
          $tareas = new Tarea();
          $tareas->tarea = $request->nombre;
          $tareas->descripcion = $request->descripcion;
          $tareas->id_proyecto = $request->id;
          $tareas->prioridad = $request->prioridad;
          $tareas->id_grupo = $request->grupo;
          $tareas->id_hito = $request->hito;
          $tareas->save();
          return response()->json(['success'=>'Registro agregado satisfactoriamente']);

        } catch (\Exception $e) {
          dd($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $proyecto = Proyecto::find($id);
      $hitos = Hito::where([['id_proyecto', $proyecto->id],['activo',1]])->with('Tareas')->get()->toArray();
      //dd($hitos);
      $id = $id;
      $tareasr = DB::table('t_tareas')->where('id_proyecto', $proyecto->id)->take(5)->get();
      $grupos = Grupo::where([['id_proyecto', $proyecto->id],['activo',1]])->with('Rel')->get()->toArray();
      $actividad = Bitacora::where('id_proyecto', $proyecto->id)->get();
      //$grupos = DB::table('t_grupos')->where('id_proyecto', $proyecto->id)->get();

      return view('proyectos.show', compact('proyecto', 'hitos', 'tareasr', 'grupos', 'id','actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $proyecto = Proyecto::find($id);
      $hitos = Hito::where([['id_proyecto', $proyecto->id],['activo',1]])->with('Tareas')->get()->toArray();
      //dd($proyecto,$hitos);
      $data['id'] = $id;
      $data['hitos'] = $hitos;
      $data['proyecto'] = $proyecto;
      //dd($data['hitos']);
      return view('proyectos.edit')->with($data);
    }

    public function editTarea($id){
      $tareas = Tarea::find($id);
      //dd($tareas);
      $data['id'] = $tareas->id_proyecto;
      $data['id_tarea'] = $id;
      $data['hitos'] = Hito::where('activo',1)->get();
      $data['grupos'] = Grupo::where('activo',1)->get();
      $data['tareas'] = Tarea::find($id);
      return view('proyectos.nuevaTarea')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      try {
        $tareas = Tarea::find($request->id_tarea);
        $tareas->tarea = $request->nombre;
        $tareas->descripcion = $request->descripcion;
        $tareas->id_proyecto = $request->id;
        $tareas->prioridad = $request->prioridad;
        $tareas->id_grupo = $request->grupo;
        $tareas->id_hito = $request->hito;
        $tareas->save();
        return response()->json(['success'=>'Ha sido editado con éxito']);

      } catch (\Exception $e) {
          dd($e->getMessage());
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request)
     {

       $tareas = Tarea::find($request->id_user);
       $tareas->activo = 0;
       $tareas->save();
       return response()->json(['success'=>'Eliminado exitosamente']);

     }
}
