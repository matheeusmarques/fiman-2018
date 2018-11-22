<?php

class Pessoa{

  private $id;
  private $nome;
  private $tipo; ## CNPJ or CPF
  private $cadastro_nacional; ## NUMERO DO CPF OU CNPJ
  private $cidade_id;

  public function __get($name){
    return $this->$name;
  }

  public function __set($name, $value){
    $this->$name = $value;
  }

}
?>
