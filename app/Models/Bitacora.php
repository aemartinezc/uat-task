<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bitacora extends Model {

	protected $hidden = ['created_at','updated_at'];
	protected $fillable = [
      'id',
      'accion',
      'id_usuario',
      'id_proyecto'
    ];
  protected $table = 't_bitacora';

}
