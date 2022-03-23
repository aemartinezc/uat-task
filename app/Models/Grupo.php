<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Grupo extends Model {

	protected $hidden = ['created_at','updated_at'];
	protected $fillable = [
      'id',
      'nombre',
      'id_proyecto'
    ];
  protected $table = 't_grupos';

  public function Rel(){
    return $this->hasMany('App\Models\RelGrupo', 'id_grupo', 'id');
  }

}
