<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tarea extends Model {

	protected $hidden = ['created_at','updated_at'];
	protected $fillable = [
      'id',
      'tarea',
      'descripcion',
      'id_proyecto',
      'prioridad',
      'id_grupo',
      'id_hito',
      'id_usuario',
      'consecutivo',
      'completado'
    ];
  protected $table = 't_tareas';


}
