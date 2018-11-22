<?php

class Estado{

  private $id;
  private $nome;
  private $sigla;

  public function __get($name){
    return $this->$name;
  }

  public function __set($name, $value){
    $this->$name = $value;
  }

}

?>
