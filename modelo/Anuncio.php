<?php

class Anuncio{

  private $id;
  private $preco;
  private $quantidade;
  private $data;

  public function __get($name){
    return $this->$name;
  }

  public function __set($name, $value){
    $this->$name = $value;
  }

}
?>
