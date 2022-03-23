<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RelGrupo extends Model {

	protected $hidden = ['created_at','updated_at'];
	protected $fillable = [
      'id',
      'id_grupo',
      'id_usuario'
    ];
  protected $table = 't_rel_grupo_proyecto';

}
