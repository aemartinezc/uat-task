<?php
if (! function_exists('get_user')) {
    function get_user($id_usuario)
    {
      $nombre = DB::table('users')->select('name')->where('id',$id_usuario)->get();
      if(count($nombre) > 0){
          return $nombre[0]->name;
      }else {
        return '----';
      }

    }
}

 ?>
