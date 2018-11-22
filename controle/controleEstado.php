<?php
require_once "../DAO/DAOEstado.php";
require_once "../modelo/Estado.php";
require_once "../DAO/mySQL.class.php";

if(!empty($_GET['action'])){

  $estado = new Estado();
  $daoEstado = new DAOEstado();

  switch ($_GET['action']) {
    case 'insert':
    if( isset($_POST['nome']) && isset($_POST['sigla']) ){

        $estado->nome = $_POST['nome'];
        $estado->sigla = $_POST['sigla'];

        if($daoEstado->queryInsert($estado) !== FALSE)
          header("Location: http://localhost/admin/estado.php?status=add");
        else
          header("Location: http://localhost/admin/estado.php?status=error");

    }
    break;

    case 'delete':
    if(isset($_GET['id'])){

      $estado->id = $_GET['id'];

      if($daoEstado->queryDelete($estado) !== FALSE)
        header("Location: http://localhost/admin/estado.php?status=removed");
      else
        header("Location: http://localhost/admin/estado.php?status=error");
    }
    break;

    case 'update':
    if( isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['sigla']) ){

        $estado->id = $_POST['id'];
        $estado->nome = $_POST['nome'];
        $estado->sigla = $_POST['sigla'];

        if($daoEstado->queryUpdate($estado) !== FALSE)
          header("Location: http://localhost/admin/estado.php?status=removed");
        else
          header("Location: http://localhost/admin/estado.php?status=error");
    }
    break;
  }
}

?>
