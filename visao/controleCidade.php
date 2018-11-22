<?php

require_once "../modelo/Cidade.php";
require_once "../DAO/DAOCidade.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['action'])){
  $cidade = new Cidade();
  $daoCidade = new DAOCidade();

  switch ($_GET['action']) {

    case 'insert':
    if(isset($_POST["nome"]) && isset($_POST["estado"])){
      $cidade->nome = $_POST["nome"];
      $cidade->estado_id = $_POST["estado"];

      if($daoCidade->queryInsert($cidade) !== FALSE)
        header("Location: http://localhost/admin/cidade.php?status=add");
      else
        header("Location: http://localhost/admin/cidade.php?status=error");
    }
    break;

    case 'delete':
    if(isset($_GET['id'])){
      $cidade->id = $_GET['id'];

      if($daoCidade->queryDelete($cidade) !== FALSE)
        header("Location: http://localhost/admin/cidade.php?status=removed");
      else
        header("Location: http://localhost/admin/cidade.php?status=error");

    }
    break;

    case 'update':
    if(isset($_POST["id"]) && isset($_POST["nome"]) && isset($_POST["estadoid"])){

      $cidade->id = $_POST['id'];
      $cidade->nome = $_POST['nome'];
      $cidade->estado_id = $_POST['estadoid'];

            
      if($daoCidade->queryUpdate($cidade) !== FALSE)
        header("Location: http://localhost/admin/cidade.php?status=updated");
      else
        header("Location: http://localhost/admin/cidade.php?status=error");
    }
    break;

  }

}
?>
