<?php

class Plantacao{

  private $id;
  private $tipo_mandioca;
  private $quantidade;
  private $descricao;
  private $usuario_id;
  private $area_total;

  public function __get($name){
    return $this->$name;
  }

  public function __set($name, $value){
    $this->$name = $value;
  }
}
?>
