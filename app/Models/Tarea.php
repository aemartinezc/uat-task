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

	public function obtenerProyecto(){
    return $this->hasOne('\App\Models\Proyecto', 'id', 'id_proyecto');
  }

	public function obtenerGrupo(){
    return $this->hasOne('\App\Models\Grupo', 'id', 'id_grupo');
  }

	public function obtenerHito(){
    return $this->hasOne('\App\Models\Hito', 'id', 'id_hito');
  }


}
