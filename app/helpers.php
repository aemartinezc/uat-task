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
if (!function_exists('generarDropdown')) {
  function generarDropdown( $acciones = [] ){
    if (count($acciones) > 0) {
      $dropdown =
        "<div class='btn-group '>
          <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons md-18 align-middle'>reorder</i><span class='caret'></span> </button>
          <div class='dropdown-menu '  >";
      foreach ($acciones as $key => $value) {
        $attrData = "";
        if (array_key_exists('data', $value)) {
          foreach ($value['data'] as $keyData => $data) {
            $attrData .= " data-" . $keyData . "='" . $data . "'" ;
          }
        }
        if ( array_key_exists('onclick', $value) ) {
          $dropdown .=
            "<div class='dropdown-item cursor-pointer' onclick=".$value["onclick"]." ".$attrData.">
              $key
            </div>";
        }else if(array_key_exists('href', $value)) {
          $dropdown .=
            "<a class='dropdown-item cursor-pointer' href='".$value["href"]."' ".$attrData.
            (array_key_exists('target', $value) ? " target='".$value["target"]."'" : "").">
              $key
            </a>";
        }else if(array_key_exists('class', $value)) {
          $dropdown .=
            "<a class='dropdown-item cursor-pointer" . $value["class"] . "' href='javascript:void(0);' ".$attrData.">
              $key
            </a>";
        }
      }
      $dropdown .= "</div></div>";
      return $dropdown;
    }
    return "";
  }
}

 ?>
