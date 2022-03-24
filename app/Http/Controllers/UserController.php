<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct(){
         date_default_timezone_set("America/Monterrey");
         setlocale(LC_TIME, 'es_ES.UTF-8');
         Carbon::setLocale('es');
     }


    public function index(Request $request)
    {
      if ($request->ajax()) {
        $usuarios = User::orderBy('created_at','DESC')
        ->select('id', 'name', 'email', 'created_at')->where('activo',1)
          ->get();

          $datatable = DataTables::of($usuarios)
          //return datatables()->of($usuarios)
          // ->editColumn('email_verified_at', function ($registros) {
          //   return 'epale';
          // })
          ->make(true);
          $data = $datatable->getData();
          foreach ($data->data as $key => $value) {

            $acciones = [

              "Editar" => [
                "icon" => "edit blue",
                "href" => "/usuarios/$value->id/edit"
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
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::get();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->roles);

        return redirect()->route('users.index')
                        ->with('success','Usuario creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $role = $user->roles->pluck('name')->all();
        return view('users.show',compact('user','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get();
        $userRole = $user->roles->pluck('name')->all();
        return view('users.edit',compact('user','roles','userRole'));
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
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->roles);

        return redirect()->route('users.index')
                        ->with('success','Usuario editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

      $usuario = User::find($request->id_user);
      $usuario->activo = 0;
      $usuario->save();
      return response()->json(['success'=>'Eliminado exitosamente']);

      // $usuario =   User::find($request->id_user)->delete();
        // return redirect()->route('users.index')
        //                 ->with('success','Usario eliminado satisfactoriamente');
        // return $usuario;
    }
}
