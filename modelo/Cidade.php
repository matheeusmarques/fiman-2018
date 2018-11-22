<?php

class Cidade{

  private $id;
  private $nome;
  private $estado_id;

  public function __get($name){
    return $this->$name;
  }

  public function __set($name, $value){
    $this->$name = $value;
  }

}

?>
