<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hito extends Model {

	protected $hidden = ['created_at','updated_at'];
	protected $fillable = [
      'id',
      'nombre',
      'id_proyecto',
			'activo'
    ];
  protected $table = 't_hitos';

  public function Tareas(){
    return $this->hasMany('App\Models\Tarea', 'id_hito', 'id');
  }

	public function obtenerProyecto(){
    return $this->hasOne('\App\Models\Proyecto', 'id', 'id_proyecto');
  }

}
