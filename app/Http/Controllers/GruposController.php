<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Hash;
use Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\Models\Grupo;
use App\Models\Proyecto;
class GruposController extends Controller
{

  public function index(Request $request){
    if ($request->ajax()) {
      $grupos = Grupo::where('activo',1)->get();
        $datatable = DataTables::of($grupos)
        ->editColumn('id_proyecto', function ($grupos) {
          return $grupos->obtenerProyecto->nombre;
        })
        ->make(true);
        $data = $datatable->getData();
        foreach ($data->data as $key => $value) {

          $acciones = [

            "Editar" => [
              "icon" => "edit blue",
              "href" => "/grupos/$value->id/edit"
            ],
            "Eliminar" => [
              "icon" => "edit blue",
              "onclick" => "eliminar($value->id)"
            ],
          ];


        $value->acciones = generarDropdown($acciones);
        }
        $datatable->setData($data);
        return $datatable;
      }
    return view('grupos.index');
  }

  public function create(){
    $data['proyectos'] = Proyecto::all();
    return view('grupos.create')->with($data);
  }

  public function store(Request $request){
    try {

      $grupo = new Grupo();
      $grupo->nombre = $request->nombre;
      $grupo->id_proyecto = $request->id_proyecto;
      $grupo->save();
      return response()->json(['success'=>'Registro agregado satisfactoriamente']);

    } catch (\Exception $e) {
      dd($e->getMessage());
    }

  }

  public function edit($id){
    $data['proyectos'] = Proyecto::all();
    $data['grupo'] = Grupo::find($id);
    return view('grupos.create')->with($data);
  }

  public function update(Request $request){
    try {
      $grupo = Grupo::find($request->id);
      $grupo->nombre = $request->nombre;
      $grupo->id_proyecto = $request->id_proyecto;
      $grupo->save();
       return response()->json(['success'=>'Ha sido editado con éxito']);
    } catch (\Exception $e) {
      dd($e->getMessage());
    }

  }

  public function destroy(Request $request)
  {

    $grupo = Grupo::find($request->id_user);
    $grupo->activo = 0;
    $grupo->save();
    return response()->json(['success'=>'Eliminado exitosamente']);

  }



}
