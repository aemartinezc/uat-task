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
    public function create()
    {
        return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      $hitos = Hito::where('id_proyecto', $proyecto->id)->with('Tareas')->get()->toArray();
      //dd($hitos);
      $tareasr = DB::table('t_tareas')->where('id_proyecto', $proyecto->id)->take(5)->get();
      $grupos = Grupo::where('id_proyecto', $proyecto->id)->with('Rel')->get()->toArray();
      $actividad = Bitacora::where('id_proyecto', $proyecto->id)->get();
      //$grupos = DB::table('t_grupos')->where('id_proyecto', $proyecto->id)->get();

      return view('proyectos.show', compact('proyecto', 'hitos', 'tareasr', 'grupos','actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
