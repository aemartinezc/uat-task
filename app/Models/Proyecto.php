<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model {

	protected $hidden = ['created_at','updated_at'];
	protected $primaryKey = 'id';
	protected $fillable = [
      'nombre',
      'descripcion_larga',
      'id_dependencia',
      'id_usuario',
      'id_municipiio',
      'estatus'
    ];
	protected $table = 't_proyectos';

}
