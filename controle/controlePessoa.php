<?php
require_once "../modelo/Pessoa.php";
require_once "../DAO/DAOPessoa.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['action'])){

  $pessoa = new Pessoa();
  $daoPessoa = new DAOPessoa();

  switch ($_GET['action']) {
    case 'insert':
    if( isset($_POST['nome'])) ){
      $pessoa->nome = $_POST['nome'];
      $pessoa->tipo = $_POST['tipo'];
      $pessoa->cidade_id = $_POST['cidade_id'];
      $pessoa->cadastro_nacional = $_POST['cadastro_nacional'];

      if($daoPessoa->queryInsert($pessoa) !== FALSE)
        header('Location: http://localhost/admin/pessoa.php?status=add');
      else
        header('Location: http://localhost/admin/pessoa.php?status=error');
    }
    break;

    case 'delete':
    if (isset($_GET['id'])){
      $pessoa->id = $_GET['id'];

      if($daoPessoa->queryDelete($pessoa) !== FALSE)
        header('Location: http://localhost/admin/pessoa.php?status=removed');
      else
        header('Location: http://localhost/admin/pessoa.php?status=error');
    }
    break;

    case 'update':
    if(isset($_POST['id'])){
      $pessoa->nome = $_POST['nome'];
      $pessoa->tipo = $_POST['tipo'];
      $pessoa->cidade_id = $_POST['cidade_id'];
      $pessoa->id = $_POST['id'];
      $pessoa->cadastro_nacional = $_POST['cadastro_nacional'];

      if($daoPessoa->queryUpdate($pessoa) !== FALSE)
      header('Location: http://localhost/admin/pessoa.php?status=updated');
      else
      header('Location: http://localhost/admin/pessoa.php?status=error');
    }
    break;

  }
}
?>
