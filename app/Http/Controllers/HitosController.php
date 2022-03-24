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
use App\Models\Hito;
use App\Models\Proyecto;
class HitosController extends Controller
{

  public function index(Request $request){
    if ($request->ajax()) {
      $hitos = Hito::where('activo',1)->get();
        $datatable = DataTables::of($hitos)
        ->editColumn('id_proyecto', function ($hitos) {
          return $hitos->obtenerProyecto->nombre;
        })
        ->make(true);
        $data = $datatable->getData();
        foreach ($data->data as $key => $value) {

          $acciones = [

            "Editar" => [
              "icon" => "edit blue",
              "href" => "/hitos/$value->id/edit"
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
    return view('hitos.index');
  }

  public function create(){
    $data['proyectos'] = Proyecto::all();
    return view('hitos.create')->with($data);
  }

  public function store(Request $request){
    try {

      $hito = new Hito();
      $hito->nombre = $request->nombre;
      $hito->id_proyecto = $request->id_proyecto;
      $hito->save();
      return response()->json(['success'=>'Registro agregado satisfactoriamente']);

    } catch (\Exception $e) {
      dd($e->getMessage());
    }

  }

  public function edit($id){
    $data['proyectos'] = Proyecto::all();
    $data['hito'] = Hito::find($id);
    return view('hitos.create')->with($data);
  }

  public function update(Request $request){
    try {
      $hito = Hito::find($request->id);
      $hito->nombre = $request->nombre;
      $hito->id_proyecto = $request->id_proyecto;
      $hito->save();
       return response()->json(['success'=>'Ha sido editado con éxito']);
    } catch (\Exception $e) {
      dd($e->getMessage());
    }

  }

  public function destroy(Request $request)
  {

    $usuario = Hito::find($request->id_user);
    $usuario->activo = 0;
    $usuario->save();
    return response()->json(['success'=>'Eliminado exitosamente']);

  }



}
