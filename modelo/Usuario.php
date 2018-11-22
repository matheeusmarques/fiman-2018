<?php

class Usuario{

  private $id;
  private $login;
  private $senha;
  private $tipo;
  private $email;
  private $pessoa_id;

  public function __get($name){
    return $this->$name;
  }

  public function __set($name, $value){
    $this->$name = $value;
  }

}
?>
